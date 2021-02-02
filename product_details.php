<?php include 'AdminLogin/headerSession.php'; ?>
<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bootshop online Shopping cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
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
	<style type="text/css" id="enject"></style>
</head>
<body>
	<div id="header">
		<div class="container">
			<?php navbar() ;?>
			<!-- Navbar ================================================== -->
			<div id="logoArea" class="navbar">
				<div class="row">
					<hr>
					<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<div >
						<a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop" /></a>
						<!--====================================================-->
						<ul id="topMenu" class="nav pull-right">
							<li class=""><a href="promo_articles.php" class="languagePromoArticles">Promo Articles</a></li>
						    <li class=""><a href="contact.php" class="languageContact">Contact</a></li>
							
							<li class="">
								<a href="login.php" role="button"  style="padding-right:0"><span class="languageLogin"
										 id="login">Login</span></a>
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
				<div class="span12">
					<ul class="breadcrumb">
						<li><a href="index.html">Home</a> <span class="divider">/</span></li>
						<li class="active">product Details</li>
					</ul>
					<div class="row">
						<div  class="span4">
							<div id="gallery">
							 <div class="principal">
								<a id="a1">
									<img id="img1" style="width:100%" /><!--img-->
								</a>
							 </div>
							 <div id="differentview" class="moreOptopm carousel slide">
								<div class="carousel-inner">
									<div class="item active">
										<a id="a2" > <img style="width:29%" id="img2"  /></a>
										<a id="a3" > <img style="width:29%" id="img3" /></a>
										<a id="a4" > <img style="width:29%" id="img4" /></a>
									</div>
								</div>
							 </div>
							</div>
							<div class="btn-toolbar">
								<div class="btn-group">
								<a href="contact.php"><span href="contact.php" class="btn"><i  class="icon-envelope"> </i></span></a>
									<span class="btn"><i class="icon-print"></i></span>
									<span > || </span>
                                    <span><button id="AddToCartButton" style="width:100%; opacity:0.8;" class='btn btn-danger'><span class='languageAddTo'>Add to</span> <i class='icon-shopping-cart'></i></button></span>
								</div>
							</div>
						</div>
						<div class="span8">
							<h3 id="designation">
								<!--reference-->
							</h3>
							<small>- Best Seller , Best Prices In The Market !</small>
							<hr class="soft" />
							<form class="form-horizontal qtyFrm">
								<div class="control-group">
									<label class="control-label"><span id="price"
											style="color: brown; font-size:x-large;">
											<!--price--></span><span> Dh</span></label>
								</div>
							</form>
							<hr class="soft" />
							<h4><span id="quantite">
									<!--quantity--></span> items in stock</h4>
							<hr class="soft clr" />
							<p id="description">
								<!--description-->
							</p>
							<hr class="soft" />
							<hr class="soft" />
							<hr class="soft" />
							<hr class="soft" />
							<!--comments -->
							<div class="row">
								<div class="span6">
									<textarea name="" id="commenter" placeholder="comment !" style="width:100%; border: 1px gray solid;" cols="60" rows="2"></textarea>
								</div>
								<div class="span2"> <input id="commentButton" type="button" style="opacity:0.8;" class="btn btn-danger  btn-medium" value="Comment"></div>
							</div>
							<div class="row commentArea">
								<div class="span2"><h4>Comments</h4></div>
							</div>
							<div class="row ShowComments">
							<hr class="soft" />
							</div>
							<div class="row ShowAllComments">
							<hr class="soft" />
							</div>
						</div>
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
	<!---->
	<script>
	 var sessionEmail='<?php echo($email); ?>';
	 var sessionId='<?php echo($id); ?>';
	 var sessionNom='<?php echo($nom); ?>';
	</script>
	<!---->
	<script src="javascript/products_details.js"></script>
	<script src="javascript/index.js"></script>
</body>
</html>