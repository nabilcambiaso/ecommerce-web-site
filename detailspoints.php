<?php
session_start();
if(isset($_SESSION['email1'])==false ):
    header("location:Adminlogin.html");
  endif;
  if(isset($_GET["add"]) && $_GET["add"]=="error")
  {
      echo '<script> alert("Error !") </script>';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
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
   
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="themes/js/jquery.js" type="text/javascript"></script>
    
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    
    <style type="text/css" id="enject"></style>
    <!--==our css ==============-->
    <link rel="stylesheet" href="css/styleAdmin.css">
    <link rel="stylesheet" href="css/index.css">

    <script type="text/javascript">
  //valider
  function valider(objects){
     var id= objects.parentElement.parentElement.childNodes[0].innerText;
console.log('fd');
     $.ajax({
         type: "post",
         url: "AdminLogin/allDetails.php",
         data: {valider:id},
         success: function (response) {
           if(response=="1")
           {
             window.location.href="details_commande.php";
           }
      }
      });

  }
  //refuser
  function refuser(objects){
     var id= objects.parentElement.parentElement.childNodes[0].innerText;
console.log('fd');
     $.ajax({
         type: "post",
         url: "AdminLogin/allpoints.php",
         data: {refuser:id},
         success: function (response) {
           if(response=="1")
           {
             window.location.href="detalispoints.php";
           }
      }
      });

  }
  //la fonction detail commande
  function detail(objects){
     var id= objects.parentElement.parentElement.childNodes[0].innerText;

     $.ajax({
         type: "post",
         url: "AdminLogin/allpoints.php",
         data: {id:id},
         success: function (response) {
          var tab = $.parseJSON(response);
          $(".detail").html("");
        $.each(tab, function (key, val) {
          $(".detail").append("<tr><td><img  style='width:110px; 'src='AdminLogin/images/"+ val.imageArt +"'></td><td>" + val.designation + "</td><td>" + val.nombrePoints + "</td></tr>");
        });
      }
      });

  };

  //la fonction par default
    $(function () {

      // lors de chargement de la page effectué une requete http             
       $.ajax({
         type: "post",
         url: "AdminLogin/allpoints.php",
         data: {all:"all"},
         success: function (response) {
          response= JSON.parse(response);
          if(response.length>0)
          {
        $.each(response, function (key, val) {

          $("tbody:eq(1)").append(" <tr><td>" + val.idlistepoints + "</td><td>" + val.nomClient + "</td>  <td>" + val.prenomClient + "</td> <td><button type='button' onClick='valider(this)'<class='btn btn-primary' >valider</button></td><td><button type='button' onClick='refuser(this)' class='btn btn-danger'>refuser</button></td><td><button type='button' onClick='detail(this)' class='btn btn-info' data-toggle='modal' data-target='#exampleModal'>detail</button></td></tr>");

        });}
        else{
          $("tbody:eq(1)").append("<span class='alert alert-danger'>No item in Queue !</span>");
        }
         }
       });
      
    });
  </script>



</head>

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
                <div >
                    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop" /></a>
                </div>
            </div>
        </div>
    </div>



<div class="container"></div>



  <p></p>
  <p></p>

  <p></p>

  <div class="container">
    <div class="row">

      <div class="col-md-9">

        <div class="panel panel-info">
          <div class="panel-heading">Liste des Points</div>
          <div class="panel-body">
            <div class="col-md-12">

              <div class="panel panel-info">

                <div class="panel-body tp">
                  <table class="table ">

                    <tbody>
                      <table class="table table-light">

                        <tbody>



                        </tbody>
                      </table>

                    </tbody>
                  </table>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
      <!--model detail-->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Details Points</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      <table class="table table-striped "><tbody class="detail"></tbody></table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
      <!--end model-->
      <div class="col-md-1">

      </div>
    
    </div>
    <div class="col-md-7">

    </div>
    <div class="col-md-2">
      
    </div>
    
  </div>






  </div>
   <!-- Footer ================================================================== -->
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
        </div>
        <div class="span3">
            <h5>OUR OFFERS</h5>
            <a href="index.php">NEW PRODUCTS</a>
            <a href="promo_articles.php">TOP PRICES</a>
            <a href="points.php">TOP P0INTS</a>

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
  </div>
            <p class="pull-right">&copy; MaginTechShop</p>
        </div><!-- Container End -->
    </div>

</body>

	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	<script src="themes/js/bootshop.js"></script>
	<script src="themes/js/jquery.lightbox-0.5.js"></script>
</html>