<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Yeseva One&effect=outline">
	<title></title>
	<style type="text/css">
		footer {
			background-color:#bfcdd6;
			color: #9C7A63;
			padding: 20px;
			font-family: 'Yeseva One', cursive;
		}

		.footer-content {
			display: flex;
			justify-content: space-between;
		}

		.company-info {
			margin-right: 50px;
		}

		.footer-links ul {
			list-style-type: none;
			padding: 0;
			margin: 0;
		}

		.footer-links ul li {
			display: inline;
			margin-right: 10px;
		}

		.footer-links ul li a {
			color: #1a251c;
			text-decoration: none;
			transition: background-color 0.3s ease;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
			padding: 5px 10px;
			border-radius: 4px;
			background-color: #f3ffcd; /* Added background color */
		}

		.footer-links ul li a:hover {
			background-color: #efecfd;
			color:#3D5742;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
		}

		.motto {
			text-align: center;
			margin-top: 20px;
		}

		.logo {
			display: inline-block;
			vertical-align: middle;
			margin-right: 10px;
			border: 2px solid #ffffff;
			padding: 5px;
			border-radius: 4px;
		}

		.logo img {
			width: 100%;
			height: 200px; /* Adjust the height as needed */
		}

		.company-name {
			font-size: 25px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		.company-info p {
			margin-bottom: 5px;
			font-size: 10px; /* Increased font size */
		}
	</style>
</head>
<body>
	<footer>
		<div class="footer-content">
			<div class="company-info">
				<h3 class="company-name">Eco Recycling Solutions</h3>
				<p>123 Eco Way, Recycling City</p>
				<p>Phone: 123-456-7890</p>
				<p>Email: info@ecorecyclingsolutions.com</p>
				<p>Eco Recycling Solutions is a leading provider of sustainable waste management and recycling solutions. We are dedicated to transforming waste into valuable resources, contributing to a greener and cleaner environment. With our innovative technologies and committed team, we strive to make a positive impact on the planet and create a sustainable future for generations to come.</p>
			</div>
			<div class="logo">
				<img src="save-the-planet_animal-01-.jpg" alt="Your Company Logo">
			</div>
		</div>
		<div class="footer-links">
			<ul>
				<li><a href="eco.php">Home</a></li>
				<li><a href="usrprodis.php">Products</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="">Contact</a></li>
			</ul>
		</div>
		<div class="motto">
			<p>Transforming waste into valuable resources for a sustainable future</p>
		</div>
	</footer>
</body>
</html>
