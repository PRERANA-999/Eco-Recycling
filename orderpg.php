<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <style type="text/css">
    img.table-image {
      width: 100px;
      height: 100px;
      object-fit: cover;
    }

    .table {
      border-collapse: collapse;
      width: 100%;
    }

    .table th, .table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    .table th {
      background-color: #f2f2f2;
    }

    .empty-cart-message {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">

<?php
session_start();
include 'dbconn.php';
include 'proheader.php';

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  // Prepare and execute the UPDATE query to change the status from 1 to 2
  $stmt = $conn->prepare("UPDATE addtocart SET status = 2 WHERE status = 1");
  $stmt->execute();
  $stmt->close();
}


$totalPrice = 0;

// Calculate the total price of products in the cart
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $product) {
    $totalPrice += $product['price'];
  }
}



// Display the products in the cart


// Display the products in the cart
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  echo '<table class="table">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>Product Id</th>';
  echo '<th>Product Name</th>';
  echo '<th>Description</th>';
  echo '<th>Price</th>';
  echo '<th>Image</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  foreach ($_SESSION['cart'] as $product) {
    // Display the product details in table rows
    echo '<tr>';
    echo '<td>' . $product['pid'] . '</td>';
    echo '<td>' . $product['pname'] . '</td>';
    echo '<td>' . $product['description'] . '</td>';
    echo '<td>' . $product['price'] . '</td>';
    // Display the image if available
    echo '<td>';
    if ($product['imageData']) {
      echo '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($product['imageData']) . '" class="table-image" />';
    }
    echo '</td>';
    echo '</tr>';
  }

  echo '</tbody>';
  echo '<td>Total Price: $' . $totalPrice . '</td>';
  echo '</table>';

  // Display the Confirm Order button
  echo '<form action="confirm.php" method="POST">';
  echo '<button type="submit" name="confirm_order" class="btn btn-success confirm-order-btn">Confirm Order</button>';
  echo '</form>';

  if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Prepare the INSERT statement
    $stmt = $conn->prepare("INSERT INTO orders (pid, pname, description, price,status) VALUES (?, ?, ?, ?, ?)");

    // Bind parameters and execute the statement for each cart item
    foreach ($_SESSION['cart'] as $product) {
      $pid = $product['pid'];
      $pname = $product['pname'];
      $description = $product['description'];
      $price = $product['price'];

      $stmt->bind_param("ssss", $pid, $pname, $description, $price, $status);
      $stmt->execute();
    }

    // Clear the cart after storing the order details
    //unset($_SESSION['cart']);
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rzp_payment_id'])) {
  // Process the payment response and update the status
  $payment_status = '1'; // Set to 1 for successful payment or 0 for unsuccessful payment

  // Update the status in the database for the specific order
  $id = $_SESSION['id']; // Replace 'id' with the actual column name representing the order ID in your database
  $update_query = "UPDATE orders SET status = '$payment_status' WHERE id = '$id'";
  $result = $conn->query($update_query);

  if ($result) {
    echo "Payment successful. Your order has been confirmed.";
    // Clear the cart after successful payment and order confirmation
    //unset($_SESSION['cart']);
  } else {
    echo "Payment failed. Please try again later.";
  }
}

$conn->close();
?>

</div>
</body>
</html>
