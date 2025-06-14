

<!DOCTYPE html>

<body>
	
	<?php 

	$u= $_POST["email"]; 
   $p= md5($_POST["pwd"]);



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

     $sql = "SELECT * FROM collection where email='$u'&& pwd='$p'";
     
     $result =$conn->query($sql);
     if (mysqli_num_rows($result)>0) 
     {
         $row=mysqli_fetch_array($result);

         if ($row["status"] == "1") 
        {
            
       
          session_start();
            $_SESSION['Collecterlog'] = true;
          
          header('Location:collecterpage.php');

         }else{
                  echo "<script> alert('Login has not approved by admin');window.location='colllogin.php'</script>";

              }

     } else{
     echo "<script> alert('User is not registered'); window.location='colllogin.php'</script>";
   }

?>
<?php
 
 $_SESSION['coID'] =$row['coID'];
 $_SESSION['coname'] = $row['coname'];
 $_SESSION['coemail'] = $row['email'];
 $_SESSION['cophone'] = $row['phone'];
 $_SESSION['coaddress'] = $row['address']; 




$conn->close();


?>
</body>
</html>