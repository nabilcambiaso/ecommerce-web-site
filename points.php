<?php include 'AdminLogin/headerSession.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Bootshop Points </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap style -->
	<link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen" />
	<link href="themes/css/base.css" rel="stylesheet" media="screen" />
	<!-- Bootstrap style responsive -->
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<!-- Google-code-prettify -->
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet" />
	<!-- fav and touch icons -->
	<link rel="shortcut icon" href="themes/images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144"
		href="themes/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114"
		href="themes/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<!---->
	<link rel="stylesheet" href="css/index.css">
	<style type="text/css" id="enject"></style>
</head>

<body>
	<div id="header">
		<div class="container">
		<div id="welcomeLine" class="row">
			<div class="span6 "><span class="languageWelcome"> Welcome! </span> <a href="login.php"> <strong id="UserLastName">User</strong> </a></div>
			<div class="span6">
				<div class="pull-right">
					<span class="btn btn-small" onclick="languageButton(1)"> <strong> Fr </strong> </span>
					<span class="btn btn-small" onclick="languageButton(0)"> <strong > Eng </strong> </span>
					<!--<span class="badge badge-warning " aria-disabled="true"> <span class="cartPrice"> 0 </span>
						Dh</span>-->
					<a href=""><span class="">||</span></a>
					<a href="points_summary.php"><span class="btn btn-mini btn-warning"><i
								class="icon-shopping-cart icon-white"></i> [ <span class="numberInPointsCart"> 0 </span> ]
							<span class="languageCart">Points items in your cart </span> </span></a>
				</div>
			</div>
		</div>
			<!-- Navbar ================================================== -->
			<div id="logoArea" class="navbar">
				<div class="row">
<hr>
					<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<div>
						<a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop" /></a>
						<!--search form ======================================-->
						<form class="form-inline navbar-search" >
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
						</form>
						<!--====================================================-->
						<ul id="topMenu" class="nav pull-right">
						<li class=""><a href="promo_articles.php" class="languagePromoArticles">Promo Articles</a></li>
						    <li class=""><a href="contact.php" class="languageContact">Contact</a></li>
							<li class="">
								<a href="login.php" role="button" style="padding-right:0"><span class="languageLogin"
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
			<div class="row">
				<!-- Sidebar ================================================== -->
				<div id="sidebar" class="span3">
				    <div class="well well-small"><a id="myCart" href="points_summary.php"><img
								src="themes/images/ico-cart.png" alt="cart">[ <span class="numberInPointsCart"> 0 </span> ]
							<span class="languageCart"> Items in your points cart </span> </a></div>
					<!--ul categorie-->
					<ul id="sideManu2" class="nav menu1 nav-tabs nav-stacked">
						<!--***-->
					</ul>
				</div>
				<!-- Sidebar end=============================================== -->
				<div class="span9">
					<ul class="breadcrumb">
						<li><a href="index.php" class="languageHome">Home</a> <span class="divider">/</span></li>
						<li class="active languagePointsArticles">Points Articles</li>
					</ul>
					<h4> <span class="languagePointsOffer">Points Special offer</span><small class="pull-right"> <span id="countPoint">0</span>
					 <span class="languageProductsAvailable">products are available </span> </small></h4>
					<hr class="soft" />
					<form class="form-horizontal span6">
						<div class="control-group">
							<label class="control-label alignL">Sort By </label>
							<select>
								<option>Price Lowest first</option>
								<option>Price Highest first</option>
							</select>
						</div>
					</form>

					<br class="clr" />
					<div class="tab-content">

						<div class="tab-pane  active" id="blockView">
							<ul class="thumbnails pointshtml">
								<!--promo products-->
							</ul>
							<hr class="soft" />
						</div>
					</div>
					<br class="clr" />
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
	<script src="javascript/points_summary.js"></script>

</body>

</html>