<?php include 'AdminLogin/headerSession.php'; ?>
<?php if(!isset($_SESSION["idClient"]))
{
 header("Location: login.php");
}?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
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
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


    <style type="text/css" id="enject"></style>

    <link rel="stylesheet" href="css/index.css">
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
                <div class="">
                    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop" /></a>
                    <ul id="topMenu" class="nav pull-right">
                        <li><a href="#" role="button" style="padding-right:0"><span class="btn  btn-danger"
                                    onclick="disconnect()">Disconnect</span></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!--end navbar-->
    <div class="container">
        <div class="row" style="height: 100vh;">
            <br>
            <div class="row" style="text-align:center;">
            <h2>Envoyez Nous des Messages, Questions, plaints ou autres .</h2>
            </div>
            
            <div class="span7 ">
                <div class="row"> 
                <Label>Message:</Label><input type="text" id="chatInput" class="sendMessage" placeholder="Send Message to Magin Technology"  style="width:100%;">
                    <button class="btn btn-info" id="btnSendChat" style="width:100%;" onclick="send()">Send Message</button></div>
                    <hr> 
                <div class="messages ">
                    <div class="row me" >
                        
                    </div>
                </div>

            </div>
            <div class="span1 "></div>
            <div class="span4 ">
            <img src="themes/images/ico/2083506.png" alt="Chat">
            </div>

        </div>
    </div>

    <!-- Footer ================================================================== -->
    <?php footer(); ?>
    <!-- Placed at the end of the document so the pages load faster ============================================= -->
    <script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="themes/js/google-code-prettify/prettify.js"></script>
    <script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
    <script src="javascript/index.js"></script>
    <script src="javascript/clienLogin.js"></script>
    <script src="javascript/chat.js"></script>
    <script>

    </script>


</body>

</html>