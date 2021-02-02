<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        .alert{
            border-radius: 10px;
        }
        .error{
                 background-color: rgb(253, 189, 189);
                 padding: 0.5px 30px;
                 border-radius: 10px;
        }
        .success{
                 background-color: rgb(218, 253, 189);
                 padding: 0.5px 30px;
                 border-radius: 10px;
        }
    </style>
    
    <title>Forgot Password</title>
</head>
<body>
    <div class="container">
    <!-- Just an image -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="dashboard/images/logo/nomac-logo.png" width="140" height="80" alt="nomac-logo" loading="lazy">
  </a>
  <br>

</nav>
<div class="row">
    <hr>
    <br><br>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

     <!-- form -->
     <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputHint">Your Registration Hint </label>
    <input type="text" class="form-control" id="exampleInputHint">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword2">Re-Enter-Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Show Password !</label>
  </div>
  <button type="button" onclick="forgotPass()" class="btn btn-light btn-darken-1" style="border:1px solid gray;padding:0px 30px;">Change Password</button>
  <div class="alert">
     <!--alert here -->
  </div>
</form>

    </div>
    <div class="col-md-3"></div>
</div>
        
    </div>
</body>
<!--js files -->
<script src="js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="js/login.js"></script>

</html>