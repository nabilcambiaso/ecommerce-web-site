<?php
//connexion
require_once("config.php");
//la selection de tous les information de liste commandes
if(isset($_POST["all"]))
{
//récupérer les données
$req=$mysqli->query('select l.idlistepoints,l.quantite,c.nomClient,c.prenomClient,l.statut FROM listepoints l join client c on l.idClient=c.idClient where l.statut=0 GROUP BY l.idlistePoints ');
//tableau pour stocker les données sous forme clé valeur
$tab=[];

//parcourir le curseur (fetych)
while($ligne=mysqli_fetch_assoc($req))
{
    $tab[]=$ligne;
}

//renvoyé les données sous forme json
echo json_encode($tab);
}

//la requete de detail
if(isset($_POST["id"]))
{
    $id=$_POST["id"];
   //récupérer les données
$req=$mysqli->query("select * FROM listepoints l join points p on l.idpoints=p.idPoints join article a on p.referencePoints=a.reference where l.idlistepoints='$id' ");
//tableau pour stocker les données sous forme clé valeur
$tab=[];

//parcourir le curseur (fetych)
while($ligne=mysqli_fetch_assoc($req))
{
    $tab[]=$ligne;
}

//renvoyé les données sous forme json
echo json_encode($tab); 
}
//valider
if(isset($_POST["valider"]))
{
    $id=$_POST["valider"];
   //récupérer les données
$req=$mysqli->query("update listecommande set statut=1 where idlistecom='$id' ");

//renvoyé les données sous forme json
echo ("1"); 
}


//refuser
if(isset($_POST["refuser"]))
{
    $id=$_POST["refuser"];
   //récupérer les données
$req=$mysqli->query("delete from listecommande where idlistecom='$id' ");

//renvoyé les données sous forme json
echo ("1"); 
}

?>