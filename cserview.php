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

<!--<?php 

/*echo   $_SESSION['imgid'];
*/  ?>-->

<?php  
include 'dbconn.php';

if (isset($_REQUEST['submit'])) {
    $sid = $_REQUEST['sid'];
    $uname = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $bio = $_REQUEST['bio'];
    $nbio = $_REQUEST['nbio'];
    $address = $_REQUEST['address'];
    $pincode = $_REQUEST['pincode'];
    $imgid=  $_SESSION['imgid'];

    $btype = isset($_REQUEST['type1']) ? $_REQUEST['type1'] : "";
    $nbtype = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
    $bitem = isset($_REQUEST['type2']) ? $_REQUEST['type2'] : "";
    $nbitem = isset($_REQUEST['type5']) ? $_REQUEST['type5'] : "";
    $today = date("Y-m-d H:i:s");

    // Check if new images are uploaded
    if (!empty(array_filter($_FILES['pimg']['name'])))
     {
        // New images are uploaded, delete old images from images table
        $deleteQuery = "DELETE FROM images WHERE service_id = '$sid' AND category = '$imgid'";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        // Process and insert the new images into images table
        $imageCount = count($_FILES['pimg']['tmp_name']);
        for ($i = 0; $i < $imageCount; $i++) {
            $tmpFilePath = $_FILES['pimg']['tmp_name'][$i];
            $fileSize = $_FILES['pimg']['size'][$i];

            // Check if the file has a valid size and temporary path
            if ($fileSize > 0 && is_uploaded_file($tmpFilePath)) {
                $imageData = file_get_contents($tmpFilePath);
                $fileName = basename($_FILES['pimg']['name'][$i]);
                $imageType = pathinfo($fileName, PATHINFO_EXTENSION);

                $insertQuery = "INSERT INTO images (service_id, imageType, imageData, category) VALUES (?, ?, ?, ?)";
                $stmts = mysqli_prepare($conn, $insertQuery);
                mysqli_stmt_bind_param($stmts, "ssss", $sid, $imageType, $imageData, $imgid);
                $ins = mysqli_stmt_execute($stmts);

                if (!$ins) {
                    echo "<script> alert('Failed to update images')</script>";
                    exit; // Exit the script if image insertion fails
                }
            }
        }


        if ($imgid == 1){


        // Update servreq table
        $updateQuery = "UPDATE servreq SET uname = ?, email = ?, phone = ?, address = ?, pincode = ?, bio = ?, btype = ?, bitem = ?,`date` = ?, cstatus = '3' WHERE serviceID = ?";
        $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $uname, $email, $phone, $address, $pincode, $bio, $btype, $bitem,$today, $sid);
        $up = mysqli_stmt_execute($stmt);

        if ($up) {
            echo "<script> alert('Updated Successfully')</script>";
        } else {
            echo "<script> alert('Failed to update servreq')</script>";
        }


        }elseif ($imgid == 2) {

          $updateQuery = "UPDATE servreq SET uname = ?, email = ?, phone = ?, address = ?, pincode = ?, nbio = ?, nbtype = ?, nbitem = ?,`date` = ?, cstatus = '3' WHERE serviceID = ?";
        $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $uname, $email, $phone, $address, $pincode,  $nbio, $nbtype, $nbitem,$today, $sid);
        $up = mysqli_stmt_execute($stmt);

        if ($up) {
            echo "<script> alert('Updated Successfully');window.location='ustatus.php'</script>";
        } else {
            echo "<script> alert('Failed to update servreq');window.location='ustatus.php'</script>";
        }
           
        }else {
      echo "<script> alert('Invalid imgid');window.location='ustatus.php'</script>";
        exit;
    }



    } else {
        // No images uploaded, update only servreq table

        if ($imgid == 1){


        // Update servreq table
        $updateQuery = "UPDATE servreq SET uname = ?, email = ?, phone = ?, address = ?, pincode = ?, bio = ?, btype = ?, bitem = ?,`date` = ?, cstatus = '3' WHERE serviceID = ?";
        $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $uname, $email, $phone, $address, $pincode, $bio, $btype, $bitem,$today, $sid);
        $up = mysqli_stmt_execute($stmt);

        if ($up) {
            echo "<script> alert('Updated Successfully');window.location='ustatus.php'</script>";
        } else {
            echo "<script> alert('Failed to update servreq');window.location='ustatus.php'</script>";
        }


        }elseif ($imgid == 2) {

          $updateQuery = "UPDATE servreq SET uname = ?, email = ?, phone = ?, address = ?, pincode = ?, nbio = ?, nbtype = ?, nbitem = ?,`date` = ?, cstatus = '3' WHERE serviceID = ?";
        $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $uname, $email, $phone, $address, $pincode,  $nbio, $nbtype, $nbitem,$today, $sid);
        $up = mysqli_stmt_execute($stmt);

        if ($up) {
            echo "<script> alert('Updated Successfully');window.location='ustatus.php'</script>";
        } else {
            echo "<script> alert('Failed to update servreq');window.location='ustatus.php'</script>";
        }
           
        }else {
      echo "<script> alert('Invalid imgid');window.location='ustatus.php'</script>";
        exit;
    }










    }
}
?>
