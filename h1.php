<!DOCTYPE html>
	<h1><center>Welcome to My Website</center></h1>
	<?php
	$x=$_POST["uname"];
	
$servername = "localhost:3306";
$username = "root";
$password = "";

$dbname = "a";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO abc (name)
VALUES ('$x')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

	?>


</html>