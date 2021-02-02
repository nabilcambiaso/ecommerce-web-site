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
        <hr class="soft">
        <hr class="soft">
        <h3>Charger les fichiers que vous voulez imprimer, puis venez les récupérer .</h3>
        <hr class="soft">

        <div class="row" style="height: 100vh;">
            <br>
            
            
            <div class="span5 ">
            <form action="AdminLogin/uploadFiles.php" method="post" enctype="multipart/form-data">
                <h6>Charger Pdf, Excel, Word,ou fichier Image .</h6>
                <h5>Choisissez votre fichier , puis Appuyer sur le boutton enyover Fichier.</h5>
                <input type="file" class="btn btn-small btn-light" name="uploadedFile" style="color:red; border-radius:10px;" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*">
<input type="text" id="clientIdSend" name="clientIdSend" style="display:none;">
<input type="submit" name="uploadBtn" value="Envoyer Fichier" class="btn btn-small btn-light">
            </form>
                <img style=" border-radius:30px;" src="themes/images/ico/wordpdf.png" alt="Word Pdf">

            </div>
            <div class="span7 ">
            <h4>Vous receverez Un appel telephonique pour valider votre Impression de fichiers. </h4>
            <h4>Verifier vos informations telephonique <b><i><a href="./login.php" style="color:red;">Informations</a></i></b></h4>
                <table class="table table-striped">
                <tr><th>Fichier</th><th>Consulter</th><th>Date</th><th>Supprimer*</th></tr>
                <tbody id="tableUploaded"></tbody>
                </table>

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
    <script>
    $(function(){
        var ClientIdSend=$("#idClient").text();
        $("#clientIdSend").val(ClientIdSend);
        
        $.ajax({
            type: "post",
            url: "AdminLogin/uploadFiles.php",
            data: {uploadId:ClientIdSend},
            success: function (response) {
                console.log(response);
                response=JSON.parse(response);
       $.each(response, function (indexInArray, val) { 
        $("#tableUploaded").append(`
        <tr>
        <td>`+val.fileName+`</td>
        <td style='text-align:center;'><a href="AdminLogin/uploaded_files/`+val.fileName+`" target="_blank"><i class="icon-folder-open font-large-2"></i></a></td>
        <td>`+val.dateFiles+`</td>
        <td><button class="btn btn-danger" onclick="deletes(`+val.filesId+`)" >Supprimer</button></td>
        </tr>
        `);  
       });
            }
        });
    })
    function deletes(id)
    {
        $.ajax({
            type: "post",
            url: "AdminLogin/uploadFiles.php",
            data: {deleteId:id},
            success: function (response) {
                window.location.href="./files.php";
            }
        });
    }

    </script>

</body>

</html>