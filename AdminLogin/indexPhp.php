<?php

require_once 'config.php';
//-------------------------------------------------------------

    $result= $mysqli->query("SELECT a.* FROM article a where a.promo=0 ORDER BY a.datePublication asc ")or die($mysqli->error);
    $result1= $mysqli->query("select * from article as a join promotion as p on a.reference = p.reference  ")or die($mysqli->error);
    

$article=array();
$promotion=array();

//parcourir le curseur (fetch)
while($ligne=mysqli_fetch_assoc($result))
{
    $article[]=$ligne;
    
}
while($ligne=mysqli_fetch_assoc($result1))
{
    $promotion[]=$ligne;
 
}
//renvoyé les données sous forme json
echo json_encode(array($article,$promotion));
//---------------------------------------------------------------