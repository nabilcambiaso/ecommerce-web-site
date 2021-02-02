<?php
require_once 'config.php';
//-------------------------------------------------------------

$result= $mysqli->query("select * from article as a join points as p on a.reference = p.referencePoints  ")or die($mysqli->error);
    
$points=array();

//parcourir le curseur (fetch)
while($ligne=mysqli_fetch_assoc($result))
{
    $points[]=$ligne;   
}

//renvoyé les données sous forme json
echo json_encode($points);

//---------------------------------------------------------------