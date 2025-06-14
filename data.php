<!DOCTYPE html>

<body>
	
	<?php 

	$a=$_POST["uname"]; 

    $b=$_POST["email"];

    $c=$_POST["password"];

    $d=$_POST["phone"];

    $e=$_POST["address"];
    $f=$_POST["cpassword"];


$servername = "localhost:3306";
$username = "root";
$password = "";

$dbname = "b";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$y=$_POST['uname'];
$sql = "SELECT name FROM reg where name='$y'";
$result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result)>=1) 
      echo "<script> alert('User already exist');window.location='regs.php'</script>";

    else
    {
      if ($c==$f) 
      {
        
          $sql = "INSERT INTO reg (name, email, password, phone, address) VALUES ('$y','$b','$c','$d','$e')";

          if ($conn->query($sql) === TRUE) 
           echo "<script> alert('Registered Successfully');window.location='log1.php'</script>";
       }
      else{
           echo "<script> alert('Password does not match..');window.location='regs.php'</script>";
           }
      

        $conn->close();
    }
?>
</body>
</html>