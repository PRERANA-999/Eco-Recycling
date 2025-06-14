<?php


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
    <link rel="stylesheet" type="text/css" href="styles1.css">
   <!-- <script type="text/javascript">
   function calculate() {
  let selectElement = document.getElementById('wasteType');
  let selectedWasteType = selectElement.value;

  // Use a switch statement or if-else conditions to determine the points based on the selected waste type
  let points = 0;
  switch (selectedWasteType) {
    case 'plastic':
      points = 5;
      break;
    case 'paper':
      points = 3;
      break;
    case 'glass':
      points = 2;
      break;
    default:
      points = 0;
  }

  const points = document.getElementById('point');
  point.value = points;
}*/
</script>-->
</head>
<body>
    <h2>Waste Points Calculator</h2>
    <form class="container" action="calculate.php" method="post" autocomplete="off">

   	<label for="nameemail">NAME or EMAIL</label>
	<input type="nameemail" id="nameemail" name="nameemail" required value=""><br><br>
    <label for="password">PASSWORD</label>
	<input type="password" id="password" name="password" required value=""><br><br>
    <label for="cars">Choose a waste type:</label>

<select name="wasteType" id="wasteType" onchange="calculate()">
  <option value="Plastic">Plastic</option>
  <option value="Wood">Wood</option>
  <option value="paper">paper</option>
  <option value="Metal">Metal</option>
</select><br><br>


    

<input type="submit" name="submit" value="Calculate points">
</form>
<br>
<!--<a href="result.php">Calculate points</a>-->
</body>
</html>