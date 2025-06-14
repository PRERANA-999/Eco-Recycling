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
<?php 
echo  $_SESSION['Sid'];
 ?>
 <br>
 <?php 

echo   $_SESSION['imgid'];
  ?>
<?php  include 'dbconn.php'; ?>

<?php 

   
  $id=  $_SESSION['Sid'];
  $imgid= $_SESSION['imgid'];
 
    /*$in = mysqli_query($conn,"Select *  From `products` where `pid`='$id'");
    if (isset($in)) {
         if (mysqli_num_rows($in)>0){
   $row=mysqli_fetch_array($in);  */  
   $query = "SELECT servreq.*, images.imageData
          FROM servreq
          LEFT JOIN images ON servreq.serviceID = images.service_id
          WHERE servreq.serviceID = '$id' AND images.category = '$imgid' ";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);


 ?>

  <!DOCTYPE html>
<html>
<head>
    <title>Retrieve data</title>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <script  defer type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
   <script defer  type="text/javascript" src="reqtypejs.js"></script>
    <link rel="stylesheet" href="fontstyle.css">
  <style type="text/css">
      
      img{
          width: 55px;
          height: 75px;
         margin-top: 5px;
         
       }

   .label-img {
color: burlywood;
margin-left: 10px;
}
  </style>

</head>
<body>
    <div class="min-vh-100 d-flex justify-content-center align-items-center">

        <form method="post" enctype="multipart/form-data" action="cserview.php" class="w-50 p-3">

            <div class="mb-3">
                <label for="sid" class="form-label">Service_ID</label>
                <input type="text" id="sid" name="sid" class="form-control" value="<?php echo $row['serviceID']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="<?php echo $row['uname']; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" class="form-control" name="phone" value="<?php echo $row['phone']; ?>">
            </div>
           
<div class="mb-3">
    <label for="bio" class="form-label">Biodegradable Items:</label>
    <?php if ($imgid == 2): ?>
        <input type="text" id="bio" name="bio" class="form-control" value="<?php echo $row['bio']; ?>" readonly>
    <?php else: ?>
       
    <select class="form-select" aria-label=".form-select-lg example" name="bio" id="bio" onchange="show('div', this)">
            <option id="bio" value="paper" <?php echo ($row['bio'] == 'paper') ? 'selected' : ''; ?>>Paper</option>
            <option id="bio" value="wood" <?php echo ($row['bio'] == 'wood') ? 'selected' : ''; ?>>Wood</option>
            <option id="bio" value="flowers" <?php echo ($row['bio'] == 'flowers') ? 'selected' : ''; ?>>Flowers</option>
            <option id="bio" value="none" <?php echo ($row['bio'] == 'None') ? 'selected' : ''; ?>>None</option>
        </select>

    <?php endif; ?>
</div>


<?php if ($imgid == 1): ?>
    <div class="mb-3">

        <div id="div1" <?php echo ($row['bio'] == 'wood') ? '' : 'style="display:none;"'; ?>>

<select id="type1" name="type1" onchange="showDiv2('item', this)" class="form-select" aria-label=".form-select-lg example">
            <option id="type1" value="item0" selected disabled>Choose wood Type</option>
            <option id="type1" value="ply" <?php echo ($row['btype'] == 'ply') ? 'selected' : ''; ?>>Ply wood</option>
            <option id="type1" value="teak" <?php echo ($row['btype'] == 'teak') ? 'selected' : ''; ?>>Teak wood</option>
        </select>

        </div>

    </div>

    <div class="mb-3">

        <div id="item0" <?php echo ($row['bio'] == 'wood' && $row['btype'] == 'ply') ? '' : 'style="display:none;"'; ?>>
           
            <select id="type2" name="type2" class="form-select" aria-label=".form-select-lg example">
             <option id="type2" value="item0" selected disabled>Items(Ply)</option>
            <option id="type2" value="table" <?php echo ($row['bitem'] == 'table') ? 'selected' : ''; ?>> Tables</option>
            <option id="type2" value="window frames" <?php echo ($row['bitem'] == 'window frames') ? 'selected' : ''; ?>>Window frames</option>
            <option id="type2" value="door" <?php echo ($row['bitem'] == 'door') ? 'selected' : ''; ?>>Door</option>
            </select>

        </div>

    </div>

    <div class="mb-3">

        <div id="item3" <?php echo ($row['bio'] == 'wood' && $row['btype'] == 'teak') ? '' : 'style="display:none;"'; ?>>
            
            <select id="type2" name="type2" class="form-select" aria-label=".form-select-lg example">
            <option id="type2" value="item0" selected disabled>Items(teak)</option>
            <option id="type2" value="table"<?php echo ($row['bitem'] == 'table') ? 'selected' : ''; ?>>Tables</option>
            <option id="type2" value="beds"<?php echo ($row['bitem'] == 'beds') ? 'selected' : ''; ?>>Wooden Beds</option>
         <option id="type2" value="door"<?php echo ($row['bitem'] == 'door') ? 'selected' : ''; ?>>Door</option>
            </select>

        </div>

    </div>
<?php endif; ?>





<div class="mb-3">
    <label for="nbio" class="form-label">Non Biodegradable Items:</label>
    <?php if ($imgid == 1): ?>
        <input type="text" id="nbio" name="nbio" class="form-control" value="<?php echo $row['nbio']; ?>" readonly>
    <?php else: ?>
        
<select class="form-select" aria-label=".form-select-lg example" name="nbio" id="nbio" onchange="showDiv('div', this)">
            <option id="nbio" value="glass" <?php echo ($row['nbio'] == 'glass') ? 'selected' : ''; ?>>Glass</option>
            <option id="nbio" value="plastic" <?php echo ($row['nbio'] == 'plastic') ? 'selected' : ''; ?>>Plastic</option>
            <option id="nbio" value="e-waste" <?php echo ($row['nbio'] == 'e-waste') ? 'selected' : ''; ?>>E-waste</option>
            <option id="nbio" value="none" <?php echo ($row['nbio'] == 'None') ? 'selected' : ''; ?>>None</option>
        </select>

    <?php endif; ?>
</div>

<?php if ($imgid == 2): ?>
<div class="mb-3">
    
    <div id="div2" <?php echo ($row['nbio'] == 'plastic') ? '' : 'style="display:none;"'; ?>>
        
        <select id="type" name="type" onchange="showDiv1('items', this)"  class="form-select" aria-label=".form-select-lg example">
            <option id="type" value="item0" selected disabled>Choose Plastic Type</option>
            <option id="type" value="1 – polyethylene terephthalate (PET)" <?php echo ($row['nbtype'] == '1 – polyethylene terephthalate (PET)') ? 'selected' : ''; ?>>1 – Polyethylene Terephthalate (PET)</option>
            <option id="type" value="5 – polypropylene (PP)" <?php echo ($row['nbtype'] == '5 – polypropylene (PP)') ? 'selected' : ''; ?>>5 – Polypropylene (PP)</option>
        </select>

    </div>

</div>

<div class="mb-3">

<div id="items2" <?php echo ($row['nbio'] == 'plastic' && $row['nbtype'] == '1 – polyethylene terephthalate (PET)') ? '' : 'style="display:none;"'; ?>>

    <select id="type5" name="type5"  class="form-select" aria-label=".form-select-lg example">
            <option id="type5" value="item0" selected disabled>Items(PET)</option>
            <option id="type5" value="bottles" <?php echo ($row['nbitem'] == 'bottles') ? 'selected' : ''; ?>>Bottles</option>
            <option id="type5" value="containers" <?php echo ($row['nbitem'] == 'containers') ? 'selected' : ''; ?>>Boxes/Containers</option>
            <option id="type5" value="bags" <?php echo ($row['nbitem'] == 'bags') ? 'selected' : ''; ?>>Bags</option>
    </select>

</div>

</div>

    <div class="mb-3">

     <div id="items1" <?php echo ($row['nbio'] == 'plastic' && $row['nbtype'] == '5 – polypropylene (PP)') ? '' : 'style="display:none;"'; ?>>

    <select id="type5" name="type5"  class="form-select" aria-label=".form-select-lg example">
                <option id="type5" value="item0" selected disabled>Items(PP)</option>
                <option id="type5" value="chairs" <?php echo ($row['nbitem'] == 'chairs') ? 'selected' : ''; ?>>Chairs</option>
                <option id="type5" value="tupperware containers" <?php echo ($row['nbitem'] == 'tupperware containers') ? 'selected' : ''; ?>>Tupperware Containers</option>
                <option id="type5" value="plant pots" <?php echo ($row['nbitem'] == 'plant pots') ? 'selected' : ''; ?>>Plant Pots</option>
    </select>

 </div>

</div>

<?php endif; ?>     

            <div class="mb-3">
                <label for="pimg" class="form-label">Image</label>
                <div class="image-container">
                    <?php
                      $imageData = $row['imageData'];
                 if (!empty($imageData)) {
                    echo '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($imageData) . '" style="margin-right: 10px;"/>';
                     }

                    ?>
                </div>
                <input type="file" id="pimg" class="form-control" name="pimg[]" multiple>
            </div>


            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea type="text" id="address" class="form-control" name="address"><?php echo $row['address']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="pincode" class="form-label">Pincode</label>
                <input type="text" id="pincode" class="form-control" name="pincode" value="<?php echo $row['pincode']; ?>">
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    
</body>
</html>


 <?php 
     }
   
?>
