

<!DOCTYPE html>
<head>
	<title>Login</title>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
	.vh-100{
/* From https://css.glass */
background: rgba(193, 249, 235, 0.4);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(0.3px);
-webkit-backdrop-filter: blur(0.3px);
border: 1px solid rgba(193, 249, 235, 0.58);
/* From https://css.glass */
background: rgba(193, 249, 235, 0.4);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(0.3px);
-webkit-backdrop-filter: blur(0.3px);
border: 1px solid rgba(193, 249, 235, 0.58);

		margin: 5% 25% 5% 25%;

	}
	img{
			border-bottom-right-radius: 15%;
		border-top-left-radius: 15%;
	
        
	}
	#image{
		width: 50%;
		height: 20%;
	}
	body{
font-family: 'Kalam', cursive;
	}
.heading{
	margin-top: 10px;
}
</style>
	

</head>
<body>
	<section class="vh-100">
  <div class="container py-5 h-100">
  	
  		<center>
  			<div class="col-md-8 col-lg-7 col-xl-6" id="image">
  			<img src="collector.png" class="img-fluid" alt="Phone image">
          </div>
  		</center>
  		<div class="heading">
  			   <h2 style="text-align: center;"> Login </h2>
  		</div>
     
      
    <div class="row d-flex  justify-content-center h-100">
      
     


	<form action="colllog.php" method="post">
     
		
	      <div class="form-outline mb-4">
	      	 <label for="email">Email</label>
	               <input type="email" id="email"name="email"  class="form-control form-control-lg" autocomplete="off"required>
	          
	  </div>
	   <div class="form-outline mb-4">
	   	  <label for="pwd"> Password</label>
	      <input type="Password"  id="pwd"name="pwd"  class="form-control form-control-lg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
	       
	  </div>
	   <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
           
        <p>Don't have account ?<a href="collection.php">Register</a></p>
          </div>
	      <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>

	     <!-- <span>Forgot<a id="forgot_pwd" href="#">Password?</a></span> -->
     
   </form>
	

	


    </div>
  </div>
</section>
</body>
</html>