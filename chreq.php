<?php 
session_start();
if (!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != true) {
    header('Location: log1.php');
    exit;     
}

if (isset($_POST['logout'])) {
   unset($_SESSION['loggedin']); 
    header('Location: eco.php');
    exit;
}
?>


        
<?php  include 'dbconn.php'; ?>

<?php 
 if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'accept')
 {
        $id=$_REQUEST['servid'];
        $today = date("Y-m-d H:i:s");
        $q =  mysqli_query($conn,"Select *  From `servreq` where `serviceID`='$id' ");
        if($q == true)
        { 
            if (mysqli_num_rows($q)>0)
            {
              $row=mysqli_fetch_array($q);
                if ($row["status"] == "2") 
                {
                   echo "<script> alert('Your service request is Pending, You cannot send Request for change');window.location='ustatus.php'</script>";
         }else{

            $in = mysqli_query($conn,"Update `servreq` set `cstatus`='4',`date`='$today'  where `serviceID`='$id'");
            if($in == true)
            {

                         echo "<script> alert('Please Click on Edit button to Change the Request');window.location='ustatus.php'</script>";
             }else{

              echo "<script> alert('Request didn't Updated)</script>"; 
              }
           }
      
        }
    }
}

if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'edit') {
  $email = $_SESSION['email'];
  $_SESSION['Sid']=$sid = $_REQUEST['servid'];
  $_SESSION['imgid']=$iid = $_REQUEST['imageid'];
 /* echo $sid;*/

  $query = "SELECT * FROM `servreq` WHERE `email` = '$email' AND `serviceID` = '$sid'";
  $result = mysqli_query($conn, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    if ($row["cstatus"] == "1" || $row["cstatus"] == "3") {
     /* echo "ID: " . $row['serviceID'] . "<br>";
      echo "Name: " . $row['uname'] . "<br>";*/
      echo "<script> alert('Change of Request is Approved by Admin');window.location='cservreq.php'</script>";
    } else {
      echo "<script> alert('Change of Request is Not Approved by Admin. If you want to change the service request form, please click on Request For Change');window.location='ustatus.php'</script>";
    }
  } else {
    echo "<script> alert('Invalid Service request')</script>";
  }
}

 ?>
