<?php
session_start();
$admin=$_SESSION["adminNomPrenom"];
include "../../crud/dbConnexion.php";

//onload *
if(isset($_POST["load"]))
{
  $req1=$mysqli->query("select * from listecommande l join client c on c.idClient=l.idClient group by l.idlistecom order by l.statut ");
  $products=[];
  while($ligne=mysqli_fetch_assoc($req1))
  {
    $products[]=$ligne;
  }
  echo json_encode($products);
}



//modal detail of commande *
if(isset($_POST["idModalProduct"]))
{
  $id=$_POST["idModalProduct"];
  $req1=$mysqli->query("select ad.*, l.*,c.nomClient,c.prenomClient,a.designation,a.imageArt,a.prix1,l.quantite,pr.* from listecommande l join client c on l.idClient=c.idClient join article a on a.reference=l.reference left join promotion pr on pr.reference=l.reference left join admin ad on ad.adresseEmail=l.emailAdmin where l.idlistecom='$id'");
  $material=[];
  while($ligne=mysqli_fetch_assoc($req1))
  {
    $material[]=$ligne;
  }
  echo json_encode($material);
}

//modal delete of commande *
if(isset($_POST["deleteCommande"]))
{
  $id=$_POST["deleteCommande"];
  $req1=$mysqli->query("delete from listecommande where idlistecom='$id'") or die(mysqli_error());

}


//validate commande


if(isset($_POST["validateCommande"]))
{
  $date=date("y-m-d H:i:s");
  $point=$_POST["point"];
  $pointe=$point;
  $point=$point/50;
  $id=$_POST["validateCommande"];
  $req1=$mysqli->query("update listecommande set validerAdmin='1', dateValidateAdmin='$date' ,prixtotal='$pointe' where idlistecom='$id'") or die(mysqli_error());
  $req2=$mysqli->query("select c.points,c.idClient from client c join listecommande l on l.idClient=c.idClient where l.idlistecom='$id'") or die(mysqli_error());
  $ligne=mysqli_fetch_assoc($req2);
  $points=$ligne["points"];
  $points=$points+$point;
  $idClient=$ligne["idClient"];
  $req3=$mysqli->query("update client set points='$points' where idClient='$idClient' ") or die(mysqli_error());

}
