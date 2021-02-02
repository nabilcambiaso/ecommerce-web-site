<?php include "PhpFiles/sessionStart.php"; ?>
<?php 
function navMagasinier()
{
  echo ('
    
  <!DOCTYPE html>
  <html lang="en">
  <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../themes/images/logoRound.ico" type="image/ico" />
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="fonts/icomoon.css">
        <link rel="stylesheet" href="fonts/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="css/bootstrap-extended.css">
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="css/colors.css">
        <link rel="stylesheet" href="css/vertical-menu.css">
        <link rel="stylesheet" href="css/vertical-overlay-menu.css">
        <link rel="stylesheet" href="css/all.min.css">
        <!-- datatable -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- our style -->
    <link rel="stylesheet" href="css/style.css">
  
        
        <title>Magin Technology Portal</title>
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
      <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
          <div class="navbar-header">
          <ul class="nav navbar-nav">
              <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
              <li class="nav-item "><a href="index" class="navbar-brand nav-link"><img alt="branding logo" src="../../themes/images/logowhite.png"   class="brand-logo logo1" width="150"></a></li>
              <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
            </ul>
          </div>
          <div class="navbar-container content container-fluid">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
              <ul class="nav navbar-nav">
                <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle showHide hidden-xs"><i class="icon-menu5">         </i></a></li>
              </ul>
              <ul class="nav navbar-nav float-xs-right">
                <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar"><img src="../../themes/images/logoRound.png" alt="avatar"></span><span class="user-name text-uppercase UserName"><!--name here --></span><i class="icon-arrow-down-b"></i></a>
                  <div class="dropdown-menu dropdown-menu-right"> 
                    <div class="dropdown-divider"></div><a  class="dropdown-item Logout"><i class="icon-power3"></i>Log Out</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow mn">
        <div class="main-menu-header"  style="margin-top:90px;">
          <div class="row">
           
            <div class="col-md-11 ml-1" style="margin-top:5px;">
              <span>Hello<br><b class="text-uppercase UserName"><!--name here --></b></span>
            </div>
          </div>
        </div>
        <div class="main-menu-content">
          <ul data-menu="menu-navigation" class="navigation navigation-main">
              <li><br><hr style="background-color:rgba(255, 255, 255, 0.15);"></li>
              <li class="nav-item navigateProducts mt-2 "><a href="./products"><i class="icon-desktop"></i><span class="sideMenu">Products</span></a></li>
            <li class="nav-item navigatecommande mt-2 "><a href="./listecommandemagasinier"><i class="icon-cart"></i><span class="sideMenu">liste Commande</span></a></li>
              <hr style="background-color:rgba(255, 255, 255, 0.15);">
        
          </ul>
        </div>
      </div>
      <div class="app-content content container-fluid">
      ');
  
}
function nav()
{
    echo ('
    
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="../../themes/images/logoRound.ico" type="image/ico" />
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="fonts/icomoon.css">
      <link rel="stylesheet" href="fonts/flag-icon-css/css/flag-icon.min.css">
      <link rel="stylesheet" href="css/bootstrap-extended.css">
      <link rel="stylesheet" href="css/app.css">
      <link rel="stylesheet" href="css/colors.css">
      <link rel="stylesheet" href="css/vertical-menu.css">
      <link rel="stylesheet" href="css/vertical-overlay-menu.css">
      <link rel="stylesheet" href="css/all.min.css">
      <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

      <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <!-- our style -->
  <link rel="stylesheet" href="css/style.css">

      
      <title>Magin Technology Portal</title>
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
        <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item "><a href="index" class="navbar-brand nav-link"><img alt="branding logo" src="../../themes/images/logowhite.png"   class="brand-logo logo1" width="150"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle showHide hidden-xs"><i class="icon-menu5">         </i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar"><img src="../../themes/images/logoRound.png" alt="avatar"></span><span class="user-name text-uppercase UserName"><!--name here --></span><i class="icon-arrow-down-b"></i></a>
                <div class="dropdown-menu dropdown-menu-right"><a href="../dashboard/AccountSetting" class="dropdown-item"><i class="icon-user"></i>Admin Settings</a>
                  <div class="dropdown-divider"></div><a  class="dropdown-item Logout"><i class="icon-power3"></i>Log Out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow mn">
      <div class="main-menu-header"  style="margin-top:90px;">
        <div class="row">
         
          <div class="col-md-11 ml-1" style="margin-top:5px;">
            <span>Hello<br><b class="text-uppercase UserName"><!--name here --></b></span>
          </div>
        </div>
      </div>
      <div class="main-menu-content">
        <ul data-menu="menu-navigation" class="navigation navigation-main">
            <li><br><hr style="background-color:rgba(255, 255, 255, 0.15);"></li>
            <li class="nav-item navigatepromo mt-2 "><a href="./promo"><i class="icon-price-tag"></i><span class="sideMenu">Promo Articles</span></a></li>
            <li class="nav-item navigateProducts mt-2 "><a href="./products"><i class="icon-desktop"></i><span class="sideMenu">Products</span></a></li>
            <li class="nav-item navigatePoints mt-2 "><a href="./points"><i class="icon-svg"></i><span class="sideMenu">Points Articles</span></a></li>
            <li class="nav-item navigatecommande mt-2 "><a href="./listecommande"><i class="icon-cart"></i><span class="sideMenu">liste Commande</span></a></li>
            <li class="nav-item navigatePointscommande mt-2 "><a href="./pointscommande"><i class="icon-cart2"></i><span class="sideMenu">Points Commande</span></a></li>
            <li class=" nav-item navigateGeneral mt-2"><a href=""><i class="icon-stack"></i><span class="menu-title">General  </span></a>
            <ul class="menu-content">
                <li class=" nav-item"><a href="./categorie"><i class="icon-books"></i><span>Categorie</span></a></li>
                <li class=" nav-item"><a href="./sousCategorie"><i class="icon-books"></i><span>Sous Categorie</span></a></li>
            </ul>
            </li>
            <hr style="background-color:rgba(255, 255, 255, 0.15);">
      
        </ul>
      </div>
    </div>
    <div class="app-content content container-fluid">
    ');
}
function footer()
{
  echo ('
  </div>

  <footer class="footer footer-light navbar-border">
      <p class="clearfix text-muted text-sm-center mb-0 px-2">
        <span class="float-md-center d-xs-block d-md-inline-block">
            Copyright  &copy;  
            <script>
              document.write(new Date().getFullYear());
            </script> 
            CFP , all rights reserved. </span>
        </span>
      </p>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <script src="js/unison.min.js"></script>
    <script src="js/blockUI.min.js"></script>
    <script src="js/jquery.matchHeight-min.js"></script>
    <script src="js/charts/chart.min.js"></script>
    <script src="js/app-menu.js"></script>
    <script src="js/app.js"></script>
    <script src="js/Dashboard.js"></script>
    <script src="../js/Dashboard.js"></script>
    <script src="../dashboard/js/statistic.js"></script>
    <script src="https://kit.fontawesome.com/fcf883af02.js" crossorigin="anonymous"></script>
</body>
</html>

  ');
}