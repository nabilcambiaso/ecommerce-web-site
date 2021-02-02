<?php 

require_once 'config.php';
//search for articles
if(isset($_POST['search']))
{
    $search=mysqli_real_escape_string($mysqli ,$_POST['search']);
    $result= $mysqli->query("SELECT * FROM article where designation like '%$search%' and promo='0' ORDER BY datePublication  ")or die($mysqli->error);    

    $article=array();

   //parcourir le curseur (fetych)
   while($ligne=mysqli_fetch_assoc($result))
  {
    $article[]=$ligne;   
 }

 //renvoyé les données sous forme json
 echo json_encode($article);
}
if(isset($_POST['categorie']))
{
    $search=mysqli_real_escape_string($mysqli ,$_POST['searc']);
    $categorie=mysqli_real_escape_string($mysqli ,$_POST['categorie']);
    $result= $mysqli->query("SELECT * FROM article where designation like '%$search%' and idcategorie=$categorie ORDER BY datePublication  ")or die($mysqli->error);    

    $article=array();

   //parcourir le curseur (fetych)
   while($ligne=mysqli_fetch_assoc($result))
  {
    $article[]=$ligne;   
 }

 //renvoyé les données sous forme json
 echo json_encode($article);
}