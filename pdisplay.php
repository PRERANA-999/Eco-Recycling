<?php 

session_start();
 ?>
<!DOCTYPE html>
 <html>
  <body>
 
<?php  include 'dbconn.php'; ?>


<?php

$db= $conn;
$tableName="products";
$columns= ['pid', 'pname','description','price','pqty','ppoints'];
$fetchData = fetch_data($db, $tableName, $columns);
function fetch_data($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Columns Name must be defined in an indexed array";
    } elseif (empty($tableName)) {
        $msg = "Table Name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT ".$columnName." FROM $tableName WHERE status IN (0, 1) ORDER BY pid ASC";
        $result = $db->query($query);
        
        if ($result === false) {
            $msg = mysqli_error($db);
        } else {
            $rows = [];
            
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $pID = $row['pid'];
                 /*  echo  $_SESSION['pid']=$row['pid'];*/
                    $imageQuery = "SELECT imageType, imageData FROM pimage WHERE pid = $pID";
                    $imageResult = $db->query($imageQuery);

                    if ($imageResult->num_rows > 0) {
                        $images = mysqli_fetch_all($imageResult, MYSQLI_ASSOC);
                        $row['images'] = $images;
                    }
                    
                    $rows[] = $row;
                }
            }
            
            $msg = $rows;
        }
    }
    
    return $msg;
}

?>
<?php 

 ?>


 </body>
 </html> 