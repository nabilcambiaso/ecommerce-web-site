<?php
include "../../crud/dbConnexion.php";

//LoadAccount *
if(isset($_POST["load"]))
{
  $req1=$mysqli->query("select * from admin where adminState!='0'")or die(mysqli_error());
  $compte=[];
  while($ligne=mysqli_fetch_assoc($req1))
  {
    $compte[]=$ligne;
  }
  echo json_encode($compte);
}


//AddUser 
if(isset($_POST["AddAdmin"]))
{
$adresseEmail=mysqli_real_escape_string($mysqli ,$_POST["adresseEmail"]);
$FirstName=mysqli_real_escape_string($mysqli ,$_POST["nom"]);
$LastName=mysqli_real_escape_string($mysqli ,$_POST["prenom"]);
$telephone=mysqli_real_escape_string($mysqli ,$_POST["telephone"]);
$livreur=mysqli_real_escape_string($mysqli ,$_POST["livreur"]);
$Password=password_hash($_POST['Password'],PASSWORD_DEFAULT);
$req1=$mysqli->query("INSERT INTO `admin`(`adresseEmail`, `nom`, `prenom`, `telephone`, `password`, `adminState`)
VALUES ('$adresseEmail','$FirstName','$LastName','$telephone','$Password','$livreur')") 
or die(mysqli_error());
echo("its Works");
}

//modal detail of admin * 
if(isset($_POST["idModalUser"]))
{
$id=$_POST["idModalUser"];
$req1=$mysqli->query("select * from  admin a  where a.adresseEmail='$id'")
 or die(mysqli_error());
$admin=[];
while($ligne=mysqli_fetch_assoc($req1))
{
  $admin[]=$ligne;
}
echo json_encode($admin);
}


// Delete admin *
if(isset($_POST["deleteSelectedUser"]))
{
    $id=mysqli_real_escape_string($mysqli ,$_POST["UserId"]);
    $req1=$mysqli->query("delete from admin where adresseEmail='$id'") or die(mysqli_error());
}

// edit admin *
if(isset($_POST["EditAdmin"]))
{

  $FirstName=mysqli_real_escape_string($mysqli ,$_POST["FirstName"]);
  $LastName=mysqli_real_escape_string($mysqli ,$_POST["LastName"]);
  $Email=mysqli_real_escape_string($mysqli ,$_POST["Email"]);
  $Password=password_hash($_POST['Password'],PASSWORD_DEFAULT);
 $OldPassword=mysqli_real_escape_string($mysqli ,$_POST["OldPassword"]);
 
 
 $req1=$mysqli->query("select * from admin where adminState='0'");
  while($ligne=mysqli_fetch_assoc($req1))
  {
    if(!password_verify($OldPassword,$ligne["password"])==1 ) {
      echo "You Need To Insert the Right Password !!";
    } else if(password_verify($OldPassword,$ligne["password"])==1 ) {
      $req=mysqli_query($mysqli,"UPDATE admin SET  
        nom='$FirstName',
        prenom='$LastName',
        adresseEmail='$Email',
        password='$Password' where adminState='0'
        ") or die(mysqli_error($req));
      echo("success");
    }
  }

  
  


        
}

//loadCLients
if(isset($_POST["loadClient"]))
{
  $req1=$mysqli->query("select * from client ");
  $client=[];
  while($ligne=mysqli_fetch_assoc($req1))
  {
    $client[]=$ligne;
  }
  echo json_encode($client);
}

//loadCLients
if(isset($_POST["loadClientID"]))
{
  $id=$_POST["loadClientID"];
  $req1=$mysqli->query("select * from client where idClient='$id' ");
  $client=[];
  while($ligne=mysqli_fetch_assoc($req1))
  {
    $client[]=$ligne;
  }
  echo json_encode($client);
}

//delete client
if(isset($_POST["deleteClient"]))
{
  $id=$_POST["deleteClient"];
  $req1=$mysqli->query("delete from client where idClient='$id' ");

}

//chat-----------------------------------






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


if(isset($_POST["getClient"]))
{
    $result1= $mysqli->query("select c.idClient,c.nomClient ,c.prenomClient from client c join chat t on c.idClient=t.idClien group by t.idClien")or die($mysqli->error);
    $tab=[];
    while($ligne=mysqli_fetch_assoc($result1))
    {
        $tab[]=$ligne; 
    }
    //renvoyé les données sous forme json
    echo json_encode($tab);
}


//send chat 
if(isset($_POST['sendChat']))
{
    $idClient=$_POST['idClien'];
    $message=mysqli_real_escape_string($mysqli ,$_POST['message']);
    $fromm=$_POST['fromm'];
    $currentDateTime = date('Y-m-d H:i:s');
        $result= $mysqli->query("insert into chat(emailAdmin,idClien,message,fromm) values('ecommerce@gmail.com','$idClient','$message','$fromm') ")or die($mysqli->error);
           
}






?>