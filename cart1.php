<?php
session_start();
include 'dbconn.php';
include 'proheader.php';

// Delete a product from the cart
// Delete a product from the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_product'])) {
  $pid = $_POST['delete_product'];

  // Find the index of the product in the cart array
  $index = -1;
  if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $product) {
      if ($product['pid'] == $pid) {
        $index = $key;
        break;
      }
    }
  }

  // Remove the product from the cart if found
  if ($index > -1) {
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index the cart array
    echo "<p><br>Product deleted from the cart.</br></p>";
  }
}

  // Remove the product from the cart if found
  

// Clear all products from the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_all'])) {
  unset($_SESSION['cart']);
  echo "<p>All products cleared from the cart.</p>";
}

// Calculate the total price of products in the cart
$totalPrice = 0;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $product) {
    $totalPrice += $product['price'];
  }
}

?>

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
    // Display the products in the cart
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
      echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="POST">';
      echo '<table class="table">';
      echo '<thead>';
      echo '<tr>';
       echo '<th>Product Id</th>';
      echo '<th>Product Name</th>';
      echo '<th>Description</th>';
      echo '<th>Price</th>';
      echo '<th>Image</th>';
      echo '<th>Action</th>';
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
        // Display delete button for each product
        echo '<td>';
       // Inside the foreach loop that displays the products in the cart
echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="POST">';
echo '<input type="hidden" name="delete_product" value="' . $product['pid'] . '">';
echo '<button type="submit" class="btn btn-danger">Delete</button>';
   
echo '</form>';

        echo '</td>';
        echo '</tr>';
      }

      echo '</tbody>';
        echo '<td>Total Price: $' . $totalPrice . '</td>';
      echo '</table>';

      // Display total price
     
      // Add a button to redirect to the order details page
      echo '<a href="orderpg.php" class="btn btn-primary">View Order Details</a>';

      // Add delete all button
      echo '<button type="submit" name="delete_all" class="btn btn-danger">Delete All</button>';
      echo '</form>';
    } else {
      echo '<p class="empty-cart-message">Your cart is empty.</p>';
    }

  

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  // Prepare the INSERT statement
  $stmt = $conn->prepare("INSERT INTO addtocart (pid, pname, description, price,status ) VALUES (?, ?, ?, ?, ?)");

  // Bind parameters and execute the statement for each cart item
  foreach ($_SESSION['cart'] as $product) {
      $pid = $product['pid'];
    $pname = $product['pname'];
    $description = $product['description'];
    $price = $product['price'];
      $status = 1;
  
    $stmt->bind_param("isssi", $pid, $pname, $description, $price, $status);
    $stmt->execute();
  }

  // Close the statement
  $stmt->close();
    $conn->close();
}

    ?>
  </div>
</body>
</html>
