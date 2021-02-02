<?php 
session_start();
if(isset($_GET["vkey"])==true)
{
 require_once 'config.php';
 $email=$_GET["email"];
 $vkey=$_GET["vkey"];
 $tab=[];

    $result= $mysqli->query("Select vkey from client where emailClient='$email'  ")or die($mysqli->error);
    $ligne=mysqli_fetch_assoc($result);
    //$s= implode($ligne);
    if($ligne["vkey"]!=null)
    {
        if($ligne["vkey"]==$vkey)
        {
        $req=$mysqli->query("UPDATE client SET verified = '1' where emailClient like '$email'") or die(mysqli_error($req));
        echo "<script> alert('Verified'); </script>";
        }
        else{
        echo "<script> alert('Something went wrong !');</script>";
        }
    }
} 
if(isset($_GET['disconnect']))
{
        $_SESSION=array();
        session_destroy();
        echo "<script> alert('Verified'); </script>";
        header("location:AdminLogin/disconnect.php");
     
}
else
{
  if(isset($_SESSION['idClient'])==true)
   {
	$email=$_SESSION["email"];
	$id=$_SESSION["idClient"];
    $nom=$_SESSION["name"];
    $points=$_SESSION["points"];
    echo('<p id="email" style="display:none">'.$email.'</p><p id="idClient" style="display:none">'.$id.'</p>
    <p id="nomClient" style="display:none">'.$nom.'</p>
    <p id="pointsClient" style="display:none">'.$points.'</p>');
    
   }
   else{
    	$email="none";
    	$id="none";
    	$nom="none";
        $points="none";
        echo('<p id="email" style="display:none">'.$email.'</p>
        <p id="pointsClient" style="display:none">'.$points.'</p>
        <p id="idClient" style="display:none">'.$id.'</p>
    <p id="nomClient" style="display:none">'.$nom.'</p>
    ');
    }
}


//footer function ---------------------
function footer()
{
	
   echo ('
         
          <div id="footerSection">
          <div class="container">
          <div class="row">
          <div class="span3">
            <h5>ACCOUNT</h5>
            <a href="login.php">YOUR ACCOUNT</a>
            <a href="login.php">PERSONAL INFORMATION</a>
            <a href="login.php">ADDRESSES</a>

        </div>
        <div class="span3">
            <h5>INFORMATION</h5>
            <a href="contact.php">CONTACT</a>
            <a href="login.php">REGISTRATION</a>
            <a href="legal_notice.html">LEGAL NOTICE</a>

        </div>
        <div class="span3">
            <h5>OUR OFFERS</h5>
            <a href="index.php">NEW PRODUCTS</a>
            <a href="promo_articles.php">TOP PRICES</a>
            <a href="points.php">TOP P0INTS</a>
            <a onclick="showDevelopers()">Site Developers</a>
            <div id="developers">
            <b><a href="https://web.facebook.com/nabil.cambiaso.5" ><h4>Nabil Cambiaso</h4></a></b>
            <b><a href="https://web.facebook.com/smail.elalioui" ><h4>Smail Elalioui</h4></a></b>
            </div>

        </div>
        <div id="socialMedia" class="span3 pull-right">
            <h5>SOCIAL MEDIA </h5>
            <a href="https://web.facebook.com/magintechnology/" target="_blank"><img width="60" height="60" src="themes/images/facebook.png" title="facebook"
                    alt="facebook" /></a>
            <a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter"
                    alt="twitter" /></a>
            <a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube"
                    alt="youtube" /></a>
        </div>
    </div>
    <p class="pull-right">&copy; Nshop</p>
  </div><!-- Container End -->
  </div>');
}
//navbar function ---------------------
function navbar()
{
	echo '
	<div id="welcomeLine" class="row">
			<div class="span6 "><span class="languageWelcome"> Welcome! </span> <a href="login.php"> <strong id="UserLastName">User</strong> </a><span>You Got :</span><span style="color:red;"> <strong id="UserPoints"></strong></span><span> Points</span></div>
			<div class="span6">
				<div class="pull-right">
					<span class="btn btn-small" onclick="languageButton(1)"> <strong> Fr </strong> </span>
					<span class="btn btn-small" onclick="languageButton(0)"> <strong > Eng </strong> </span>
					<!--<span class="badge badge-warning " aria-disabled="true"> <span class="cartPrice"> 0 </span>
						Dh</span>-->
					<a href=""><span class="">||</span></a>
					<a href="product_summary.php"><span class="btn btn-mini btn-danger"><i
								class="icon-shopping-cart icon-white"></i> [ <span class="numberInCart"> 0 </span> ]
							<span class="languageCart">Items in your cart </span> </span></a>
				</div>
			</div>
		</div>
	';
}


 ?>

