
<?php
session_start();
    unset($_SESSION["idClient"]);
    unset($_SESSION["email"]);
    unset($_SESSION["name"]);
    $_SESSION= array();
    session_destroy();
    header("Location: ../index.php");
?>
