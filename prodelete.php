<?php  include 'dbconn.php'; ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style type="text/css">
  
  img{
    width: 50px;
   height: 70px;

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
  
  
    <div class="container" style="width:120%">
    
      <table  class="table table-success table-hover table-responsive  " >
       <thead ><tr><th>Product_ID</th>
         <th>Product_Name</th>
         <th>Description</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Points</th>
         
         <th  style="text-align:center;">Images</th>
        
         
    </thead>
    <tbody>


  <?php


        $sql = "SELECT * FROM products WHERE status = 2";
        $result = $conn->query($sql);

          if ($result && $result->num_rows > 0) 
            {
                while ($row = $result->fetch_assoc()) 
                  {
  ?>
      <tr>
      
      <td><?php echo $row['pid']??''; ?></td>
      <td  class="w-25" style="text-align:left;"><?php echo $row['pname']??''; ?></td>
      <td  ><?php 
                echo "<div class='d'>";
              echo $row['description']??''; 
               echo "</div>";?></td>
      <td><?php echo $row['price']??''; ?></td>
      <td><?php echo $row['pqty']??''; ?></td>
      <td><?php echo $row['ppoints']??''; ?></td>
     <?php
                // Fetch and display images for the service ID from another table
                 $pid = $row['pid'];
                  $imageQuery = "SELECT imageType, imageData FROM pimage WHERE pid = $pid";
                    $imageResult = $conn->query($imageQuery);

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

     

     </tr>
     <?php
      }}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo "No Data Found !!!" ?>
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