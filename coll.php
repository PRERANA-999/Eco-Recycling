

<!DOCTYPE html>

<body>
    
    <?php 

      $a=$_POST["uname"]; 

      $b=$_POST["email"];

      $d=$_POST["phone"];

      $e=$_POST["address"];
      $c=$_POST['pass'];
      $f=$_POST['cpass'];
     
/*----------------------------------------------------------------
 $_SESSION['uname']=$_POST["uname"];
$_SESSION['cname']=$_POST["cname"];
$_SESSION['coname']=$_POST["coname"];
$_SESSION['email']=$_POST["email"];
$_SESSION['password']=$_POST["password"];
$_SESSION['ph']=$_POST["ph"];
$_SESSION['phone']=$_POST["phone"];
$_SESSION['address']=$_POST["address"];
$_SESSION['pincode']=$_POST["pincode"];

---------------------------------------------------------------*/
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
$y=$_POST['uname'];
$sql = "SELECT coname FROM collection where coname='$y'";
$result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result)>=1) 
      echo "<script> alert('User already exist');window.location='collection.php'</script>";

    else
    {
                if ($c==$f) 
               {

                              $sql = "INSERT INTO collection (coname, email, pwd, phone, address) VALUES ('$y','$b','$c','$d','$e')";

                if ($conn->query($sql) === TRUE) 
                   echo "<script> alert('Registered Successfully');window.location='colllogin.php'</script>";

               }
        
                   
                  
             else{
                     echo "<script> alert('Password does not match..');window.location='collection.php'</script>";
                 }
      

                  $conn->close();
    }
?>
</body>
</html>