<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Netbanking Payment</title>
</head>
<body>
    <h1>Razorpay Netbanking Payment</h1>
    <form id="paymentForm" action="process_payment.php" method="POST">
        <!-- Add your form fields here (e.g., amount, customer details) -->

        <!-- The Razorpay Payment Button -->
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="YOUR_RAZORPAY_KEY"
            data-amount="10000" <!-- Replace with the actual amount in paisa -->
            data-currency="INR"
            data-name="Your Company Name"
            data-description="Test Transaction"
            data-image="https://your-company-logo.png"
            data-netbanking="true"
            data-prefill.name="John Doe"
            data-prefill.email="john@example.com"
            data-prefill.contact="9876543210"
            data-theme.color="#F37254"
        ></script>
        <input type="hidden" value="Hidden Element" name="hidden">
    </form>

    <script>
        document.getElementById('paymentForm').onsubmit = function(event) {
            event.preventDefault();
            // Handle form submission via JavaScript to prevent automatic submission
            // Call the Razorpay payment function here
            launchRazorpay();
        };

        function launchRazorpay() {
            // Replace YOUR_RAZORPAY_KEY with your actual Razorpay API Key
            var razorpayKey = 'YOUR_RAZORPAY_KEY';
            var options = {
                key: razorpayKey,
                amount: 10000, // Replace with the actual amount in paisa
                currency: 'INR',
                name: 'Your Company Name',
                description: 'Test Transaction',
                image: 'https://your-company-logo.png',
                netbanking: true,
                prefill: {
                    name: 'John Doe',
                    email: 'john@example.com',
                    contact: '9876543210'
                },
                theme: {
                    color: '#F37254'
                },
                handler: function (response){
                    // Handle the Razorpay response here
                    if (response.razorpay_payment_id){
                        // Payment was successful, submit the form to your server
                        document.getElementById('paymentForm').submit();
                    } else {
                        // Payment failed or was canceled
                        alert('Payment failed or was canceled.');
                    }
                }
            };
            var rzp = new Razorpay(options);
            rzp.open();
        }
    </script>
</body>
</html>
