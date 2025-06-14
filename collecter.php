
<?php 
session_start();
if (!isset($_SESSION['Adminlog']) || $_SESSION['Adminlog'] != true) {
    header('Location: log1.php');
    exit;     
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: eco.php');
    exit;
}
?>

<?php
 include("view.php");

 ?>
 <?php 
 if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'accept') {
  $id=$_REQUEST['servid'];
  $today = date("Y-m-d H:i:s");
   $in = mysqli_query($conn,"Select *  From `servreq` where `serviceID`='$id'");
 $_SESSION['act']=$_REQUEST['act'];
    
      }
   ?>
<?php  include 'dbconn.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{PATH}/alertify.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

   <style type="text/css">
    table, th, td {
      border: 1px solid black;
      padding: 10px;
    }
    img {
      width: 100px;
      height: 100px;
      margin-right: 10px;
    }
    .image-container {
        display: flex;
        align-items: center;
    } 
  
  </style>
 
  
</style>
</head>
<body>
  <center>
      <table style="width: 70%; margin-top: 10px; ">
       <thead><tr><th>ServiceID</th>
         <th>Name</th>
         <th>Email</th>
         <th>Phone</th>
         <th>Address</th>
         <th>Pincode</th>
         <th>Bio</th>
         <th>NBio</th>
         <th>Image</th>
         <th >Date</th>
         <th>Status</th>
</thead>
  <tbody>
<?php


     $sql = "SELECT * FROM servreq where status=1";
     $result =$conn->query($sql);
     
     if (mysqli_num_rows($result)>0) 
     {

       while ($row=mysqli_fetch_array($result)) 
       {
?>
          <tr>
            <td><?php echo $row['serviceID']??''; ?></td>
            <td><?php echo $row['uname']??''; ?></td>
            <td><?php echo $row['email']??''; ?></td>
            <td><?php echo $row['phone']??''; ?></td>
            <td><?php echo $row['address']??''; ?></td>
            <td><?php echo $row['pincode']??''; ?></td>
            <td><?php echo $row['bio']??''; ?></td> 
            <td><?php echo $row['nbio']??''; ?></td>  
            <?php
                // Fetch and display images for the service ID from another table
                $serviceID = $row['serviceID'];
                $imageSql = "SELECT imageData FROM images WHERE service_id = '$serviceID'";
                $imageResult = $conn->query($imageSql);
                       echo "<td >";
                echo "<div class='image-container'>";
                if ($imageResult && $imageResult->num_rows > 0) {
                  while ($imageRow = $imageResult->fetch_assoc()) {
                    echo '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($imageRow['imageData']) . '"/>';
                  }
                }
                 echo "</div>";
                 echo "</td>"; 
                ?>
            <td id="date"><?php echo $row['date']??''; ?></td> 
            <td><?php 

             
               echo "<form action='view.php?act=accept' method='post'>
                <input type='hidden' name='servid' id='servid' value='".$row['serviceID']."'/>
                <input type='submit' class='btn btn-danger' value='View'/></form>";
                ?></td>   
          </tr>
          <?php
       }

        } else {
          echo '<tr><td colspan="10">No records found.</td></tr>';
        }  
           $conn->close();

    ?>



 </tbody>
</table>
    
  </center>
  


</body>
</html>