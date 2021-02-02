<?php
include "../../crud/dbConnexion.php";
//all employe
if(isset($_POST['promo'])){
    $sql = "select count(*) as nbr from promotion ";
    $req=$mysqli->query($sql) or die(mysqli_error());
    while($ligne=mysqli_fetch_assoc($req)) {
        echo $ligne['nbr'];
    }
    
}
//all product
if(isset($_POST['products'])){
    $sql = "select count(*) as nbr from article where promo='0'";
    $req=$mysqli->query($sql) or die(mysqli_error());
    while($ligne=mysqli_fetch_assoc($req)) {
        echo $ligne['nbr'];
    }
    
}
// all asign
if(isset($_POST['commande'])){
    $sql = "select count(distinct(idlistecom)) as nbr from listecommande  ";
    $req=$mysqli->query($sql) or die(mysqli_error());
    while($ligne=mysqli_fetch_assoc($req)) {
        echo $ligne['nbr'];
    }
    
}
// all asign
if(isset($_POST['client'])){
    $sql = "select count(*) as nbr from client  ";
    $req=$mysqli->query($sql) or die(mysqli_error());
    while($ligne=mysqli_fetch_assoc($req)) {
        echo $ligne['nbr'];
    }
    
}

if(isset($_POST["articlesGone"]))
{
    $sql = "select * from article where seul<=2 ";
    $req=$mysqli->query($sql) or die(mysqli_error());
    $tab=[];
    while($ligne=mysqli_fetch_assoc($req)) {
        $tab[]=$ligne;
    }
    echo json_encode($tab);
}

 //uploaded files
 if(isset($_POST["uploadId"]))
 {
     $req1=$mysqli->query("select * from uploaded_files ")
     or die(mysqli_error())
     ;
     $uploaded=[];
     while($ligne=mysqli_fetch_assoc($req1))
     {
       $uploaded[]=$ligne;
     }
     echo json_encode($uploaded);
 }

 //delete uploaded files
 if(isset($_POST["deletes"]))
 {
     $uploadedId=$_POST["deletes"];
     $req1=$mysqli->query("delete from uploaded_files where filesId='$uploadedId' ")
     or die(mysqli_error())
     ;
     
 }

 //details uploaded files
 if(isset($_POST["detailsId"]))
 {
     $uploadedId=$_POST["detailsId"];
     $req1=$mysqli->query("select * from uploaded_files uf join client c on uf.idclient=c.idClient where uf.filesId='$uploadedId' ")
     or die(mysqli_error())
     ;
     $uploaded=[];
     while($ligne=mysqli_fetch_assoc($req1))
     {
       $uploaded[]=$ligne;
     }
     echo json_encode($uploaded);
 }







?>