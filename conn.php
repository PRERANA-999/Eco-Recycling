<?php 
include 'dbconn.php';

$u = $_POST["email"]; 
$p = md5($_POST["pwd"]);

$sql = "SELECT * FROM reg WHERE email='$u' AND pwd='$p'";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    if ($row["usertype"] == "user") {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['uid'] = $row["uID"];
        $_SESSION['uname'] = $row["uname"];
        $_SESSION['email'] = $row["email"];
        $_SESSION['phone'] = $row["phone"];
        $_SESSION['address'] = $row["address"];
        $_SESSION['pincode'] = $row["pincode"];
        header('Location:userpage.php');
    } elseif ($row["usertype"] == "Admin") {
        session_start();
        $_SESSION['Adminlog'] = true;
        header('Location:adminboard.php');
    } elseif ($row["usertype"] == "collecter") {

             session_start();
            $_SESSION['Collecterlog'] = true;

         $_SESSION['uID'] =$row['uID'];
         $_SESSION['coname'] = $row['cname'];
         $_SESSION['coemail'] = $row['email'];
         $_SESSION['cophone'] = $row['phone'];
         $_SESSION['coaddress'] = $row['address']; 
           header('Location:collecterpage.php');


    }elseif ($row["usertype"] == "manager") {
        session_start();
        $_SESSION['Managerlog'] = true;
        header('Location:managerdashboard.php');
    }

} else {
    echo "<script> alert(' Please check your email and pasword is correct or not '); window.location='eco.php'</script>";
}

$conn->close();
?>
