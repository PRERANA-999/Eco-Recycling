
<?php
// Start the session
session_start();
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style type="text/css">
  table,th,td{
    border: 1px solid black;
   
    padding: 10px;
  }
  img{
    width: 100px;
   height: 100px;

  }
 
  
</style>
</head>
<body>
  <table style="width: 70%; ">
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

     $sql = "SELECT * FROM servreq where status=1";
     $result =$conn->query($sql);
     
     if (mysqli_num_rows($result)>0) {

       while ($row=mysqli_fetch_array($result)) {
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
      <td> <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?> "/> </td>
      <td id="date"><?php echo $row['date']??''; ?></td> 
      <td><?php echo $row['status']??''; ?></td>   

          </tr>
      <?php
    }?>

<?php
    }?>

 </tbody>
</table>
</body>
</html>