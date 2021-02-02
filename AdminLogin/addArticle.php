<?php

include_once("config.php");


//*************************************ADD*********************************************************8888 */
//----add Article ================================-----------------------
if(isset($_POST["reference"]))
{
    $date=date("Y-m-d");
    $reference=mysqli_real_escape_string($mysqli ,$_POST["reference"]);
    $designation=mysqli_real_escape_string($mysqli ,$_POST["designation"]);
    if (strpos($designation,'\'') !== false) { //first we check if the designation contains the string 'en-us'
        $designation = str_replace('\'', '\'\'', $designation); //if yes, we simply replace it with en
    }
    $price1=mysqli_real_escape_string($mysqli ,$_POST["price1"]);
    $price2=mysqli_real_escape_string($mysqli ,$_POST["price2"]);
    $price3=mysqli_real_escape_string($mysqli ,$_POST["price3"]);
    $quantite=mysqli_real_escape_string($mysqli ,$_POST["quantite"]);
    $description=mysqli_real_escape_string($mysqli ,$_POST["description"]);
    if (strpos($description,'\'') !== false) { //first we check if the description contains the string 'en-us'
        $description = str_replace('\'', '\'\'', $description); //if yes, we simply replace it with en
    }
    $categorie=mysqli_real_escape_string($mysqli ,$_POST["categorie"]);
    $images=[];
    $imgcount=count($_FILES['image']['name']);
    for($i=0;$i<$imgcount;$i++)
    {
        $images[]=$reference.$_FILES['image']['name'][$i];
        $label=$reference.$_FILES['image']['name'][$i];
        move_uploaded_file($_FILES['image']['tmp_name'][$i],"images\\".$label);
    }      
    $req=mysqli_query($mysqli,"insert into article(reference,designation,descriptions,prix1,prix2,prix3,imageArt,image2,image3,image4,seul,idcategorie,datePublication)
     values('$reference','$designation','$description','$price1','$price2','$price3','$images[0]','$images[1]','$images[2]','$images[3]','$quantite','$categorie','$date')") or die(mysqli_error(header("location:../admin.php?add=error")));
     header("location:../admin.php");
}
//**************************************Delete*************************************************************** */
 // get all searched item to delete =====================================================================
if(isset($_POST["delete"]))
{
    $name=mysqli_real_escape_string($mysqli ,$_POST["name"]);
    $idCat=mysqli_real_escape_string($mysqli ,$_POST["idcategorie"]);
    $result= $mysqli->query("Select * from article where designation like '%$name%' and idcategorie='$idCat' ")or die($mysqli->error);
    $tab=[];
    //parcourir le curseur (fetych)
    while($ligne=mysqli_fetch_assoc($result))
    {
    $tab[]=$ligne;
    }
    //renvoyé les données sous forme json
    echo json_encode($tab);
}
//modal ==================================================================================================
if(isset($_POST["id"]))
{
    $id=mysqli_real_escape_string($mysqli ,$_POST["id"]);
    
    $result= $mysqli->query("Select * from article where reference ='$id' ")or die($mysqli->error);
 $tab=[];
 //parcourir le curseur (fetych)
 while($ligne=mysqli_fetch_assoc($result))
 {
    $tab[]=$ligne;
 }
 //renvoyé les données sous forme json
 echo json_encode($tab);
}
//====delete the article =====================================================================================
if(isset($_POST["deletes"]))
{
    $deletes=mysqli_real_escape_string($mysqli ,$_POST["deletes"]);
    
    $result= $mysqli->query("delete from article where reference ='$deletes' ")or die($mysqli->error);
}
//********************************************Modify************************************************************ */
  // search for article to modify
  if(isset($_POST["modify"]))
 {
   $modify=mysqli_real_escape_string($mysqli ,$_POST["modify"]);
    $result= $mysqli->query("Select * from article where reference ='$modify' ")or die($mysqli->error);
    $tab=[];
    //parcourir le curseur (fetych)
    while($ligne=mysqli_fetch_assoc($result))
    {
    $tab[]=$ligne;
    }
    //renvoyé les données sous forme json
    echo json_encode($tab);
 }
  // modify article 
  if(isset($_POST["btnModify"]))
{
   echo($_POST["referencesModify"]);
    $date=date("Y-m-d");
    $reference=mysqli_real_escape_string($mysqli ,$_POST["referencesModify"]);
    $designation=mysqli_real_escape_string($mysqli ,$_POST["designation"]);
    $categorie=mysqli_real_escape_string($mysqli ,$_POST["categorie"]);
    $price1=mysqli_real_escape_string($mysqli ,$_POST["price1"]);
    $price2=mysqli_real_escape_string($mysqli ,$_POST["price2"]);
    $price3=mysqli_real_escape_string($mysqli ,$_POST["price3"]);
    $quantite=mysqli_real_escape_string($mysqli ,$_POST["quantite"]);
    $description=mysqli_real_escape_string($mysqli ,$_POST["description"]);
    $img=$_FILES['image']['name'];
    $new=$reference.$img;
    $path="images/";
    
    if($img=='')
    {
        $req=mysqli_query($mysqli,"UPDATE article SET designation='$designation' ,descriptions='$description',idcategorie='$categorie' , prix1='$price1' , prix2='$price2' , prix3='$price3' , seul='$quantite' , datePublication='$date' where reference like '$reference'") or die(mysqli_error($req));
        header("location:../admin.php");
    }
    else
    {
        move_uploaded_file($_FILES['image']['tmp_name'],$path.$new);
        $req=mysqli_query($mysqli,"UPDATE article SET designation='$designation' ,descriptions='$description' ,idcategorie='$categorie' , prix1='$price1' , prix2='$price2' , prix3='$price3',  imageArt='$new' , seul='$quantite' , datePublication='$date' where reference like '$reference'") or die(mysqli_error($req));
         header("location:../admin.php");
    }

}
//**********************************************Infos********************************************************* */
// get all infos
if(isset($_POST["infosDesignation"]))
{
    $designation=mysqli_real_escape_string($mysqli ,$_POST["infosDesignation"]);
    $result= $mysqli->query("Select * from article where designation like '%$designation%' ")or die($mysqli->error);
    $tab=[];
    //parcourir le curseur (fetych)
    while($ligne=mysqli_fetch_assoc($result))
    {
    $tab[]=$ligne;
    }
    //renvoyé les données sous forme json
    echo json_encode($tab);
}
//listecommande----------
if(isset($_POST["listeCommande"]))
{
    
    $result= $mysqli->query("Select * from listecommande join article on listecommande.reference=article.reference join client on client.idClient=listecommande.idClient ")or die($mysqli->error);
    $tab=[];
    //parcourir le curseur (fetych)
    while($ligne=mysqli_fetch_assoc($result))
    {
    $tab[]=$ligne;
    }
    //renvoyé les données sous forme json
    echo json_encode($tab);
}