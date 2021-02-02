<?php
session_start();
$admin=$_SESSION["adminNomPrenom"];
include "../../crud/dbConnexion.php";

if(isset($_POST["loadthem"]))
{
  $req1=$mysqli->query("select * from listepoint l join client c on c.idClient=l.idClient group by l.idlistepoints order by l.statut ");
  $products=[];
  while($ligne=mysqli_fetch_assoc($req1))
  {
    $products[]=$ligne;
  }
  echo json_encode($products);
}



//modal detail of product *
if(isset($_POST["idModalProduct"]))
{
  $id=$_POST["idModalProduct"];
  $req1=$mysqli->query("select * from  listepoint l join points p on l.idpoints = p.idPoints  join article a on a.reference = p.referencePoints left join admin ad on ad.adresseEmail=l.emailAdmin where l.idlistepoints='$id'");
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
  $req1=$mysqli->query("delete from listepoint where idlistepoints='$id'") or die(mysqli_error());
}

//validate commande
if(isset($_POST["validateCommande"]))
{
  $date=date("y-m-d H:i:s");
  $id=$_POST["validateCommande"];
  $req1=$mysqli->query("update listepoint set statut='1' , emailAdmin='$admin' , dateValidate='$date' where idlistepoints='$id'") or die(mysqli_error());

}