<?php include 'AdminLogin/headerSession.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<!-- custom css -->
	<link rel="stylesheet" href="css/index.css">
	<style>iframe{width:90vw;
	height:40vh;
	} </style>
    <!-- leaflet map css -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
   <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
</head>
<body>
	<div class="container">
     <?php navbar(); ?>
		
		<!-- Navbar ================================================== -->
		<div id="logoArea" class="navbar ">
			<div class="row ">
				<hr>
				<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div >
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop" /></a>

					<!--====================================================-->
					<ul id="topMenu" class="nav pull-right">
						<li class=""><a href="promo_articles.php">Promo Articles</a></li>
						<li class="">
							<a href="login.php" role="button" style="padding-right:0"><span class=" login"
									id="login">Login</span></a>
							<!--===================================================-->
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</div>


<!-- Header End====================================================================== -->
<div id="mainBody">
<div class="container">
  

</div>
<div class="container">
	<hr class="soften">
	<h1>Visit us</h1>
	<hr class="soften"/>	
	<div class="row">
		<div class="span4">
		<h4>Contact Details</h4>
		<p>	Avenue Al-Maghreb Al-Arabi, Ouarzazate ,<br/> CA 45000, MA
			<br/><br/>
			maginbook@gmail.com<br/>
			﻿Tel 06-61-38-98-44<br/>
		</p>		
		</div>
			
		<div class="span4">
		<h4>Opening Hours</h4>
			<h5> Monday - Friday</h5>
			<p>08:00am - 10:00pm<br/><br/></p>
			<h5>Saturday</h5>
			<p>09:00am - 07:00pm<br/><br/></p>
			<h5>Sunday</h5>
			<p>10:30am - 08:00pm<br/><br/></p>
		</div>
		<div class="span4">
			<br>
		<img src="themes/images/2.jpg" style="width:70%; height:200px; border-radius:15px;" class="carouselOwn"></img>
		</div>
	</div>
	
	<!-- leaflet map ------->
	
	<div class="map ">
		<div class="row">
			<div class="col-md-12">
			<iframe src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d855.6440435161061!2d-6.907750104338558!3d30.92646877620118!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e0!4m0!4m3!3m2!1d30.926307899999998!2d-6.9072488!5e0!3m2!1sen!2sma!4v1596542551824!5m2!1sen!2sma" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> 

			</div>

		</div>
    </div>
	
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php footer(); ?>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>	
	<script src="themes/js/bootshop.js"></script>
	<script src="themes/js/jquery.lightbox-0.5.js"></script>
	<script src="javascript/index.js"></script>
	<script>
		var x=1;
		setInterval(() => {
			$(".carouselOwn").attr("src","themes/images/"+x+".jpg");
			x=x+1;
			if(x==3)
			{
				x=1;
			}
		}, 1000);
		</script>
</body>
</html>