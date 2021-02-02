<?php include 'AdminLogin/headerSession.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Bootshop Promotions </title>
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
			<?php navbar(); ?>
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
							<input type="text" id="srchFld" list="languages">
						    <datalist id="languages"></datalist>
						</form>
						<!--====================================================-->
						<ul id="topMenu" class="nav pull-right">
				    	    <li class=""><a href="points.php" class="languagePointsArticles">Points Articles</a></li>
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
				    <div class="well well-small"><a id="myCart" href="product_summary.php"><img
								src="themes/images/ico-cart.png" alt="cart">[ <span class="numberInCart"> 0 </span> ]
							<span class="languageCart"> Items in your cart </span> </a></div>
					<!--ul categorie-->
					<ul id="sideManu2" class="nav menu1 nav-tabs nav-stacked">
						<!--***-->
					</ul>
				</div>
				<!-- Sidebar end=============================================== -->
				<div class="span9">
					<ul class="breadcrumb">
						<li><a href="index.php" class="languageHome">Home</a> <span class="divider">/</span></li>
						<li class="active languagePromoArticles">Promo Articles</li>
					</ul>
					<h4> 20% <span class="languageSpecialOffer">Discount Special offer</span><small class="pull-right"> <span id="count">0</span>
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
					<div id="myTab" class="pull-right">
						<a href="#listView" onclick="listView()" data-toggle="tab"><span class="btn btn-large"><i
									class="icon-list"></i></span></a>
						<a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-warning"><i
									class="icon-th-large"></i></span></a>
					</div>
					<br class="clr" />
					<div class="tab-content">
						<div class="tab-pane listViewArticle" id="listView">
                           <!--listview products-->
						</div>

						<div class="tab-pane  active" id="blockView">
							<ul class="thumbnails promohtml">
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

</body>

</html>