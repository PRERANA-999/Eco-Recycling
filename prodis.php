
<?php
include("pdisplay.php");
?>
<?php
 
 if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'reject') {
  $id=$_REQUEST['pid'];
  
 // $today = date("Y-m-d H:i:s");
   $in = mysqli_query($conn,"Update `products` set `status`='2' where `pid`='$id'");
     header('Location:prodis.php');

 }

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style type="text/css">
  
  img{
    width: 50px;
   height: 100px;

  }
  body{
    text-align: center;
    margin-top: 10px;
    margin-left: 180px;
    
     /* From https://css.glass */
border-radius: 16px;

-webkit-backdrop-filter: blur(1px);
border: 1px solid rgba(255, 255, 255, 0.3);
  }
  .image-container {
        display: flex;
        align-items: center;


    }

    .image {
       
        width: 90%;
        height: 60px;
    }
  

  
</style>

</head>

<body>
	<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
  
    <div class="container" style="width:120%">
    
      <table  class="table table-success table-hover table-responsive  " >
       <thead ><tr><th>Product_ID</th>
         <th>Product_Name</th>
         <th>Description</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Points</th>
         
         <th  style="text-align:center;">Images</th>
        
         <th colspan="2" style="text-align: center;">Action</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      
      foreach($fetchData as $data){

// Inside the loop
$pid = $data['pid'] ?? '';
$_SESSION['pid'] = $pid;

    ?>
      <tr>
      
    <td><?php echo $_SESSION['pid'] ?? ''; ?></td>
      <td  class="w-25" style="text-align:left;"><?php echo $data['pname']??''; ?></td>
      <td  ><?php 
                echo "<div class='d'>";
              echo $data['description']??''; 
               echo "</div>";?></td>
      <td><?php echo $data['price']??''; ?></td>
      <td><?php echo $data['pqty']??''; ?></td>
      <td><?php echo $data['ppoints']??''; ?></td>
      <?php 

            echo "<td >";
            echo "<div class='image-container'>";
       if (isset($data['images'])) {

            foreach ($data['images'] as $image) {
                $imageType = $image['imageType'];
                $imageData = $image['imageData'];
                $base64Image = base64_encode($imageData);
                $src = 'data:image/' . $imageType . ';base64,' . $base64Image;
                echo "<img src='$src'  alt='Image' class='image'/>";
               
            }
             
        }
        echo "</div>";
            echo "</td>"; 
        ?> 

     


      
    <td> <?php

             
               echo "<form action='pview.php?act=accept' method='post'>
                <input type='hidden' name='pid' id='pid' value='".$data['pid']."'/>
                <input type='submit' class='btn btn-primary' value='Edit'/></form>
              
                     <td> <form action='prodis.php?act=reject' method='post'> 
                       <input type='hidden' name='pid' id='pid' value='".$data['pid']."'/>
                     <input type='submit' class='btn btn-danger' value='Delete' id='butn2'/></form> </td>  ";

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
       }
       $conn->close();
    ?>
    </tbody>
    
     </table>

   </div>

</div>
</div>
</div>

</body>
</html>