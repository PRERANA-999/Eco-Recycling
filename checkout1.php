<?php
session_start();
include 'dbconn.php';
include 'proheader.php';

// Retrieve the logged-in user details from the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
  // Retrieve the user details from the registration form
  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  // ... Retrieve other form fields as needed
  
  // Store the user details in the session
  $_SESSION['registration'] = array(
    'uname' => $uname,
    'email' => $email,
    'address' => $address,
    'phone' => $phone,
    // ... Store other form fields as needed
  );
}

// Display the products in the cart and checkout information
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  echo "<h3>Cart Details:</h3>";
  echo '<table class="table">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>Product Name</th>';
  echo '<th>Description</th>';
  echo '<th>Price</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  foreach ($_SESSION['cart'] as $product) {
    echo '<tr>';
    echo '<td>' . $product['pname'] . '</td>';
    echo '<td>' . $product['description'] . '</td>';
    echo '<td>' . $product['price'] . '</td>';
    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';

  // Checkout form
  echo '<h3>Checkout Information:</h3>';
  echo '<form action="placeorder.php" method="POST">';
  
  // Retrieve the user details from the session
  if (isset($_SESSION['registration'])) {
    $userDetails = $_SESSION['registration'];

    // Display the user details
    echo "<h3>User Details:</h3>";
    echo "Name: " . $userDetails['uname'] . "<br>";
    echo "Email: " . $userDetails['email'] . "<br>";
    echo "Address: " . $userDetails['address'] . "<br>";
    echo "Phone Number: " . $userDetails['phone'] . "<br>";
    // ... Display other user details as needed
  } else {
    echo "<p>User details not found.</p>";
  }

  echo '<button type="submit" name="place_order" class="btn btn-success">Place Order</button>';
  echo '</form>';
} else {
  echo '<p class="empty-cart-message">Your cart is empty.</p>';
}

$conn->close();
?>
