
<?php
// Start the session
session_start();
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
 
<?php
$servername = "localhost:3306";
$username = "root";
$password = "";

$dbname = "recycling";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

     $sql = "SELECT * FROM servreq where status=1";
     $result =$conn->query($sql);
     
     if (mysqli_num_rows($result)>0) {

       while ($row=mysqli_fetch_array($result)) {
          
       }
     }



?>
 
</body>
</html>