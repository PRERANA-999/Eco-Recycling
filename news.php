


<!DOCTYPE html>    
<head>
    
    <link rel="stylesheet" href="new2.css">
    <script type="text/javascript">

    	 function showHide() {
    let experience = document.getElementById('experience');
    if (experience.value == 1) {
    	document.getElementById('hidden').style.display = 'none';
      document.getElementById('hidden2').style.display = 'block';
        document.getElementById('hidden1').style.display = 'none';
      
    } else {
     
        document.getElementById('hidden').style.display = 'block';
       document.getElementById('hidden1').style.display = 'block';
      document.getElementById('hidden2').style.display = 'none';
    }
  }
      function validateForm() 
     {    

        let exp = document.getElementById('experience');
         if (experience.value == 1) {
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
        }else if(experience.value == 2){

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
          
               let c = document.getElementById("cname");
               let d = /^[A-Za-z\s]*$/;
               if(c.value =="")
               {
                   alert("Please Enter your comp name");
                   return false;
               }
               else if (!c.value.match(d))
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

      }

    </script>
</head>
<body>
     
            <h1>Registration</h1>
       
     <form  action="nreg.php" method="post"onsubmit="return validateForm()" oninput='cpassword.setCustomValidity(cpassword.value != password.value ? "Passwords do not match." : "")'>
           <div class="formbox">
                
                    <div class="csub2">
                    <label for="usrty">Account Type:</label>
                    <select id="experience"onchange="showHide()" >
                    <option value="1" selected>User</option>
                    <option value="2">Client</option>
                    </select>
                    
                </div>
                    <div class="csub2" id="hidden2">
                        <label for="uname">Name: </label> 
                        <input type="text" id="uname" name="uname"  autocomplete="off"/>
                    </div>
                    <div  id="hidden" style="display: none;">
                        <label for="cname">Client Name: </label> 
                        <input type="text" id="cname" name="cname" class="form-control" autocomplete="off" />
                    </div>
                    <div  id="hidden1"style="display: none;" >
                        <label for="coname">Company Name: </label> 
                        <input type="text" id="coname" name="coname" class="form-control" autocomplete="off" />
                    </div>
                   <div class="csub2">
                       <label for="email">Email_ID: </label>
                       <input type="email" id="email" name="email" autocomplete="off"/>
                    </div>
                    <div class="csub2">
                       <label for="password">Password: </label>
                       <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
                    </div>
                     <div class="csub2">
                       <label for="password">Confirm Password: </label>
                       <input type="password" id="cpassword" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
                    </div>
                    <div class="csub2">
                        <label for="phone">Phone Number:</label>
                        <select name="ph" id="ph">
                              <option value="+91">+91</option>
                              <option value="+1">+1</option>
                              <option value="+44">+44</option>
                        </select>
                        <input type="text" id="phone" name="phone" maxlength="10" autocomplete="off"/>
                    </div>
                    <div class="csub2">
                       <label for="address">Address: </label>
                       <textarea id="address" name="address" placeholder="Enter your address"cols="20" rows="4" ></textarea>
                    </div>
                    <div class="csub2">
                       <label for="pincode">Pincode:</label>
                       <input type="text"  id="pincode" name="pincode" maxlength="6" />
                    </div>
                   <div class="csub2">
                   	<button  class="button1" type="submit" value="Submit">Submit</button> &nbsp;
                       <button  class="button2" type="reset" value="Reset">Reset</button>
               
                   </div>
                       

                
              <!-- <span>Forgot<a id="forgot_pwd" href="#">Password?</a></span> -->
            </div>      
     </form>
    </body>
</html>
