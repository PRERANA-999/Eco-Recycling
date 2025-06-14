<?php
session_start();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $name = $_POST["name"];
  $email = $_POST["email"];
  $wasteType = $_POST["wasteType"];

  $points = 0;

  // Assign points based on waste type
  switch ($wasteType) {
    case "Plastic":
      $points = 5;
      break;
    case "Wood":
      $points = 3;
      break;
    case "paper":
      $points = 4;
      break;
    case "Metal":
      $points = 6;
      break;
    default:
      $points = 0;
      break;
  }

  // Store points in session
  $_SESSION["wastePoints"] = $points;
$_SESSION["wasteType"] = $wasteType;
  // Insert into the database
  $servername = "localhost:3306";
  $username = "root";
  $password = "";
  $dbname = "waste_collection";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and bind the insert statement
  $stmt = $conn->prepare("INSERT INTO waste_points (name, email,waste_type, points) VALUES ('$name', '$email',?,?)");
  $stmt->bind_param("si", $_SESSION["wasteType"], $points);
  // Execute the statement
  if ($stmt->execute()) {
    echo "Waste points calculated and inserted into the database successfully.";
  } else {
    echo "Error inserting waste points into the database: " . $conn->error;
  }

  // Close statement and connection
  $stmt->close();
  $conn->close();

  // Redirect to display the result
  header("Location: result.php");
  exit();
}
?>

