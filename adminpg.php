
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WASTE</title>
	 <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="design.css">
   <style>
  #button {
    width: 150px; /* Adjust the width as needed */
    height: 50px; /* Adjust the height as needed */
  }
</style>

</head>
<body>   
<div class="heading">
          <img src="recycle-logo-design-illustration-free-vector.jpg">
           <div class="navigation">

                <div class="navitem">
                 <a href="eco.php" class="navlink"><span>Home</span></a>
                </div>

                <div class="navitem">
                 <a href="adminpg.php" class="navlink"><span>About</span> </a>
                </div>

                <div class="navitem">
                 <a href="contact.php" class="navlink"><span>Contact</span></a>
                </div>
                <div class="navitem">
                 <a href="news.php" class="navlink"><span>Register</span></a>
                </div>
            </div>
    </div>

   <div class="content01">
   	<div class="content1">
   		<h2>RECYCLE RIGHT</h2>
   		<P>Every time you choose to recycle, you're giving that item a second life to serve a new purpose and save natural resources. Now more than ever, it’s important that only the right items, free from contamination, make their way into your recycling bin.</P>
   	</div>	
   	
   </div>
   <div class="content2">
   		<h2>Why work with us?</h2>
   		<p>We formulate effective waste management plans to solve the massive waste problem in our cities. To ensure proper office waste management, we create awareness programs and encourage employee engagement to make these efforts  successful. In residential communities, we coordinate with  volunteers, welfare associations, housekeeping and maintenance staff. Similarly, students in various institutions are encouraged to  segregate waste and reduce the pressure on landfills.</p>
   	</div>


   	<div class="container">
   		<h1>video gallery</h1>
         <div class="row">
         	<div class="col">
         	   <div class="feature-img">
         	   	<img src="images/trash.jpg" width="100%">
         	   	<img src="images/paly.jpg"class="play-btn" onclick="playVideo('images/vid1.mp4')">
         	     
         </div> 
          </div>   
         <div class="col">
         	   <div class="small-img-row">
         	   	 <div class="small-img">
	         	   	 <img src="images/sep.jpg" >
	         	   	 <img src="images/paly.jpg"class="play-btn" onclick="playVideo('images/workers-hand.mp4')">
         	   	 </div>
           	   	 <p><h4>seperating the waste as bio degradable and non biodegradable</h4></p>
         	   </div>
         	  
         	   <div class="small-img-row">
         	   	 <div class="small-img">
	         	   	 <img src="images/recycling-2.jpg">
	         	   	 <img src="images/paly.jpg"class="play-btn" onclick="playVideo('images/vid2.mp4')">
	         	   	 </div>
	           	   	  <p><h4>Handing the waste over to waste collector</h4></p>
                    </div>
                    <div class="small-img-row">
         	   	     <div class="small-img">
		         	   	   <img src="images/delicery.jpg">
		         	   	   <img src="images/paly.jpg"class="play-btn" onclick="playVideo('images/delivery-man.mp4')" >
         	   	     </div>
		           	   	 <p><h4>Order and collect the recycled products at your doorstep</h4></p> 
		              </div>	
                </div>  
             </div>
          </div>    
      

         <div class="video-player" id="videoPlayer">
          	<video width="100%" controls autoplay id="myVideo">
      		  <source src="images/vid1.mp4" type="video/mp4">
      	   </video>
      	   <img src="images/close.jpg" class="close-btn" onclick="stopVideo()">
      	     
         </div>

         <script>
         	var videoPlayer = document.getElementById("videoPlayer");
         	var myVideo = document.getElementById("myVideo");

         	function stopVideo(){

         		videoPlayer.style.display = "none";

         	}

         	function playVideo(file){
         		myVideo.src = file;
         		videoPlayer.style.display = "block";
         	}

         </script>

    

  <div class="element">
    <input type="checkbox" name="agree" id="agree" onclick="Enable();" >I have read the above article
  </div>
  

  <input type="Submit" id="button" value="redirect" disabled onclick = "window.loction: news.php">


<script>
  function Enable(){
  	var check = document.getElementById("agree");
  	var btn = document.getElementById("button");
  	if(agree.checked){
  		button.removeAttribute("disabled");

  	} else {
  		button.disabled = "true";
  	}
  }


</script>

</body>
</html>

