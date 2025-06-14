<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
 <html>
  <body>
 	<center><h1>Welcome to admin page</h1></center>
 <?php
 
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
?>

<?php

$db= $conn;
$tableName="servreq";
$columns= ['serviceID', 'uname','email','phone','address','pincode','bio','nbio','image','date','status'];
$fetchData = fetch_data($db, $tableName, $columns);
function fetch_data($db, $tableName, $columns){
 if(empty($db)){

  $msg= "Database connection error";

 }elseif (empty($columns) || !is_array($columns)) {

  $msg="columns Name must be defined in an indexed array";

 }elseif(empty($tableName)){

   $msg= "Table Name is empty";

}else{

$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." where status=2 ORDER BY serviceID ASC";
$result = $db->query($query);
if($result== true){ 

 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
    
 } else {
    $msg= "No Data Found"; 
 }
}else{

  $msg= mysqli_error($db);
}
}
return $msg;
}
?>


 </body>
 </html> 