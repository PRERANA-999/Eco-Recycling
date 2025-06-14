<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "a";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT name FROM abc";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
    echo "name: ".$row["name"]."<br>";
  }
} else {
  echo "0 results";
}
mysqli_close($conn);
?>