<!--value="<?php echo $_SESSION['email'];?>



/*$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 

    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

          // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 

          }
      }   
  }*/


 <!--- <script type="text/javascript">
  	 let  = document.getElementById('option1');
  	 if(option1.checked)
  	 {

  	 }
  </script>
  <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <h1>Create new account</h1>
<form action="/newaccount" method=post
      oninput='up2.setCustomValidity(up2.value != up.value ? "Passwords do not match." : "")'>
  <p>
  <label for="username">E-mail address:</label>
  <input id="username" type=email required name=un>
  <p>
  <label for="password1">Password:</label>
  <input id="password1" type=password required name=up>
  <p>
  <label for="password2">Confirm password:</label>
  <input id="password2" type=password name=up2>
  <p>
  <input type=submit value="Create account">
</form>

</body>
</html>--->
<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<!--Get your code at fontawesome.com-->
</head>
<body>

<i class="fas fa-band-aid"></i>
<i class="fas fa-cat"></i>
<i class="fas fa-dragon"></i>
<i class="far fa-clock"></i>
<i class="fas fa-clock"></i>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<i class="material-icons">cloud</i>
<i class="material-icons" style="font-size:48px;">cloud</i>
<i class="material-icons" style="font-size:60px;color:red;">cloud</i>

</body>
</html>

?>
<?php
 $uname=$row["uname"];
 $email=$row["email"];
 $phone=$row["phone"];
 $address=$row["address"];
 $pincode=$row["pincode"];


 $_SESSION['uname'] = $row['uname'];
 $_SESSION['email'] = $row['email'];
 $_SESSION['phone'] = $row['phone'];
 $_SESSION['address'] = $row['address']; 
 $_SESSION['pincode'] = $row['pincode'];






?>