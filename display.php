



<?php
include("admin.php");
?>
<?php
 if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'accept') {
  $id=$_REQUEST['servid'];
  $today = date("Y-m-d H:i:s");
   $in = mysqli_query($conn,"Update `servreq` set `status`='1',`date`='$today'  where `serviceID`='$id'");
    header('Location:accept.php');

 }
 if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'reject') {
  $id=$_REQUEST['servid'];
   $id=$_REQUEST['servid'];
  $today = date("Y-m-d H:i:s");
   $in = mysqli_query($conn,"Update `servreq` set `status`='0',`date`='$today' where `serviceID`='$id'");
    header('Location:display.php');

 }

?>


<!DOCTYPE html>
<html>
<head>
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
   height: 100px;

  }
 
  
</style>

</head>

<body>
	<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div >
      <center>
      <table style="width: 150%; ">
       <thead><tr><th>ServiceID</th>
         <th>Name</th>
         <th>Email</th>
         <th>Phone</th>
         <th>Address</th>
         <th>Pincode</th>
         <th>Bio</th>
         <th>NBio</th>
         <th>Image</th>
         <th width="10%">Date</th>
         <th>Status</th>
         <th colspan="2" style="text-align: center;">Action</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      
      foreach($fetchData as $data){
    ?>
      <tr>
      
      <td><?php echo $data['serviceID']??''; ?></td>
      <td><?php echo $data['uname']??''; ?></td>
      <td><?php echo $data['email']??''; ?></td>
      <td><?php echo $data['phone']??''; ?></td>
      <td><?php echo $data['address']??''; ?></td>
      <td><?php echo $data['pincode']??''; ?></td>
      <td><?php echo $data['bio']??''; ?></td> 
      <td><?php echo $data['nbio']??''; ?></td>  
      <td> <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['image']); ?> "/> </td>
      <td id="date"><?php echo $data['date']??''; ?></td>  
      <td><?php
            if ($data['status']==2) {
              echo "Pending";
            }if ($data['status']==1) {
              echo "Accept";
            }if($data['status']==0){
              echo "Reject";
            }
          ?> </td>
      <td><?php

             
               echo "<form action='display.php?act=accept' method='post'>
                <input type='hidden' name='servid' id='servid' value='".$data['serviceID']."'/>
                <input type='submit' class='btn btn-primary' value='Accept'/></form>
              
                     <td> <form action='reject.php?act=reject' method='post'> 
                       <input type='hidden' name='servid' id='servid' value='".$data['serviceID']."'/>
                     <input type='submit' class='btn btn-danger' value='Reject' id='butn2'/></form> </td>  ";

      ?>

      </td> 
     </tr>
     <?php
      }}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
    
     </table>
     </center>
   </div>
</div>
</div>
</div>




</body>
</html>