<!DOCTYPE html>
<html>
<head>
    <title>Delivery Boy Registration</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style type="text/css">
	.material-icons{
		margin:  5px 12px 14px;
		 
	}
	img{
		box-shadow: 12px;
		border: 1px inset whitesmoke;
         max-width: 100%;
  height: auto;
        
	}
	
</style>
 <script type="text/javascript">
function validateForm() 
     {    

        
     	       let x = document.getElementById("uname");
               let y = /^[A-Za-z\s]*$/;
               if(x.value =="")
               {
                   alert("Please Enter your name");
                   return false;
               }
               else if (!x.value.match(y))
               {
                   alert("Please enter alphabets only");
                   return false;
               }
          
               let  a = document.getElementById("email");
               let  b = /.+@(gmail|yahoo)\.com$/;
               if(a.value =="")
               {
                   alert("Please enter email id");
                   return false;

               } else if(!a.value.match(b)){   

                    alert("InValid email ID,Only gmail and yahoo mails are accepted!! ");
                    return false;
               } 
               let p = document.getElementById("phone");
               let o = /^[7-9][0-9]*$/;
               if(p.value =="")
               {
                   alert("Please phone number");
                   return false;

               } else if(!p.value.match(o)){   

                   alert("Please Enter phone number starting from 7-9");
                  return false;
                } 
       
      }

    </script>

</head>
<body style="font-family: 'Kalam', cursive;">
   <section class="vh-100" style=" padding: 100px;">
  <div class="container h-100" >
    <div class="row d-flex justify-content-center align-items-center h-100"   >
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 15px; border-color: black; ">
          <div class="card-body p-md-5" >
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="font-family: 'Jura', sans-serif;">Sign up</p>

            <form class="mx-1 mx-md-4" action="coll.php"  method="post" onsubmit="return validateForm()" oninput='cpass.setCustomValidity(cpass.value != pass.value ? "Passwords do not match." : "")'>

                  <div class="d-flex flex-row align-items-center mb-4">
                   <i class="material-icons" style="font-size:36px">account_circle</i>
                    <div class="form-outline flex-fill mb-0">

                      <input type="text" id="uname" name="uname" class="form-control" placeholder="Enter your name" />
               
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="material-icons" style="font-size:36px">mail</i>
                    <div class="form-outline flex-fill mb-0">

                      <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" />
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="material-icons" style="font-size:36px">lock</i>
                    <div class="form-outline flex-fill mb-0">

                   <input type="text" id="pass" name="pass" class="form-control" placeholder="Enter your pass" />
                      
                   
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                   <i class="material-icons" style="font-size:36px">vpn_key</i>
                    <div class="form-outline flex-fill mb-0">

                      <input type="text" id="cpass" name="cpass" class="form-control" placeholder="Enter your pass" />
                     
                    </div>
                  </div>
                  
                  <div class="d-flex flex-row align-items-center  mb-4 ">
                 <i class="material-icons" style="font-size:36px">phone</i>
                    <div class="form-outline flex-fill mb-0  ">
                      <input type="text" id="phone"  name="phone"class="form-control"  placeholder="Enter your phone number" maxlength="10" />
                     
                    </div>
                  </div>

                   <div class="d-flex flex-row align-items-center mb-4">
                <i class="material-icons" style="font-size:36px">place</i>
                    <div class="form-outline flex-fill mb-0">

                      <textarea id="address" name="address" class="form-control"placeholder="Enter your address"cols="20" rows="4" ></textarea>
                    </div>
                  </div>


                  

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" value="Submit">Register</button>
                  </div>

         </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

               <img src="unnamed.jpg"
          class="img-fluid" alt="Phone image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
