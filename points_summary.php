<?php include 'AdminLogin/headerSession.php'; ?>
<?php if($email=="none")
{header("location:index.php");}?>
<!--html--------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
  <!-- head _________________________________________________________________-->
  <head>
    <meta charset="utf-8" />
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap style -->
    <link
      id="callCss"
      rel="stylesheet"
      href="themes/bootshop/bootstrap.min.css"
      media="screen"
    />
    <link href="themes/css/base.css" rel="stylesheet" media="screen" />
    <!-- Bootstrap style responsive -->
    <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <!-- Google-code-prettify -->
    <link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet" />
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico" />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="144x144"
      href="themes/images/ico/apple-touch-icon-144-precomposed.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="114x114"
      href="themes/images/ico/apple-touch-icon-114-precomposed.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="72x72"
      href="themes/images/ico/apple-touch-icon-72-precomposed.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      href="themes/images/ico/apple-touch-icon-57-precomposed.png"
    />
    <!-- custom css -->
    <link rel="stylesheet" href="css/index.css" />
  </head>
  <!-- body _________________________________________________________________-->
  <body>
<!-- Button trigger modal -->
<button style="display:none;" type="button" id="triggerModal" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verify Commande</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table-striped">
      <tr>
      <th><h3>Are you sure you want to buy these Articles ?</h3></th>
      </tr>
      <tr>
      <th><h4>Verify that this is the correct shipping, informations. </h4></th>
      </tr>
      </table>
      
      <div class="row">
      <hr>
      </div>
      <div  style="display:flex; justify-content:center; text-align:center;">
      <table class=" table table-striped">
      <tr>
      <th>Adresse</th>
      <th>Telephone</th>
      </tr>
      <tbody id="buyInfosVerified"></tbody>
      </table>
      </div>
      
      <div class="row" style="text-align:center;">
      <hr>
      <h5>Change My Shipping Informations ? <b><i><a style="color:red;" href="./login.php">Here</a></i></b></h5>
      </div>
      
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="verifyBuy" class="btn btn-primary">Verify Commande</button>
      </div>
    </div>
  </div>
</div>



    <div id="header">
      <div class="container">
        <!-- Navbar ================================================== -->
        <div id="logoArea" class="navbar">
          <div class="row">
            <a
              id="smallScreen"
              data-target="#topMenu"
              data-toggle="collapse"
              class="btn btn-navbar"
            >
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <div>
              <a class="brand" href="index.php"
                ><img src="themes/images/logo.png" alt="Bootsshop"
              /></a>
              <!--====================================================-->
              <ul id="topMenu" class="nav pull-right">
                <li class="">
                  <a href="promo_articles.php" class="languagePromoArticles">Promo Articles</a>
                </li>
                <li class=""><a href="contact.php" class="languageContact" >Contact</a></li>
                <li class="">
                  <a href="login.php" role="button" style="padding-right: 0;"
                    ><span id="login" class="languageLogin" >Login</span></a
                  >
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
              <li>
                <a href="index.php">Home</a> <span class="divider">/</span>
              </li>
              <li class="active languageShoppongCart">POINTS CART</li>
            </ul>
            <h3>
              <span class="languageShoppongCart"> POINTS CART </span> [
              <small><span class="numberInPointsCart"></span> Item(s) </small>]<a
                href="index.php"
                class="btn btn-large pull-right" 
                ><i class="icon-arrow-left"></i><span class="continueShopping">Continue Shopping</span> 
              </a>
            </h3>
            <hr class="soft" />
            

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="languageProduct">Product</th>
                  <th>Description</th>
                  <th class="languagePoints">Points</th>
                  <th class="languageRemove">Remove</th>
                </tr>
              </thead>
              <tbody class="product">
                <!---->
              </tbody>
            </table>
            <hr class="soft" />
            <hr class="soft" />

            <h2 class="languagedelivery">Delivery</h2>
            <hr class="soft" />
            <div class="span5">
            <select name="livraison" id="livraison">
              <option selected="selected"  value="0"> Amana</option>
              <option  value="1"> Livraison Local </option>
              <option  value="2"> récupérer au magasin</option>
              <option  value="3"> Ctm </option>
              <option  value="4"> Sdtm</option>
              <option  value="5"> Ghazala </option>
              <option  value="6"> Luxe transport</option>
            </select>
              </div>
              <hr class="soft" />
              <hr class="soft" />
              <br><br>
          </div>
          
          <a href="index.php" class="btn"
              ><i class="icon-arrow-left" class="continueShopping"></i><span class="continueShopping">Continue Shopping</span> 
            </a>
            <span class="buyIt"></span>
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
    <!-------------------------script-------------------------------->
    <script src="javascript/index.js"></script>
    <script defer src="javascript/points_summary.js"></script>
  </body>
</html>
