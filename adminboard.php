<?php 
session_start();
if (!isset($_SESSION['Adminlog']) || $_SESSION['Adminlog'] != true) {
    header('Location: log1.php');
    exit;     
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: eco.php');
    exit;
}
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 14px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
#single{
 
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;

}
.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
#navi{
  margin-top:8px;
  
}
.btn{
  margin-left: 45%; 
padding: 5px;
font-size: 14px; 

  font-family: inherit;
  color: black;

  border-radius: 10px;
  background: #ff1a1a;
  

  box-shadow: -5px -5px 15px #444, 5px 5px 15px #222,  5px 5px 10px #444,  -5px -5px 10px #222;
  font-family: 'Damion', cursive;
 
  font-size: 16px;
 
  transition: 500ms;
}

.btn:hover {
 box-shadow: inset -5px -5px 15px #ff8080, inset 5px 5px 15px #ff8080,  inset 5px 5px 10px #ff8080;
  
  transition: 500ms;
   
}

</style>
</head>
<body style="background-color:white;">

<div class="navbar">
  <div class="navbar-header">
      <a class="navbar-brand" href="eco.php">ECO RECYCLING</a>
    </div>
  <div class="dropdown">
    <button class="dropbtn">Service
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="display.php" target="iframe_a">Service Request</a>
      <a href="accept.php"  target="iframe_a">Service Accepted</a>
      
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Collecter
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="collreq.php" target="iframe_a">Collecter Login Request</a>
      <a href="display1.php"  target="iframe_a">Collecter Details</a>
    </div>
  </div> 
   <div class="dropdown">
    <button class="dropbtn">Assign
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="collecter.php" target="iframe_a">Assigning to Collecter</a>
      <a href="assign.php"  target="iframe_a">Assigned Status</a>
    </div>
 </div> 
    <a id="single" href="collected.php" target="iframe_a">Collected Details</a>
 <form  id ="navi" class="navbar-right" method="POST">
      <button class="btn" type="submit" name="logout" class="btn btn-danger" >Logout</button>
    </form>
</div>
<div class="container">
  <iframe src=""name="iframe_a" height="490px" width="100%"  title="Iframe Example" style="border: none; "></iframe>
</div>
</body>
</html>
