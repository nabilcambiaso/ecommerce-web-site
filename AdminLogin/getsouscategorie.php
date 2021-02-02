<?php
require_once 'config.php';
if(isset($_POST["souscategorie"]))
{$id=$_POST["souscategorie"];
$result= $mysqli->query("Select * from souscategorie where idcategorie='$id' ")or die($mysqli->error);
$tab=[];
//parcourir le curseur (fetych)
while($ligne=mysqli_fetch_assoc($result))
{$tab[]=$ligne;}
//renvoyé les données sous forme json
echo json_encode($tab);
}

//show thumbnails sous categories

if(isset($_POST["showSousCategorie"]))
{$id=$_POST["showSousCategorie"];
$result= $mysqli->query("Select * from article a join souscategorie s on a.idSousCategorie=s.idSousCategorie where s.idSousCategorie='$id' and a.promo='0' ")or die($mysqli->error);
$tab=[];
//parcourir le curseur (fetych)
while($ligne=mysqli_fetch_assoc($result))
{$tab[]=$ligne;}
//renvoyé les données sous forme json
echo json_encode($tab);
}

if(isset($_POST["showSousCategoriePromo"]))
{$id=$_POST["showSousCategoriePromo"];
$result= $mysqli->query("Select * from article a join promotion p on a.reference=p.reference join souscategorie s on a.idSousCategorie=s.idSousCategorie where s.idSousCategorie='$id' ")or die($mysqli->error);
$tab=[];
//parcourir le curseur (fetych)
while($ligne=mysqli_fetch_assoc($result))
{$tab[]=$ligne;}
//renvoyé les données sous forme json
echo json_encode($tab);
}