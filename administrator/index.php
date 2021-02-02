<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard/css/bootstrap.css">
    <link rel="stylesheet" href="dashboard/fonts/icomoon.css">
    <link rel="icon" href="dashboard/images/logo/LogoNomac.ico" type="image/ico" />
    <link rel="stylesheet" href="dashboard/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="dashboard/css/bootstrap-extended.css">
    <link rel="stylesheet" href="dashboard/css/app.css">
    <link rel="stylesheet" href="dashboard/css/colors.css">
    <link rel="stylesheet" href="dashboard/css/vertical-menu.css">
    <link rel="stylesheet" href="dashboard/css/vertical-overlay-menu.css">
    <link rel="stylesheet" href="dashboard/css/login-register.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/Logo_ofppt.png">
    <link rel="stylesheet" href="sass/style.css">

    <title>MaginTechnology - Login</title>
</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
                                <img src="../themes/images/logo.png" alt="ofppt logo" width="100">
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>SE CONNECTER</span></h6>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <form class="form-horizontal form-simple" method="post">
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="email" class="form-control form-control-lg input-lg" id="inputEmail"  placeholder="Email Adress" required>
                                        <div class="form-control-position">
                                            <i class="icon-head"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" class="form-control form-control-lg input-lg" id="inputPassword"  placeholder="Password" required>
                                        <p class="showpassword" onclick="showPassword()">Show Password !</p>
                                        <div class="form-control-position">
                                            <i class="icon-key3"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group row">
                                        <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                        </div>
                                        <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="ForgotPass" class="card-link">Forgot Password ?</a></div>
                                    </fieldset>
                                    <button type="button" onclick="login()" class="btn btn-primary btn-lg btn-block" style="background-color:grey;"><i class="icon-unlock2"></i> Login</button>
                                </form>
                                <div class="alert"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            </section>
        </div>
      </div>
    </div>
    <div class="footer">
        <div class="copy">
           <p> &copy;<script>document.write(new Date().getFullYear() )</script></p>
        </div>
    </div>

    <script src="dashboard/js/jquery.min.js"></script>
    <script src="dashboard/js/tether.min.js"></script>
    <script src="dashboard/js/bootstrap.min.js"></script>
    <script src="dashboard/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="dashboard/js/unison.min.js"></script>
    <script src="dashboard/js/blockUI.min.js"></script>
    <script src="dashboard/js/jquery.matchHeight-min.js"></script>
    <script src="dashboard/js/app-menu.js"></script>
    <script src="dashboard/js/app.js"></script>
    <script src="js/login.js"></script>

</body>
</html>
