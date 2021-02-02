<?php
include "../../crud/dbConnexion.php";


//Add categorie
if(isset($_POST["categorieName"]))
{
  $theme = mysqli_real_escape_string($mysqli,$_POST["categorieName"]);
 
    $req1=$mysqli->query("insert into categorie(theme) values('$theme')")or die(mysqli_error());
    header("location:../categorie");
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

//delete categorie
if(isset($_POST["deleteId"]))
{
  $id = mysqli_real_escape_string($mysqli,$_POST["deleteId"]);
 
    $req1=$mysqli->query("delete from categorie where idcategorie='$id'")or die(mysqli_error());
    header("location:../categorie");
}


?>
