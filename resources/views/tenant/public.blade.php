<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<title>Rentfy - @yield('title')</title>
	<!--Link to CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/styles.css">
	<!-- Box icons-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
	<!--Navbar-->
	<header>
		<div class="nav container">
			<!--Logo-->
			<a href ="/" class= "logo"><i class='bx bxs-home'></i>Rentfy</a>
			<!--list -->
			<ul class="navigationbar">
				<li><a  href = "/">Home</a></li>
				<li><a  href = "#about">About us</a></li>
				<li><a  href = "/service">Services</a></li>
				<li><a  href = "/search">Properties</a></li>
			</ul>
			<!-- Log in Button -->
			<a href= "a" class="button">Log in</a>
		</div>
	</header>
    <!--Content-->
    @section('content')
    @show
    <!--Footer-->
	<section class="footer">
		<div class="footer-container container">
			<h2>Rentfy</h2>
			<div class="footer-box">
				<h3>Locations</h3>
				<a href="#">UNIMY</a>
				<a href="#">CyberJaya</a>
				<a href="#">Malaysia</a>
		</div>
		<div class="footer-box">
				<h3>Contact</h3>
				<a href="#">0123456789</a>
				<a href="#">teamx@gmail.com</a>
				<div class="social">
					<a href="#"><i class='bx bxl-facebook'></i></a>
					<a href="#"><i class='bx bxl-twitter'></i></a>
					<a href="#"><i class='bx bxl-instagram'></i></a>
				</div>
		</div>
	</section>
	<!--Copyright-->
	<div class="copyright">
		<p>&#169; Team X,All rights Reserved</p>
	</div>
</body>
</html>