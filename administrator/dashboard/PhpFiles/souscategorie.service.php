<?php
include "../../crud/dbConnexion.php";




//Add categorie
if(isset($_POST["souscategorieName"]))
{
  $idcategorie = mysqli_real_escape_string($mysqli,$_POST["categorieid"]);
  $sousCategorie = mysqli_real_escape_string($mysqli,$_POST["souscategorieName"]);
 echo("insert into souscategorie(idcategorie,theme) values('$idcategorie','$theme')");
    $req1=$mysqli->query("insert into souscategorie(idcategorie,theme) values('$idcategorie','$sousCategorie')")or die(mysqli_error());
    //header("location:../souscategorie");
}




if(isset($_POST["loadcategories"]))
{
    $req1=$mysqli->query("select * from  categorie")or die(mysqli_error());
    $categorie=[];
    while($ligne=mysqli_fetch_assoc($req1))
    {
      $categorie[]=$ligne;
    }
    echo json_encode($categorie);
}
if(isset($_POST["loadSousCategories"]))
{
    $req1=$mysqli->query("select * from  souscategorie")or die(mysqli_error());
    $categorie=[];
    while($ligne=mysqli_fetch_assoc($req1))
    {
      $categorie[]=$ligne;
    }
    echo json_encode($categorie);
}

//delete categorie
if(isset($_POST["deleteId"]))
{
  $id = mysqli_real_escape_string($mysqli,$_POST["deleteId"]);
 
    $req1=$mysqli->query("delete from souscategorie where idSousCategorie='$id'")or die(mysqli_error());
    
}


?>
