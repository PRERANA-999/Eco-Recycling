<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Process the confirmation logic
  
  // Redirect to the payment page
  header("Location: payment.php");
  exit();
}

// Check if the order details are available in the session
if (isset($_SESSION['order_details']) && !empty($_SESSION['order_details'])) {
  // Retrieve the order details from the session
  $orderDetails = $_SESSION['order_details'];

  // Display the order details
  echo "<h2>Order Details</h2>";
  
  foreach ($orderDetails as $product) {
    // Display the product details
    echo "<h4>" . $product['pname'] . "</h4>";
    echo "<p>" . $product['description'] . "</p>";
    echo "<p>Price: " . $product['price'] . "</p>";
    // Add more details as needed

    echo "<hr>";
  }

  // Display a confirmation message and a button to confirm the order
  echo "<p>Please confirm your order:</p>";
  echo '<form action="payment.php" method="POST">';
  echo '<button type="submit" name="confirm" class="btn btn-primary">Confirm Order</button>';
  echo '</form>';

  // Clear the order details from the session after displaying
  unset($_SESSION['order_details']);
} else {
  // If the order details are not available, display a message
  echo "No order details found.";
}
?>
