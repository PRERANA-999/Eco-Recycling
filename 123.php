<?php
$x=$_POST["uname"];
	
$servername = "localhost:3306";
$username = "root";
$password = "";

$dbname = "a";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn)
 {
         die("Connection failed: " . mysqli_connect_error());
 }
$y=$_POST['uname'];
$sql = "SELECT name FROM abc where name='$y'";
$result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result)>=1) 
	    echo "<script> alert('User already exist')</script>";
    else
   {
	    $sql = "INSERT INTO abc (name) VALues ('$y')";
        if ($conn->query($sql) === TRUE) 
        {
             echo "New record created successfully";
        } else 
        {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

      $conn->close();
   }

?>