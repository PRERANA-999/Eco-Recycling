<?php
session_start();

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  // Process the checkout form submission
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data and perform necessary validation
    $name = $_POST['name'];
    $address = $_POST['address'];
    $paymentMethod = $_POST['paymentMethod'];

    // Process the payment and other checkout logic
    
    // Create the order details array
    $orderDetails = array();

    // Add each product from the cart to the order details
    foreach ($_SESSION['cart'] as $product) {
      // Retrieve additional details from the database or any other source as needed
      $productId = $product['pid'];
      $productName = $product['pname'];
      $productDescription = $product['description'];
      $productPrice = $product['price'];

      // Add the product details to the order details array
      $orderDetails[] = array(
        'pid' => $productId,
        'pname' => $productName,
        'description' => $productDescription,
        'price' => $productPrice
        // Add more details as needed
      );
    }

    // Store the order details in the session
    $_SESSION['order_details'] = $orderDetails;

    // Clear the cart after successful checkout
    unset($_SESSION['cart']);

    // Redirect to the order details page
    header("Location: confirm.php");
    exit();
  }

  // Display the checkout form
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Checkout</title>
    
<style type="text/css">
body {
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
  margin: 0;
  padding: 0;
}

h2 {
  color: #333;
}

form {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border: 2px solid #ccc;
  border-radius: 4px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
textarea {
  width: 90%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

select {
  width: 95%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: #fff;
}

button {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}
</style>
    <script>
      window.addEventListener("DOMContentLoaded", function() {
        document.getElementById("checkout-form").addEventListener("submit", function(event) {
          event.preventDefault(); // Prevent form submission

          // Perform form validation if needed

          this.submit(); // Submit the form
        });
      });
    </script>
  </head>
  <body>
    <h2><center>Checkout</center></h2>
    <form action="checkout.php" method="POST" id="checkout-form">

      <!-- Include form fields for customer information, payment details, etc. -->
      <!-- Example fields: -->
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" required><br><br>
      
      <label for="address">Address:</label>
      <textarea name="address" id="address" required></textarea><br><br>
      
      <label for="paymentMethod">Payment Method:</label>
      <select name="paymentMethod" id="paymentMethod" required>
        <option value="points">Points</option>
        <option value="cash">Cash</option>
      </select><br><br>

      <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
  </body>
  </html>
  <?php
} else {
  // If the cart is empty, redirect back to the cart page
  header("Location: cart.php");
  exit();
}
?>
