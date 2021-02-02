<?php 
include 'AdminLogin/headerSession.php';
 ?>
 <!--html ------------------------------------------------------------------------------------>
<!DOCTYPE html>
<html lang="en">
<!-- head --------------------------------------------->
<head>
	<meta charset="utf-8">
	<title>Bootshop online Shopping cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<!-- custom css -->
	<link rel="stylesheet" href="css/index.css">
</head>
<!-- body --------------------------------------------->

<body>
	<div id="header">
		<div class="container">
		<div class="row">
			<!-- cart-->
		 <?php navbar() ?>
	    </div>
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
					
						<li class="liDisconnect">
							<!--disconnect-->
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Header End====================================================================== -->
	<div id="mainBody">
		<div class="container">
			<div class="row">
<!--not logged in ********************************************-->
<?php
 if(!isset($_SESSION["email"]))
 {
   echo '
   <div class="span12 register">
					<ul class="breadcrumb">
						<li><a href="index.php" class="languageHome">Home</a> <span class="divider">/</span></li>
						<li class="active languageLogin">Login</li>
					</ul>
					<h3 class="languageLogin"> Login</h3>
					<hr class="soft" />

		            <div class="row">
						<div class="span5 ">
							<div class="well">
								<h5 class="languageCreateAccount">CREATE YOUR ACCOUNT</h5><br />
								<!---->
								<form class="form-horizontal signUpForm">
									<h4 class="languagePersonalInfos">Your personal information</h4>

									<div class="control-group">
										<label class="control-label languageFirstName" for="inputFname1">First name <sup>*</sup></label>
										<div class="controls">
											<input type="text" id="firstNameCreate" placeholder="First Name">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label languageLastName" for="inputLnam">Last name <sup>*</sup></label>
										<div class="controls">
											<input type="text" id="lastNameCreate" placeholder="Last Name">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label " for="inputmail">Email <sup>*</sup></label>
										<div class="controls">
											<input type="text" id="emailCreate" autocomplete="off" placeholder="Email">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="">Telephone <sup>*</sup></label>
										<div class="controls">
											<input type="text" autocomplete="off" id="teleCreate"
												placeholder="Phone Number">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label languagePassword" for="inputPassword1">Password <sup>*</sup></label>
										<div class="controls">
											<input type="password" autocomplete="off" id="passwordCreate"
												placeholder="Password">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label " for="inputPassword1"> Re-Enter<span class="languagePassword"> Password </span>
											<sup>*</sup></label>
										<div class="controls">
											<input type="password" autocomplete="off" id="rePasswordCreate"
												placeholder="Password">
											<div class="rePassword"></div>
										</div>
									</div>
									<h4 class="languageYourAdresse">Your address</h4>
									<div class="control-group">
										<label class="control-label" for="inputFname">Adresse <sup>*</sup></label>
										<div class="controls">
											<textarea name="" id="adresseCreate" cols="34" rows="4"></textarea>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label languagePays" for="state">Country<sup>*</sup></label>
										<div class="controls">
											<select id="countryCreate">
											</select>
										</div>
										<div class="controls">
											<img id="countryImg" width="60px" alt="">
											<!--country flag img-->
										</div>
									</div>
									<div class="control-group">
										<label class="control-label languageCity" for="city">City<sup>*</sup></label>
										<div class="controls">
											<select id="cityCreate">
											</select>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<button id="SignUp" class="btn btn-info SignUp languageSignUp"> Sign Up</button>
										</div>
									</div><div class="control-group">
										<div class="controls signUpAlert">
											
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="span2"> &nbsp;</div>
						<div class="span5 ">
							<div class="well">
								<h5 class="languageAlreadyRegistred">ALREADY REGISTERED ?</h5>
								<form>
									<div class="control-group">
										<label class="control-label" for="inputEmail1">Email</label>
										<div class="controls">
											<input class="span3" type="text" id="inputEmail1" placeholder="Email">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label languagePassword" for="inputPassword1">Password</label>
										<div class="controls">
											<input type="password" class="span3" id="inputPassword1"
												placeholder="Password">
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<button onclick="signIn()" type="button" class="btn languageLogin">Sign in</button>
										</div>
									</div>
									<div class="control-group">
										<div class="controls incorrect">
											<!--alert incorrect email or pass-->
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
  ';
  } 
?>
			</div>
			
 <!--logged in ___________________________________________________________________________________________-->

			<div class="row profilePage">
<?php 
 if(isset($_SESSION["email"]))
 {
	 echo '
	 <div class="span12">
					<ul class="breadcrumb">
						<li><a href="index.php" class="languageHome">Home</a> <span class="divider">/</span></li>
						<li class="active">Profile</li>
					</ul>
				</div>
				<div class="span6">
					<div class="row">
						<div style="text-align:center;" class="span2 setting"><span >Chat Place</span><a href="chat.php"><img style="width: 140px;" src="themes/images/ico/2083506.png"
								alt="Complains" title="Chat"></a> </div>
						<div style="text-align:center;" class="span2 setting"><span >Points Commande</span><a href="pointsCommande.php"><img style="width: 140px;"
								src="themes/images/ico/Transaction_Tracker-512.png" alt="Message Us"></div>
						<div id="idlistecommande" style="text-align:center;" class="span2 setting"><span >Commande list</span><a href="listeCommande.php"><img
									style="width: 140px;" src="themes/images/ico/Transaction_Tracker-512.png"
									alt="Code Promo" title="Commande List" ></a></div>
						<div style="text-align:center;" id="imprimer" class="span2 setting"><span >Imprimer Fichier</span><a href="files.php"><img style="width: 140px; "
								src="themes/images/ico/imprimante-logo-png-5.png" title="Print Files"></a></div>
						<div style="text-align:center;" class="span2 setting"><span >My Points</span><img style="width: 140px;" src="themes/images/ico/Medal-2-512.png"
								alt=""></div>
						<div style="text-align:center;" class="span2 setting"><span >Other</span><img style="width: 140px;" src="themes/images/ico/unnamed.png"
								alt=""></div>
						<div class="well span6">...</div>
					</div>

				</div>
				<div class="span1"></div>
				<div class="span5">
					<div class="well ">
						<h5 style="color: brown;" class="languageMyProfileInfos">My Profile Infos !</h5>
						<form>
							<div class="control-group">
								<label class="control-label languageFirstName" for="inputEmail1">First Name :</label>
								<div class="controls">
									<input class="span3" disabled type="text" id="firstName" placeholder="First Name">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label languageLastName" for="inputPassword1">Last Name :</label>
								<div class="controls">
									<input type="text" disabled class="span3" id="lastName" placeholder="Last Name">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword1">Telephone :</label>
								<div class="controls">
									<input type="text" disabled class="span3" id="telephoneClient"
										placeholder="Telephone">
								</div>
								<div class="controls">
									<a class="ShowChangeTelephone languageChangeTelNumber" href="" style="color: cadetblue;">Change My Telephone
										Number
										?</a>
								</div>
							</div>
							<div class="control-group btnChangeTelephone">
								<div class="controls">
									<input type="button" value="Change Tel Number" id="changeNumber"
										class="span btn-info languageChangeTelNumberButton">
								</div>
							</div>
							<div class="control-group alertChangeTelephone">
								<div class="controls chagetel">

								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword1">Adresse :</label>
								<div class="controls">
									<textarea name="adresse" class="InputChangeAdress" disabled
										placeholder="Adresse ***" cols="34" rows="3"></textarea>
								</div>
								<div class="controls">
									<a class="ShowChangeAdress languageChangeAdress" href="" style="color: cadetblue;">Change My Adresse
										?</a>
								</div>
							</div>
							<div class="control-group btnChangeAdress">
								<div class="controls">
									<input type="button" value="Change Adresse" id="changeAdresse"
										class="span btn-info languageChangeAdressButton">
								</div>
							</div>
							<div class="control-group alertChangeAdress">
								<div class="controls changeAdr">
									
								</div>
							</div>

						</form>
					</div>
					<div class="well">
						<h5 style="color: brown; " class="languageChangeMyPass">Change Password ?</h5>
						<form action="">
							<div class="control-group changePassword">
								<label class="control-label languageEnterExistingPass" for="inputPassword1">Enter Existing Password :</label>
								<div class="controls">
									<input type="password" id="ExistingPassword" class="span3" placeholder="Password">
								</div>
								<label class="control-label languageEnterNewPass" for="inputPassword1">Enter New Password :</label>
								<div class="controls">
									<input type="password" id="newPassword" class="span3" placeholder="Password">
								</div>
							</div>
							<div class="control-group btnChangepassword">
								<div class="controls">
									<input type="button" value="Change" id="changePassword"
										class="span btn-info">
								</div>
							</div>
							<div class="control-group alertChangePaasword">
								<div class="controls alertPass">

								</div>
							</div>
						</form>
					</div>
				</div>
	 ';
 }
?>
			</div>
		</div>
	</div>
	<!-- MainBody End ============================= -->
	<!-- Footer ================================================================== -->
	<?php footer(); ?>
	<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="https://code.jquery.com/jquery-latest.min.js"></script>
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	<script src="themes/js/bootshop.js"></script>
	<script src="themes/js/jquery.lightbox-0.5.js"></script>
	<script src="javascript/index.js"></script>
	<script src="javascript/clienLogin.js"></script>





</body>
</html>