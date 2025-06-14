

<!DOCTYPE html>
<head>
	<title>Login</title>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
	.vh-100{
	
background: rgba(183, 250, 180, 0.33);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(2px);
-webkit-backdrop-filter: blur(2px);
border: 1px solid rgba(183, 250, 180, 0.5);
		margin: 60px;
	}
	img{
		box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
		 border-radius: 8px;
		
        
	}
	body{
font-family: 'Kalam', cursive;
	}

.form-inner form .signup-link a{
  color: #fa4299;
  text-decoration: none;
}

.form-inner form .signup-link a:hover{
  text-decoration: underline;
}
</style>
	

</head>
<body>
	<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="serv1.png"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
	<form action="conn.php" method="post">
     
		<h2 style="text-align: center;"> Login </h2>
	      <div class="form-outline mb-4">
	               <input type="email" id="email"name="email"  class="form-control form-control-lg" autocomplete="off"required>
	           <label for="email">Email</label>
	  </div>
	   <div class="form-outline mb-4">
	      
	      <input type="Password"  id="pwd"name="pwd"  class="form-control form-control-lg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
	      <label for="pwd"> Password</label>
	  </div>
	   <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
           
            <a href="fgtpswd.php">Forgot password?</a>
          </div>
	      <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
	      <br><br>

       <div class="signup-link">
          Not a member? <a href="news.php">Signup now</a>
                  </div>


	     <!-- <span>Forgot<a id="forgot_pwd" href="#">Password?</a></span> -->
     
   </form>
</div>
    </div>
  </div>
</section>
</body>
</html>