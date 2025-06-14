<?php 
session_start();

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
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

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
      <table style="width: 70%; ">
       <thead><tr><th>ServiceID</th>
         <th>Name</th>
         <th>Email</th>
         <th>Phone</th>
         <th>Address</th>
         <th colspan="2" style="text-align:center;">Action</th>
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


   $query = mysqli_query($conn,"Select *  From `collection` where `status`='0' ");
  if($query== true){ 

  if (mysqli_num_rows($query)>0){


   while ($row=mysqli_fetch_array($query)) {
    
  ?>
<tr>
     <td><?php echo $_SESSION['coID']=$row['coID']??''; ?></td>
      <td><?php echo $_SESSION['coname']=$row['coname']??''; ?></td>
      <td><?php echo $_SESSION['cemail']=$row['email']??''; ?></td>
      <td><?php echo $_SESSION['cphone']=$row['phone']??''; ?></td>
      <td><?php echo $_SESSION['caddress']=$row['address']??''; ?></td>
      <td><?php 

             
               echo "<form action='collreq.php?act=accept' method='post'>
                <input type='hidden' name='coid' id='coid' value='".$row['coID']."'/>
                <input type='submit' class='btn btn-primary' value='Accept'/></form>
              
                        <td> <form action='collreq.php?act=reject' method='post'> 
                       <input type='hidden' name='coid' id='coid' value='".$row['coID']."'/>
                     <input type='submit' class='btn btn-danger' value='Reject' id='butn2'/></form> </td>  ";

 


                  

      ?></td>   

</tr>
<?php }  
         


?>
<?php } else{?>
  <tr>
    <td colspan='10'>  <?php echo  "No Data Found";  ?>  </td>
  </tr>
  
  <?php } ?>
<?php } ?>

<?php 
if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'accept') {
  $id=$_REQUEST['coid'];

   $in = mysqli_query($conn,"Update `collection` set `status`='1' where `coID`='$id'");
  header('Location:contact.php');

      }

 
 
if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'reject') {
  $id=$_REQUEST['coid'];

   $in = mysqli_query($conn,"Delete  From `collection` where `coID`='$id'");
    header('Location:contact.php');
      }

$conn->close();
 ?>
