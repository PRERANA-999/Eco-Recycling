<?php
session_start();
include 'dbconn.php';
include 'proheader.php';




if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
  $pid = $_POST['pid'];
  $pname = $_POST['pname'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $imageData =base64_decode($_POST['imageData']);
  $imageType = $_POST['imageType'];

  $product = array(
    'pid' => $pid,
    'pname' => $pname,
    'description' => $description,
    'price' => $price,
    'imageData' => $imageData,
    'imageType' => $imageType
  );

  $_SESSION['cart'][] = $product;


$stmt = $conn->prepare("INSERT INTO addtocart (pid, pname, description, price, imageData) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("issss", $pid, $pname, $description, $price, $imageData);
  $stmt->execute();

  // Display a success message
  echo "<p>Product added to the cart successfully.</p>";
  $stmt->close();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check if the product ID is submitted
  if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];

    // Retrieve the product details from the database
    $query = "SELECT * FROM products WHERE pid = $pid";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
      $product = $result->fetch_assoc();

      // Check if the cart is already initialized in the session
      if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
      }

      // Add the product to the cart
      $_SESSION['cart'][] = $product;

      // Display a success message
      echo "<p>Product added to the cart successfully.</p>";
    } else {
      echo "<p>Product not found.</p>";
    }
  } else {
    echo "<p>Invalid request.</p>";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    img {
      width: 60px;
      height: 100px;
    }

    .card {
      margin-top: 10px;
      margin-bottom: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: box-shadow 0.3s;
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 10px;
      /*width: 220px; /* Adjust card width as needed */*/
    }

    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .card .card-title {
      font-size: 15px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .card .card-text {
      font-size: 14px;
      line-height: 1.4;
      height: 56px; /* Display 2 lines of text */
      overflow: hidden;
      margin-bottom: 10px;
    }

    .card ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .card ul li {
      font-size: 14px;
      margin-bottom: 5px;
    }

    .card .card-body {
      display: flex;
      flex-direction: column; /* Align card text below the title */
      justify-content: space-between;
      align-items: flex-start; /* Adjust alignment as needed */
    }

    .card .card-body a {
      text-decoration: none;
      color: #fff;
      padding: 8px 16px;
      border-radius: 5px;
      font-size: 14px;
    }

    .card .card-body .btn-primary {
      background-color: #007bff;
    }

    .card .card-body .btn-primary:hover {
      background-color: #0056b3;
    }

    .card .card-body .btn-success {
      background-color: #28a745;
    }

    .card .card-body .btn-success:hover {
      background-color: #1e7e34;
    }
  </style>

</head>
<body>
  <div class="container">
    <div class="row">
      <?php
      // Display the products
      $query = "SELECT p.pid, p.pname, p.description, p.price, p.pqty, p.ppoints, i.imageData,i.imageType
                FROM products p
                LEFT JOIN pimage i ON p.pid = i.pid";
      $result = $conn->query($query);

      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <div class="col-sm-3">
  <div class="card">
    <?php
    // Display the existing image if available
    if ($row['imageData']) {

      echo '<img src="data:images/jpg;charset=utf8;base64,' . base64_encode($row['imageData']) . '" class="card-img-top" />';
     echo '';
echo '';

    } else {
      // Display a placeholder image if no image is available
      echo '<img src="placeholder.jpg" class="card-img-top" />';
    }
    ?>

    <div class="card-body">
      <h5 class="card-title"><?php echo $row['pname'] ?? ''; ?></h5>
      <p class="card-text"><?php echo $row['description'] ?? ''; ?></p>
      <ul>
        <li>Product ID: <?php echo $row['pid'] ?? ''; ?></li>
        <li>Price: <?php echo $row['price'] ?? ''; ?></li>
        <li>Quantity: <?php echo $row['pqty'] ?? ''; ?></li>
        <li>Points: <?php echo $row['ppoints'] ?? ''; ?></li>
      </ul>

      <div class="card-buttons">
        <a href="#" class="btn btn-primary">View</a>
<form></form>
  <input type="hidden" name="imageData[]" value="$row['imageData']">
  <input type="hidden" name="imageType[]" value="$row['imageType']">
          <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
          <input type="hidden" name="pname" value="<?php echo $row['pname']; ?>">
          <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
          <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
        
                    <button type="submit" name="submit" class="btn btn-success">Add to Cart</button>
                  

                  

       
      </div>
    </div>
  </div>
</div>

               
      <?php
        }
      } else {
        echo "<p>No Data Found !!!</p>";
      }
      $conn->close();
      ?>
    </div>
  </div>

  <div class="footer-container">
    <?php include 'footer.php'; ?>
  </div>
</body>
</html>
