<?php
require_once 'config.php';
//-------------------------------------------------------------
$points=$_POST["points"];
$tab=array();
foreach ($points as $key => $value) {
$result= $mysqli->query("select * from article as a join points as p on a.reference = p.referencePoints where p.referencePoints='$value' ")or die($mysqli->error);
$ligne=mysqli_fetch_assoc($result);
$tab[]=$ligne;
}

//renvoyé les données sous forme json
echo json_encode($tab);

//---------------------------------------------------------------