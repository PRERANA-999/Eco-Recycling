
<?php 
session_start();
if (!isset( $_SESSION['Collecterlog']) || $_SESSION['Collecterlog'] != true) {
    header('Location: log1.php');
    exit;     
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: eco.php');
    exit;
}
?>
<?php  include 'dbconn.php'; ?>
<?php


if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'accept') {
  $id=$_REQUEST['servid'];
  $today = date("Y-m-d H:i:s");
   $in = mysqli_query($conn,"Select *  From `servreq` where `serviceID`='$id'");
  if($in== true){ 

  if (mysqli_num_rows($in)>0){
   $row=mysqli_fetch_array($in);
  ?>
  <!DOCTYPE html>
<html>
<head>
<title> Retrive data</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{PATH}/alertify.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<style type="text/css">
    .container{
        display: flex;
        justify-content: center;
        align-content: space-around;
      
        width: 60%;
        margin-top: 10vh;
        flex-direction: column;

    }
    #sub{
       
   
     padding: 10px;
         
       
    }
    #button{

        margin-left: 2%;
    }

</style>
</head>
<body>
    <div class="min-vh-10 d-flex justify-content-center align-items-center">

         
    <form action="view3.php" method="post" enctype="multipart/form-data">
  <div clas id="sub">
    <div class="container ">


<div class="form-group row">
    <label for="sid" class="col-sm-2 col-form-label col-form-label-sm" >ServiceID</label>
    <div class="col-sm-10">
      <input type="text" id="sid" name="sid"class="form-control form-control-sm" value="<?php echo $row["serviceID"];?>"readonly >
    </div>
  </div>


  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
    <div class="col-sm-10">
   <input type="text" id="name"class="form-control form-control-sm"name="name" value="<?php echo $row["uname"]; ?>"readonly>
  </div>
</div>

  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
     <div class="col-sm-10">
   <input type="email" id="email"class="form-control form-control-sm" name="email" value="<?php echo $row["email"]; ?>"readonly>
  </div>
</div>

<div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label col-form-label-sm">Phone</label>
    <div class="col-sm-10">
   <input type="text" id="phone"class="form-control form-control-sm" name="phone" value="<?php echo $row["phone"]; ?>"readonly>
  </div>
</div>
<div class="form-group row">
    <label for="address" class="col-sm-2 col-form-label col-form-label-sm">Address</label>
    <div class="col-sm-10">
   <input type="text" id="address"class="form-control form-control-sm" name="address" value="<?php echo $row["address"]; ?>"readonly>
  </div>
</div>
<div class="form-group row">
    <label for="pincode" class="col-sm-2 col-form-label col-form-label-sm">Pincode</label>
    <div class="col-sm-10">
   <input type="text" id="pincode"class="form-control form-control-sm" name="pincode" value="<?php echo $row["pincode"]; ?>"readonly>
  </div>
</div>
<div class="form-group row">
  <label for="wasteType" class="col-sm-2 col-form-label col-form-label-sm">Waste Type:</label>
  <div class="col-sm-10">
    <select id="wasteTypes" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" multiple>
    <option value="types" selected>Choose Types</option>
      <option value="plastic">Plastic</option>
      <option value="paper">Paper</option>
      <option value="metal">Metal</option>
      <option value="glass">Glass</option>
    </select>
  </div>
  <textarea type="text" id="pointsTextbox" readonly ></textarea>
</div>


<div class="form-group row">
    <label for="quantity" class="col-sm-2 col-form-label col-form-label-sm">Quantity</label>
    <div class="col-sm-10">
   <input type="text" name="quantityContainer" class="form-control form-control-sm" id="quantityContainer" readonly>
   
  </div>
</div>

<div class="form-group row">
    <label for="calculatedPoints" class="col-sm-2 col-form-label col-form-label-sm">Points</label>
    <div class="col-sm-10">
    <input type="text" name="pointsContainer" id="pointsContainer" readonly value="0">
</div>
</div>


<div class="form-group row">
    <label for="date" class="col-sm-2 col-form-label col-form-label-sm">Date</label>
    <div class="col-sm-10">
   <input type="text" id="date"class="form-control form-control-sm" name="date" value="<?php echo $row["date"]; ?>"readonly>
  </div>
</div>
<div class="form-group row">
    <label for="coid" class="col-sm-2 col-form-label col-form-label-sm">CoID</label>
    <div class="col-sm-10">
   <input type="text" id="coid"class="form-control form-control-sm" name="coid" value="<?php echo $row["coID"]; ?>"readonly>
  </div>
</div>
<div class="form-group row">
     <label for="file-input"  class="col-sm-2 col-form-label col-form-label-sm">Drop Image:</label>
    <div class="col-sm-10">
         <input type="file" class="form-control form-control-sm" name="image[]" accept="image/*"  id="file-input" width="10px" height="20px"multiple>
 </div>
</div>
<div class="form-group row">
    <div   class="d-grid gap-2 d-md-block" id="button">
 
   <button type="submit" name="submit" class="btn btn-primary">Submit</button>
 
</div>

</div>
 
</form>

  </div>
    
</div>
        
 </div>
 
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('wasteTypes').addEventListener('change', displayPoints);
function displayPoints() {
  var selectedOptions = Array.from(document.getElementById('wasteTypes').selectedOptions);
  var pointsTextbox = document.getElementById('pointsTextbox');
  var quantityContainer = document.getElementById('quantityContainer');
  var pointsContainer = document.getElementById('pointsContainer');

  // Clear previous points
  pointsTextbox.value = '';
  quantityContainer.value = '';
  pointsContainer.value = '0';

  var quantities = [];
  var currentIndex = 0;

  function displaySelectedPoints() {
    var wasteType = selectedOptions[currentIndex].value;
    var points = getPointsForWasteType(wasteType);

    // Append the waste type and points to the textbox
    pointsTextbox.value += wasteType + ': ' + points + ' points\n';

    // Prompt user for quantity
    var quantity = prompt('Enter quantity for ' + wasteType + ':');
    quantities.push(quantity || 0);

    currentIndex++;

    if (currentIndex < selectedOptions.length) {
      // Allow selection of the next waste type after the quantity is entered
      setTimeout(function () {
        displaySelectedPoints();
       
      }, 0);
    } else {
      // All waste types displayed, update quantities and calculate total points

      // Update the quantityContainer value as a comma-separated string
      quantityContainer.value = quantities.join(', ');

      // Calculate total points
      var totalPoints = 0;
      for (var j = 0; j < selectedOptions.length; j++) {
        wasteType = selectedOptions[j].value;
        quantity = parseInt(quantities[j]) || 0;
        points = getPointsForWasteType(wasteType);
        totalPoints += points * quantity;
      }

      // Update the pointsContainer value with the total points
      pointsContainer.value = totalPoints;
    }
  }

  displaySelectedPoints();
}


      function updatePoints(event) {
        var wasteType = event.target.dataset.wasteType;
        var quantity = parseInt(event.target.value);
        var points = getPointsForWasteType(wasteType);
        var calculatedPoints = points * quantity;
        var pointsContainer = document.getElementById('pointsContainer');

        var existingPointsElement = document.getElementById(wasteType + 'Points');
        if (existingPointsElement) {
          existingPointsElement.textContent = calculatedPoints;
        } else {
          var newPointsElement = document.createElement('p');
          newPointsElement.id = wasteType + 'Points';
          newPointsElement.textContent = calculatedPoints;
          pointsContainer.appendChild(newPointsElement);
        }

        // Update the contents of the pointsContainer
        var pointsElements = Array.from(pointsContainer.getElementsByTagName('p'));
        var pointsValues = pointsElements.map(function(element) {
          return element.textContent;
        });
        pointsContainer.value = pointsValues.join(', ');

        // Check if quantity is NaN or empty and update the pointsContainer input field accordingly
        if (isNaN(quantity) || event.target.value.trim() === '') {
          pointsContainer.value = '0';
        }

        // Update the quantityContainer value as a comma-separated string
        var quantityInputs = Array.from(document.getElementById('quantityContainer').parentNode.querySelectorAll('input[type="number"]'));
        var quantities = quantityInputs.map(function(input) {
          return input.value;
        });
        document.getElementById('quantityContainer').value = quantities.join(', ');
      }

      function getPointsForWasteType(wasteType) {
        // Replace this with your own logic to get the points for each waste type
        // Here's a simple example:
        var pointsMap = {
          plastic: 5,
          paper: 3,
          metal: 7,
          glass: 2
        };

        return pointsMap[wasteType] || 0; // Default to 0 points if the waste type is not found
      }
    });
  </script>
   
</body>
</html>
    <?php } ?>
     <?php } ?>
      <?php } ?>

<?php 
/*
if(isset($_REQUEST['submit'])){
  $sid=$_REQUEST['sid'];
  $cid=$_REQUEST['coid'];
  $points=$_REQUEST['calculatedPoints'];
  $qt=$_REQUEST['quantity'];
 $in = mysqli_query($conn,"Update `servreq` set  `status`='4',`coID`='$cid',`points`='$points',`quantity`='$qt' where `serviceID`='$sid'");
 echo "<script> alert('collected Successfully')</script>";
 header('Location:view1.php');
}*/


 ?>