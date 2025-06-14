<?php  include 'dbconn.php'; ?>
<?php 


  $status = $statusMsg = '';

if (isset($_POST["submit"])) 
{
    $pn = $_POST["pname"]; 
    $des = $_POST["des"];
    $qty = $_POST["qty"];
    $price = $_POST["price"];
    $points = $_POST["points"];

      if (!empty($_FILES["image"]["name"][0]))
    {
            // Get total number of uploaded files
            $fileCount = count($_FILES["image"]["name"]);

  $sql = "INSERT INTO products (pname, description, price, pqty, ppoints) 
                    VALUES ('$pn', '$des', '$price', '$qty', '$points')";

            if ($conn->query($sql) === TRUE) 
       {
       	     $pid = $conn->insert_id;

       	       // Iterate over each uploaded file
                for ($i = 0; $i < $fileCount; $i++) 
                {
                    // Get file info
                    $fileName = basename($_FILES["image"]["name"][$i]);
                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

                    // Allow certain file formats
                    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                    if (in_array($fileType, $allowTypes)) 
                    {
                        $image = $_FILES['image']['tmp_name'][$i];
                        $imgContent = addslashes(file_get_contents($image));

                        // Insert image data into separate table
                            $imageSql = "INSERT INTO pimage (pid, imageType, imageData) VALUES ('$pid', '$fileType', '$imgContent')";

                            if ($conn->query($imageSql) !== TRUE) 
                        {
                            $statusMsg = "Error inserting image data: " . $conn->error;
                            break; // Exit the loop if an error occurs while inserting an image
                        }
                    } else {
                        $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                        break; // Exit the loop if an invalid file type is found
                    }
                }

                    if (empty($statusMsg)) 
                   {
                        $status = 'success';
                        $statusMsg = "Product Added successfully.";
                        header('Location:product.php');
                   }
        } else {
                          $statusMsg = "Error inserting service request data: " . $conn->error;
                }
    } else {
            // $statusMsg = 'Please select at least one image file to upload.';
             echo "<script> alert('Please select at least one image file to upload.');window.location='product.php'</script>";
           }
}
    echo $statusMsg;

    $conn->close();
    ?>














 