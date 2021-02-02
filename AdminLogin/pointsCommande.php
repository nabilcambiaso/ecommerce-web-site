<?php
require 'config.php';
session_start();
$commande=$_POST['commande'];


$n = $mysqli->query("SELECT max(idlistepoints) FROM listepoint");

$ligne=mysqli_fetch_assoc($n);

if(implode($ligne)!=null)
{
    $s= intval( implode($ligne))+1;
}
else
{
    $s=1;
}

foreach ($commande as $value) {
    $n = $mysqli->query("SELECT idPoints, nombrePoints from points where referencePoints='".$value['reference']."'");
     $req=$mysqli->query("update article set seul=seul-1 where reference='".$value['reference']."'");
     $req2=$mysqli->query("select c.points from client c   where c.idClient='".$value['idClient']."' ") or die(mysqli_error());
      $ligne2=mysqli_fetch_assoc($req2);
    $ligne=mysqli_fetch_assoc($n);
     $points=$ligne2["points"];
     $points=$points-$ligne["nombrePoints"];
     $_SESSION["points"]=$points;
     echo($points);
    echo("insert into listepoint (idlistepoints,quantite,idClient,idpoints,statut,livraisonpoint) values('".$s."','1','".$value['idClient']."','".$ligne['idPoints']."','0','".$value['livraison']."')");
    $result= $mysqli->query("insert into listepoint (idlistepoints,quantite,idClient,idpoints,statut,livraisonpoint) values('".$s."','1','".$value['idClient']."','".$ligne['idPoints']."','0','".$value['livraison']."')")or die($mysqli->error);
    $req3=$mysqli->query("update client set points='$points' where idClient='".$value['idClient']."' ") or die(mysqli_error());
    
if(!$result)
{
    echo("not inserted");
}
else{
    echo($s);
}

}
?>