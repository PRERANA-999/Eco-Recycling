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
<style type="text/css">
  table,th,td{
    border: 1px solid black;
   
    padding: 10px;
  }
  img{
    width: 100px;
   height: 70px;

  }
 
  
</style>
</head>
<body>
  <center>
<table style="width: 70%; margin-top: 10px;">
       <thead><tr><th>ServiceID</th>
         <th>Name</th>
         <th>Email</th>
         <th>Phone</th>
         <th>Address</th>
         <th>Pincode</th>
         <th>Bio</th>
         <th>NBio</th>
         <th >Date</th>
         <th>Collecter_ID</th>
         <th>Status</th>
</thead>
<tbody>
<?php
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

?>


<?php 

 $ins = mysqli_query($conn,"Select *  From `servreq` where  `status`='3'");
  if($ins== true){ 

  if (mysqli_num_rows($ins)>0)
  {
      while ($row=mysqli_fetch_array($ins)) 
     {
 ?>

   <tr>
      
      <td><?php echo $row['serviceID']??'';?> </td>
      <td><?php echo $row['uname']??''; ?></td>
      <td><?php echo $row['email']??''; ?></td>
      <td><?php echo $row['phone']??''; ?></td>
      <td><?php echo $row['address']??''; ?></td>
      <td><?php echo $row['pincode']??''; ?></td>
      <td><?php echo $row['bio']??''; ?></td>
      <td><?php echo $row['nbio']??''; ?></td>
      <td><?php echo $row['date']??''; ?></td>
      <td><?php echo $row['coID']??''; ?></td>
       <td><?php 

             
              if($row['status']==3){
              echo "<p>Assigned</p>";
            }
             
 


                  

      ?>
        

       </td>
                      
      <?php
   } 
  } else {
          echo '<tr><td colspan="10">Not yet Assigned !!</td></tr>';
        }
} 
$conn->close();
?>

</tr>
</tbody>
</table>
</center>
</body>
</html>