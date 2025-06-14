<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style type="text/css">
    /* CSS styles for the order details page */

body {
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
  margin: 0;
  padding: 20px;
}

h2 {
  color: #333;
}

h4 {
  color: #333;
  margin-top: 0;
}

p {
  color: #666;
  margin: 0;
}

button {
  padding: 10px 20px;
  background-color: #337ab7;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #286090;
}

hr {
  margin: 20px 0;
  border: none;
  border-top: 1px solid #ccc;
}

.empty-message {
  color: #999;
  font-style: italic;
}

  </style>
</head>
<body>



<?php
session_start();
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Process the confirmation logic
  
  // Redirect to the payment page
  header("Location: confirm.php");
  exit();
}

// Check if the order details are available in the session
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  // Retrieve the order details from the session
  $cart = $_SESSION['cart'];
?>
  // Display the order details
  <div class="sub">
              <label for="uname"> Name:</label>
              <input type="text" id="uname"name="uname" value="<?php echo $_SESSION['uname'];?>"> 
            </div>
            <div class="sub">
              <label for="email"> Email:</label>
              <input type="email" id="email"name="email" value="<?php echo $_SESSION['email'];?>">  
            </div>
             <div class="sub">
              <label for="phone">Phone number:</label>
              <input type="text" id="phone"name="phone" value="<?php echo $_SESSION['phone'];?>"> 
            </div>
             <div class="sub">
              <label for="address"> Address:</label>
              <input type="text" id="address"name="address" value="<?php echo $_SESSION['address'];?>"> 
            </div>
           <div class="sub">
                       <label for="pincode">Pincode:</label>
                       <input type="text"  id="pincode" name="pincode" value="<?php echo $_SESSION['pincode'];?>">
                    </div>

<?php
  // Display a confirmation message and a button to confirm the order
  echo "<p>Please confirm your order:</p>";
  echo '<form action="confirm.php" method="POST">';
  echo '<button type="submit" id="rzp-button1"name="rzp-button1" class="btn btn-primary">Confirm Order and proceed to pay</button>';
  echo '</form>';


  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm Order'])) {
    // Process the confirmation and redirect to the payment page
    // ... Your existing code to process the confirmation ...
    header("Location: payment_page.php"); // Replace "payment_page.php" with the actual URL of your payment page
    exit();
  } else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rzp_payment_id'])) {
    // Process the payment response and update the status
    $payment_status = '1'; // Set to 1 for successful payment or 0 for unsuccessful payment

    // Update the status in the database for the specific order
    $id = $_SESSION['id']; // Replace 'id' with the actual column name representing the order ID in your database
    $update_query = "UPDATE orders SET status = '$payment_status' WHERE id = '$id'";
    $result = $conn->query($update_query);

    if ($result) {
      echo "Payment successful. Your order has been confirmed.";
      // Clear the cart after successful payment and order confirmation
      unset($_SESSION['cart']);
    } else {
      echo "Payment failed. Please try again later.";
    }
  }
  // Clear the order details from the session after displaying
  //unset($_SESSION['cart']);
} else {
  // If the order details are not available, display a message
  echo "No order details found.";
}

 
  $conn->close();
  ?>
   



<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_tJvFET2Ftc66AF", // Enter the Key ID generated from the Dashboard
    "amount": "100", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    
    "handler": function (response){
       console.log(response);
    },
    "prefill": {
        "name": "<?php echo $_SESSION['uname'];?>",
        "email": "<?php echo $_SESSION['email'];?>",
        "contact": "9000090000"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
</body>
</html>


















