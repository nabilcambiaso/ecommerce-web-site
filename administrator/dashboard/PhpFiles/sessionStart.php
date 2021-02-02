<?php 
session_start();
if(!isset($_SESSION["emailAdmin"]) || $_SESSION["adminState"]=="2")
header("Location:.././");
?>