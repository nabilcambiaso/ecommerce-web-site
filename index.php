<?php include 'AdminLogin/headerSession.php'; ?>
<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>NabilShop online Shopping </title>
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
	<link rel="stylesheet" href="css/index.css">
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
					<a class="brand" href="index.php"><img title="Home" src="themes/images/logo.png" alt="Home" /></a>
					<!--search form ======================================-->
					<form class="form-inline navbar-search ">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="text" id="srchFld" list="languages">
						
						
						<select name="Categorie" id="searchCategorie" class="form-inline  input-medium searchCategorie">
							<option class="categorieOption" selected="selected" value="All">Categories</option>
							
						</select>
						<datalist id="languages">
                        </datalist>
					</form>
					<!--====================================================-->
					<ul id="topMenu" class="nav pull-right">
				    	<li class=""><a href="points.php" class="languagePointsArticles">Points Articles</a></li>
						<li class=""><a href="promo_articles.php" class="languagePromoArticles">Promo Articles</a></li>
						<li class=""><a href="contact.php" class="languageContact">Contact</a></li>
						<li class="">
							<a href="login.php" role="button" style="padding-right:0"><span class=" login languageLogin"
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
	</div>
	<div id="mainBody">
		<div class="container">
			<div class="row">
		
			</div>
			<div class="row">
				<!-- Sidebar ================================================== -->
				<div id="sidebar" class="span3">
					<div class="well well-small"><a id="myCart" href="product_summary.php"><img
								src="themes/images/ico-cart.png" alt="cart">[ <span class="numberInCart"> 0 </span> ]
							<span class="languageCart"> Items in your cart </span> </a></div>
					<!--ul categorie-->
					<ul id="sideManu" class="nav menu1 nav-tabs nav-stacked">
						<!--***-->
					</ul>
				</div>
				<!-- Sidebar end=============================================== -->
				<div class="span9">
					<div class="well well-small promocarousel">
						<h4 id="promo"><span class="languagePromoCarousel">Promo Products</span> <small class="pull-right">100+ <span class="languagePromoCarousel">products on Promotions</span></small></h4>
						<div class="row-fluid">
							<div id="featured" class="carousel slide">
								<div class="carousel-inner carouselPromo">

								</div>
								<a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
								<a class="right carousel-control" href="#featured" data-slide="next">›</a>
							</div>
						</div>
					</div>
					<!-- products ----------------------------------------------->
					<h4><span class="languageLatestArticle">Latest Products</span> </h4>
					
					<ul class="thumbnails  latestProductsThumbnail">
					</ul>
				</div>
			</div>
		</div>
		
	</div>
	<!-- Footer ================================================================== -->
	<?php footer(); ?>
	<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	<script src="themes/js/bootshop.js"></script>
	<script src="themes/js/jquery.lightbox-0.5.js"></script>
	<!-------------------------script-------------------------------->
	<script src="javascript/index.js"></script>
	
</body>

</html>
