<?php

include "../../crud/dbConnexion.php";


//onload
if(isset($_POST["loads"]))
{
  $req1=$mysqli->query("select * from listecommande l join client c on l.idClient =c.idClient where l.statut='1'  group by l.idlistecom order by l.livrer");
  $products=[];
  while($ligne=mysqli_fetch_assoc($req1))
  {
    $products[]=$ligne;
  }
  echo json_encode($products);
}




//livreur
if(isset($_POST["recu"]))
{
    $id=$_POST["recu"];
  $req1=$mysqli->query("update listecommande set recu='1' where idlistecom='$id'")or die(mysqli_error());

}


//livreur
if(isset($_POST["livrer"]))
{
  $date=date("y-m-d H:i:s");
    $id=$_POST["livrer"];
  $req1=$mysqli->query("update listecommande set livrer='1',dateValidateLivreur='$date' where idlistecom='$id'")or die(mysqli_error());

}