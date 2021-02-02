<?php include 'AdminLogin/headerSession.php'; ?>
<?php if(!isset($_SESSION["idClient"]))
{
 header("Location: login.php");
}?>

 <!--html ----------------------------->
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<!--head ______________________________-->
<head>
	<meta charset="utf-8">
	<title>Bootshop Panier</title>
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
    <!-- datatable css cdn -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<script src="themes/js/jquery.js" type="text/javascript"></script>
    <!-- datatable jquery and js cdn -->
	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" charset="utf8"
		src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- custom css -->
	<style type="text/css" id="enject"></style>
	<link rel="stylesheet" href="css/index.css">
</head>
<!--body ______________________________-->
<body>
	<div id="header">
		<div class="container">
			<!-- Navbar ================================================== -->
			<div id="logoArea" class="navbar">
				<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="">
					<a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop" /></a>
					<ul id="topMenu" class="nav pull-right">
						<li><a href="#" role="button" style="padding-right:0"><span class="btn  btn-danger"
									onclick="disconnect()">Disconnect</span></a></li>
					</ul>
				</div>
			</div>
			<!--end navbar-->
		</div>
	</div>
	<!-- container ____________-->
	<div class="container">
		<div class="row">
			<br>
			<div class="span12 ">
				<ul class="breadcrumb">
					<li><a href="index.html">Home</a> <span class="divider">/</span></li>
					<li class="active">List Commande (bought Articles)</li>
				</ul>
			</div>
			<div class="span12 ">
				<table id="example">
					<thead>
						<tr>
							<th>image</th>
							<th>Designation</th>
							<th>Description</th>
							<th>Date Commande</th>
						</tr>
					</thead>
					<tbody id="tbodyInfos">
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- end container -->

	<!-- Footer ================================================================== -->
	<?php footer(); ?>
	<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	<script src="themes/js/bootshop.js"></script>
	<script src="themes/js/jquery.lightbox-0.5.js"></script>
	<script src="javascript/index.js"></script>
	<script src="javascript/clienLogin.js"></script>
	<script>
		//clear it so the liste commande interval stops --------------
		localStorage.removeItem("IdlisteCommande");
		$(function () {
			// datatables---------------------------------------------
			$("#example").dataTable();
			var t = $("#example").DataTable();
			//--------------------------------------------------------
			$.ajax({
				type: "post",
				url: "AdminLogin/ClientLogin.php",
				data: {
					idClient: idClient
				},
				success: function (response) {
					if (JSON.parse(response).length > 0) {
						$.each(JSON.parse(response), function (key, val) {

							t.row.add(["<img width='140px' src='AdminLogin/images/" + val.imageArt + "' />", val.designation, val.descriptions, val.dateCommande]).draw(false);
						});
					} else {
						$("#tbodyInfos").html("<tr><td colspan='3'><span class='alert alert-info'>Once Your Articles Are Sent to You By the Seller , they Will Appear in here !</span></td></tr>");
					}
				}
			});
		})
		

	</script>

</body>
</html>