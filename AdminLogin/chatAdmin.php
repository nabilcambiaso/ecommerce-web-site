<?php

include_once("config.php");
//_______________________

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
    $message=$_POST['message'];
    $fromm=$_POST['fromm'];
    $currentDateTime = date('Y-m-d H:i:s');
        $result= $mysqli->query("insert into chat(emailAdmin,idClien,message,fromm) values('ecommerce@gmail.com','$idClient','$message','$fromm') ")or die($mysqli->error);
           
}