<?php
//this php file is used to store session variables
session_start();

    $_SESSION["idClient"]=$_POST["idClient"];
	$_SESSION["email"]=$_POST["email"];
    $_SESSION["name"]=$_POST["nom"];
    $_SESSION["points"]=$_POST["point"];
//________________________________________________
