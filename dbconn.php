<?php 

     $servername = "localhost:3306";
     $username = "root";
     $password = "";
     $dbname = "recycling";

// Create connection
     $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
     if ($conn->connect_error) 
     {
    
         die("Connection failed: " . $conn->connect_error);
      }



 ?>