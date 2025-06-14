<?php
session_start();
include 'dbconn.php';

// Check if the form is submitted for deleting items
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
  $index = $_POST['index'];

  // Remove the product from the cart using the index
  if (isset($_SESSION['cart'][$index])) {
    unset($_SESSION['cart'][$index]);
    // Re-index the cart array
    $_SESSION['cart'] = array_values($_SESSION['cart']);
  }

  // Redirect back to the cart page to update the display
  header("Location: cart.php");
  exit();
}

// Check if the cart is not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  // Prepare the INSERT statement
  $stmt = $conn->prepare("INSERT INTO addtocart (pname, description, price, imageData) VALUES (?, ?, ?, ?)");

  // Bind parameters and execute the statement for each cart item
  foreach ($_SESSION['cart'] as $product) {
    $pname = $product['pname'];
    $description = $product['description'];
    $price = $product['price'];
    $imageData = $product['imageData'];
    $stmt->bind_param("sssb", $pname, $description, $price, $imageData);
    $stmt->execute();
  }

  // Close the statement
  $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Cart</title>
  <style type="text/css">
    /* CSS styles for the cart page */
    .cart-item {
      margin-bottom: 20px;
      padding: 10px;
      background-color: #f5f5f5;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .cart-item img {
      width: 100px;
      height: 100px;
      margin-right: 10px;
    }

    .cart-item-title {
      font-size: 18px;
      font-weight: bold;
    }

    .cart-item-price {
      font-size: 16px;
      margin-top: 5px;
    }

    .cart-item-description {
      margin-top: 5px;
    }

    .cart-item-delete {
      margin-top: 10px;
    }

    .total-amount {
      font-weight: bold;
      margin-top: 20px;
    }

    .checkout-form {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <h1>Cart</h1>

  <?php
  // Check if the cart is not empty
  if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $totalAmount = 0; // Initialize the total amount

    // Display the cart items
    foreach ($_SESSION['cart'] as $index => $product) {
      echo '<div class="cart-item">';
      echo '<h4 class="cart-item-title">' . $product['pname'] . '</h4>';
      $imageData= base64_decode( $product['imageData']);
      echo '<img src="data:images/jpg;charset=utf8;base64,' . base64_encode($imageData)  . '" class="cart-item-image" />';
      echo '<p class="cart-item-price">Price: $' . $product['price'] . '</p>';
      echo '<p class="cart-item-description">' . $product['description'] . '</p>';

      // Add the delete button with a form for each product
      echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="POST" class="cart-item-delete">';
      echo '<input type="hidden" name="index" value="' . $index . '">';
      echo '<button type="submit" name="delete">Delete</button>';
      echo '</form>';

      echo '</div>';

      // Calculate the total amount
      $totalAmount += $product['price'];
    }

    // Display the total amount
    echo '<p class="total-amount">Total Amount: $' . $totalAmount . '</p>';

    // Display the checkout button
    echo '<form action="checkout.php" method="POST" class="checkout-form">';
    echo '<button type="submit" name="checkout">Checkout</button>';
    echo '</form>';
  } else {
    // Display a message if the cart is empty
    echo '<p class="empty-cart-message">Your cart is empty.</p>';
  }
  ?>

</body>
</html>
