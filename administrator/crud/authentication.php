<?php
    include "dbConnexionlogin.php";

//authentification-------------------------------
//login
if(isset($_POST['Login']))
{
    
    $email=mysqli_real_escape_string($mysqli ,$_POST['Email']);
    $password=mysqli_real_escape_string($mysqli ,$_POST['Password']);
    $tab=array();
    $ligne=[];
    if($email!=null)
    {
        $sql= "Select * from admin where adresseEmail=?  ";
       //create a prepared statement
        $stmt=mysqli_stmt_init($mysqli);
             //prepare the prepared statement
           if(!mysqli_stmt_prepare($stmt,$sql))
         {
          echo("Something Went Wrong !");
         }
         else{
           //bind parameters to the placeholders
           mysqli_stmt_bind_param($stmt,"s",$email);
          //run parametres inside database
          mysqli_stmt_execute($stmt);
          $result=mysqli_stmt_get_result($stmt);
          $ligne=mysqli_fetch_assoc($result);
                  
          if(mysqli_num_rows($result)>0)
          {

            if(!password_verify($password,$ligne["password"])==1)
                  {  echo "Incorrect Password !";}
                  else {
                   session_start();
                   $_SESSION["emailAdmin"]=$email;
                   $_SESSION["adminState"]=$ligne["adminState"];
                   $_SESSION["adminNomPrenom"]=$ligne["adresseEmail"];
                    //renvoyé les données sous forme json
                    echo json_encode($ligne);
                }      
          }

        }

    }
  
}

//logout
if(isset($_POST["Logout"]))
{
  session_start();
  session_destroy();

}

//forgotPass Changer
if(isset($_POST["ForgotPass"]))
{
  $email=mysqli_real_escape_string($mysqli ,$_POST["Email"]);
  $hint=mysqli_real_escape_string($mysqli ,$_POST["Hint"]);
  $password=password_hash($_POST['Password'],PASSWORD_DEFAULT);
  $req1=$mysqli->query("select * from authentification where Email='$email' and hint='$hint' ");
     if(mysqli_num_rows($req1)>0)
     {
      $req=$mysqli->query("update authentification set password='$password',OldPass='User Changed his Password ' where Email='$email'");
      echo "1";
      session_start();
      // I want to set User Id Here After Verifying
      $_SESSION["adminID"]=$ligne["UserId"];
     }
     else{
      echo("Email Or Hint Incorrect !");
      return;
     }

}
