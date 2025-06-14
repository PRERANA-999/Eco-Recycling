<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
</head>
<body>



<?php


$a = $_POST["uname"];
$b = $_POST["cname"];
$c = $_POST["coname"];
$d = $_POST["email"];
$e = md5($_POST["password"]);
$f = $_POST["ph"];
$g = $_POST["phone"];
$h = $_POST["address"];
$i = $_POST["pincode"];
$j = md5($_POST["cpassword"]);



$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "recycling";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Check if user already exists
$sql_user= "SELECT * FROM reg WHERE  email='$d'";
$result_user = mysqli_query($conn, $sql_user);
if (mysqli_num_rows($result_user)>=1) {
  ?>
  
<script> alert('User already exists with same Email \n Please Register with different Email \n OR \n If you are already Registered Login'); window.location='news.php'</script>";

<?php

} else {
    
        // Check if password matches
        
            $sql = "INSERT INTO reg (uname, cname, coname, email, pwd, phcode, phone, address, pincode) 
                    VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i')";
            if ($conn->query($sql) === TRUE) {
                echo "<script> alert('Registered Successfully'); window.location='log1.php'</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
   }


$conn->close();
?>

</body>
</html>