<?php
//connexion a la base de donnees securisee
require 'config.php';
//==login======================================================================================
if(isset($_POST['login']))
{
     $email=  mysqli_real_escape_string($mysqli , $_POST['email']);
     $password=$_POST['password'];
     $tab=[];
     $verified=[];
     //query
     $sql="select passwordclient from client where emailClient=? ;";
     //create a prepared statement
     $stmt=mysqli_stmt_init($mysqli);
     //prepare the prepared statement
         if(!mysqli_stmt_prepare($stmt,$sql))
        {echo("Incorrect statement !");}
        else
        {
                        //bind parameters to the placeholders
                         mysqli_stmt_bind_param($stmt,"s",$email);
                        //run parametres inside database
                         mysqli_stmt_execute($stmt);
                         $result=mysqli_stmt_get_result($stmt);
                if(mysqli_num_rows($result)>0)
               {    
                 $ligne=mysqli_fetch_assoc($result);
                  if(!password_verify($password,$ligne["passwordclient"])==1)
                  {  echo "Incorrect Password !";}
                  else
                   {
                     $sql="select nomClient, emailClient ,idClient , points from client where emailClient=?;";
                     //create a prepared statement
                      $stmt=mysqli_stmt_init($mysqli);
                     //prepare the prepared statement
                      if(mysqli_stmt_prepare($stmt,$sql))
                      {
                         //bind parameters to the placeholders
                         mysqli_stmt_bind_param($stmt,"s",$email);
                         //run parametres inside database
                         mysqli_stmt_execute($stmt);
                         $result=mysqli_stmt_get_result($stmt);
                            while($row=mysqli_fetch_assoc($result))
                            {
                              $tab[]=$row;
                            }
                             $req=$mysqli->query("select verified from client where emailClient='$email'");
                             while($row=mysqli_fetch_assoc($req))
                            {
                              $verified[]=$row;
                            }

                            if(implode($verified[0])=="1")
                            {
                               echo json_encode($tab[0]);
                            }
                            else{
                                echo("Verify Your Email !");
                            }
                      }
                      else{

                      }
                    }   
                }
            else
            {
             echo("Email does not exist !");
            }
        }   
}
//--profile infos --------------------------
if(isset($_POST['infos']))
{
    $email=mysqli_real_escape_string($mysqli ,$_POST['email']);
    $tab=[];

        $result= $mysqli->query("Select nomClient , prenomCLient , adresseClient , emailClient , telephone from client where emailClient='$email'  ")or die($mysqli->error);
        while($ligne=mysqli_fetch_assoc($result))
        {$tab[]=$ligne;}
        //renvoyé les données sous forme json
        echo json_encode($tab);
    
}
//---change password -----------------------
if(isset($_POST['changePass']))
{
    $email=mysqli_real_escape_string($mysqli ,$_POST['email']);
    $password=mysqli_real_escape_string($mysqli ,$_POST['password']);
    $password2= password_hash($_POST['password2'],PASSWORD_DEFAULT);
    //------------------------------------------------------------------------------------------------------
    //query
    $sql="Select * from client where emailClient=? ";
    //create a prepared statement
    $stmt=mysqli_stmt_init($mysqli);
    //prepare the prepared statement
         if(!mysqli_stmt_prepare($stmt,$sql))
        {echo("Incorrect statement !");}
        else{
         //bind parameters to the placeholders
         mysqli_stmt_bind_param($stmt,"s",$email);
         //run parametres inside database
         mysqli_stmt_execute($stmt);
         $result=mysqli_stmt_get_result($stmt);
    
                 $ligne=mysqli_fetch_assoc($result);
                  if(!password_verify($password,$ligne["passwordclient"])==1)
                  {  echo "Incorrect Password !";}
                  else {
                     $sql="UPDATE client SET passwordclient=?  where emailClient like ? ";
                     //create a prepared statement
                      $stmt=mysqli_stmt_init($mysqli);
                     //prepare the prepared statement
                      if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo("Incorrect");
                      }
                      else {
                          //bind parameters to the placeholders
                          mysqli_stmt_bind_param($stmt,"ss",$password2,$email);
                         //run parametres inside database
                         mysqli_stmt_execute($stmt);
                         echo("inserted")  ;

                      }    
                    }   

        }   
    //**************************************************************************************************** */

}
//change phone number-----
if(isset($_POST['changeTel']))
{
    $email=mysqli_real_escape_string($mysqli ,$_POST['email']);
    $telephone=mysqli_real_escape_string($mysqli ,$_POST['telephone']);
      
    if($telephone!=null)
    {    
        $req=$mysqli->query("UPDATE client SET telephone='$telephone'  where emailClient like '$email'") or die(mysqli_error($req));
          echo("changed")  ; 
    }
}
//change phone number-----
if(isset($_POST['Adresse']))
{
    $email=mysqli_real_escape_string($mysqli ,$_POST['email']);
    $Adresse=mysqli_real_escape_string($mysqli ,$_POST['Adresse']);
      
    if($Adresse!=null)
    {    
        $req=$mysqli->query("UPDATE client SET adresseClient='$Adresse'  where emailClient like '$email'") or die(mysqli_error($req));
          echo("changed")  ; 
    }
}
//sign Up
if(isset($_POST['signUp']))
{
    $fname=mysqli_real_escape_string($mysqli ,$_POST['fname']);
    $lname=mysqli_real_escape_string($mysqli ,$_POST['lname']);
    $telephone=mysqli_real_escape_string($mysqli ,$_POST['telephone']);
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $email=mysqli_real_escape_string($mysqli ,$_POST['email']);
    $Adresses=mysqli_real_escape_string($mysqli ,$_POST['Adresses']);
    $country=mysqli_real_escape_string($mysqli ,$_POST['country']);
    $city=mysqli_real_escape_string($mysqli ,$_POST['city']);
    $tab=array();
    $tab1=array();
    $vkey=password_hash($_POST['email'],PASSWORD_DEFAULT); 
    $n = $mysqli->query("SELECT idClient  FROM client order by number desc limit 1");
    $n1 = $mysqli->query("SELECT number FROM client order by number desc limit 1");
    while($row=mysqli_fetch_assoc($n))
    {
        $tab[]=$row;
    }
    while($row1=mysqli_fetch_assoc($n1))
    {
        $tab1[]=$row1;
    }
    if($tab[0]!=null)
    {
        $s= intval(implode($tab[0]))+1;
        $number= intval(implode($tab1[0]))+1;

     $req1=$mysqli->query("select * from client where emailClient='$email'");
     if(mysqli_num_rows($req1)>0)
     {
        echo("Email Already Exist !");
        return;
     }
     else 
     {
        if($email!="" and $password!="")
        {    

            $req=$mysqli->query("insert into client(idClient,nomClient,prenomClient,adresseClient,passwordclient,emailClient,telephone,country,city,vkey,verified,number) values 
                                                    ('$s','$fname','$lname','$Adresses','$password','$email','$telephone','$country','$city','$vkey','0',$number)");
            
                                                   $to=$email;
                                                    $subject="Magin Technology ";
                                                    $message="<div><h1>Magin Technology</h1><br><h3> Verify your Email Adress !</h3><br>
                                                              <h5> to complete your sign up to Magin Technology shop please click the link below : </h5><br>
                                                              <a href='http://localhost/shop/login.php?email=".$email."&vkey=".$vkey."'><h1>Click Here To verify Account</h1></a></div>";
                                                    $headers="From: maginTechnology@gmail.com \r\n";
                                                    $headers .="MIME-Version: 1.0"."\r\n"; 
                                                    $headers .="Content-type:text/html;charset=UTF-8"."\r\n"; 
                                                     
                                                    mail($to,$subject,$message,$headers);
                                                    
                                                    if($req)
                                                    {
                                                        echo "<span>Signed Up Succesfully !</span>";
                                                    }
                                                    else{echo "<span>Something Went Wrong !</span>";}
        }
        else{
            echo "Remplissez tout les champs ";
        }
     } 
    }
      
}
//get bought listecommande articles
if(isset($_POST['idClient']))
{
    $idClient=mysqli_real_escape_string($mysqli ,$_POST['idClient']);
    $tab=[];
 //  join commande c on c.idlistecom=l.idlistecom
        $result= $mysqli->query("Select r.imageArt ,r.designation ,r.descriptions ,l.dateCommande from article r join listecommande l on r.reference=l.reference  where l.idClient ='$idClient' and l.statut=1")or die($mysqli->error);
        while($ligne=mysqli_fetch_assoc($result))
        {$tab[]=$ligne;}
        //renvoyé les données sous forme json
        echo json_encode($tab);
    
}
//get chat 
if(isset($_POST['Getchat']))
{
    $idClient=mysqli_real_escape_string($mysqli ,$_POST['idClien']);
    $tab=[];

        $result= $mysqli->query("Select * from chat where idClien='$idClient' order by date desc ")or die($mysqli->error);
        while($ligne=mysqli_fetch_assoc($result))
        {$tab[]=$ligne;}
        //renvoyé les données sous forme json
        echo json_encode($tab);    
}
//send chat 
if(isset($_POST['sendChat']))
{
    $idClient=mysqli_real_escape_string($mysqli ,$_POST['idClien']);
    $message=mysqli_real_escape_string($mysqli ,$_POST['message']);
    $currentDateTime = date('Y-m-d H:i:s');
        $result= $mysqli->query("insert into chat(emailAdmin,idClien,message,fromm) values('ecommerce@gmail.com','$idClient','$message','$idClient') ")or die($mysqli->error);
           
}
//session email infos
if(isset($_POST['sessionId']))
{
    $idClient=mysqli_real_escape_string($mysqli ,$_POST['sessionId']);
    $tab=[];

        $result= $mysqli->query("Select emailClient from client where idClien='$idClient' ")or die($mysqli->error);
        $ligne=mysqli_fetch_assoc($result);
        $ligne=implode($ligne);
        echo $ligne;    
}

//get bought listecommande articles
if(isset($_POST['idClient1']))
{
    $idClient=mysqli_real_escape_string($mysqli ,$_POST['idClient1']);
    $tab=[];
 //  join commande c on c.idlistecom=l.idlistecom
       $result=$mysqli->query("select * from  listepoint l join points p on l.idpoints = p.idPoints  join article a on a.reference = p.referencePoints where l.idClient='$idClient' and l.statut='1'");

        while($ligne=mysqli_fetch_assoc($result))
        {$tab[]=$ligne;}
        //renvoyé les données sous forme json
        echo json_encode($tab);
    
}

?>