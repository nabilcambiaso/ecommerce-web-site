<?php
require_once 'config.php';
$result= $mysqli->query("Select * from categorie ")or die($mysqli->error);
$tab=[];
//parcourir le curseur (fetych)
while($ligne=mysqli_fetch_assoc($result))
{$tab[]=$ligne;}
//renvoyé les données sous forme json
echo json_encode($tab);
