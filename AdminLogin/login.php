<?php

require_once 'config.php';

//========================================================================================

$email=mysqli_real_escape_string($mysqli ,$_POST['email']);
$password=mysqli_real_escape_string($mysqli ,$_POST['password']);

if($email!=null)
{
    $sql= "Select * from admin where adresseEmail=? and password=? ";
   //create a prepared statement
    $stmt=mysqli_stmt_init($mysqli);
   //prepare the prepared statement
   if(!mysqli_stmt_prepare($stmt,$sql))
   {
    echo("Incorrect");
   }
   else{
       //bind parameters to the placeholders
       mysqli_stmt_bind_param($stmt,"ss",$email,$password);
      //run parametres inside database
      mysqli_stmt_execute($stmt);
      $result=mysqli_stmt_get_result($stmt);
      
      if(mysqli_num_rows($result)>0)
      {
          session_start();
          $_SESSION["email1"]=$email;
          echo(" Welcome");
      }
      else{
          echo("Incorrect");
      }
    }
    
    
}

//----------------------------



?>