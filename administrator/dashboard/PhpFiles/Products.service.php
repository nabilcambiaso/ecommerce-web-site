<?php
include "../../crud/dbConnexion.php";
//onload *
if(isset($_POST["load"]))
{
  $req1=$mysqli->query("select * from article a where a.promo='0'");
  $products=[];
  while($ligne=mysqli_fetch_assoc($req1))
  {
    $products[]=$ligne;
  }
  echo json_encode($products);
}

//modal detail of product *
if(isset($_POST["idModalProduct"]))
{
  $id=$_POST["idModalProduct"];
  $req1=$mysqli->query("select * from  article a join souscategorie s on a.idSousCategorie=s.idSousCategorie where a.reference='$id'");
  $material=[];
  while($ligne=mysqli_fetch_assoc($req1))
  {
    $material[]=$ligne;
  }
  echo json_encode($material);
}

//get category *
if(isset($_POST["categorySelect"]))
{
  $req1=$mysqli->query("select * from  categorie ");
  $categorie=[];
  while($ligne=mysqli_fetch_assoc($req1))
  {
    $categorie[]=$ligne;
  }
  echo json_encode($categorie);
}

#get sous categrie *
if(isset($_POST["SouscategorySelectAdd"]))
{
  $idcat=$_POST["SouscategorySelectAdd"];
  $req1=$mysqli->query("select * from  souscategorie where idcategorie='$idcat' ");
  $souscategorie=[];
  while($ligne=mysqli_fetch_assoc($req1))
  {
    $souscategorie[]=$ligne;
  }
  echo json_encode($souscategorie);
}


//----add Article ================================-----------------------
if(isset($_POST["idreferenceAdd"]))
{
    $date=date("Y-m-d");
    $reference=mysqli_real_escape_string($mysqli ,$_POST["idreferenceAdd"]);
    $designation=mysqli_real_escape_string($mysqli ,$_POST["designation"]);
    if (strpos($designation,'\'') !== false) { //first we check if the designation contains the string 'en-us'
        $designation = str_replace('\'', '\'\'', $designation); //if yes, we simply replace it with en
    }
    $price1=mysqli_real_escape_string($mysqli ,$_POST["price1"]);
    $quantite=mysqli_real_escape_string($mysqli ,$_POST["quantite"]);
    $description=mysqli_real_escape_string($mysqli ,$_POST["description"]);
    if (strpos($description,'\'') !== false) { //first we check if the description contains the string 'en-us'
        $description = str_replace('\'', '\'\'', $description); //if yes, we simply replace it with en
    }
    $categorie=mysqli_real_escape_string($mysqli ,$_POST["categorie"]);
    $souscategorie=mysqli_real_escape_string($mysqli ,$_POST["souscategorie"]);
    $images=[];
    $imgcount=count($_FILES['image']['name']);
    for($i=0;$i<$imgcount;$i++)
    {
        $images[]=$reference.$_FILES['image']['name'][$i];
        $label=$reference.$_FILES['image']['name'][$i];
        move_uploaded_file($_FILES['image']['tmp_name'][$i],"..\..\..\AdminLogin\images\\".$label);
    }      
    $req=mysqli_query($mysqli,"insert into article(reference,designation,descriptions,prix1,imageArt,image2,image3,image4,seul,idcategorie,idSousCategorie,datePublication,promo)
     values('$reference','$designation','$description','$price1','$images[0]','$images[1]','$images[2]','$images[3]','$quantite','$categorie','$souscategorie','$date','0')") or die(mysqli_error());
     header("location:../products");
}

  // Archive product*
  if(isset($_POST["deleteTheProduct"])) {

    $reference=mysqli_real_escape_string($mysqli ,$_POST["deleteTheProduct"]);

    $req=mysqli_query($mysqli,"delete from article where reference='$reference'") or die(mysqli_error($req));
   
  }


  //modal delete *
  if(isset($_POST["idModalProductDelete"]))
{
    $id=mysqli_real_escape_string($mysqli ,$_POST["idModalProductDelete"]);
    
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


  //modal edit * 
  if(isset($_POST["getEditValues"]))
{
    $id=mysqli_real_escape_string($mysqli ,$_POST["getEditValues"]);
    
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


  //modal edit * 
  if(isset($_POST["EditProductSelected"]))
{
  
  $date=date("Y-m-d");
  $reference=mysqli_real_escape_string($mysqli ,$_POST["referenceEdit"]);
  $designation=mysqli_real_escape_string($mysqli ,$_POST["designation"]);
  $categorie=mysqli_real_escape_string($mysqli ,$_POST["Categories"]);
  $souscategorie=mysqli_real_escape_string($mysqli ,$_POST["SousCategorie"]);
  $price1=mysqli_real_escape_string($mysqli ,$_POST["price1"]);
  $quantite=mysqli_real_escape_string($mysqli ,$_POST["quantite"]);
  $description=mysqli_real_escape_string($mysqli ,$_POST["description"]);

      $req=mysqli_query($mysqli,"UPDATE article SET designation='$designation' ,descriptions='$description',idcategorie='$categorie' ,
       idSousCategorie='$souscategorie', prix1='$price1' , seul='$quantite' , datePublication='$date' where reference like '$reference'") or die(mysqli_error($req)); 
}


// promo product *
if(isset($_POST["makeItPromo"]))
{
  $date=date("Y-m-d");
  $reference=mysqli_real_escape_string($mysqli ,$_POST["makeItPromo"]);
  $newPrice=mysqli_real_escape_string($mysqli ,$_POST["nouveauPrice"]);
  $ancienPrice=mysqli_real_escape_string($mysqli ,$_POST["ancienprix"]);
  $Duration=mysqli_real_escape_string($mysqli ,$_POST["duration"]);

  $req=mysqli_query($mysqli,"UPDATE article SET promo='1' where reference='$reference' ") or die(mysqli_error($req)); 


  $req1=mysqli_query($mysqli,"insert into promotion(ancienprix,Nouveauxprix,datepromo,dure,reference) 
  values('$ancienPrice','$newPrice','$date','$Duration','$reference') ") or die(mysqli_error($req1)); 
}

// points product *
if(isset($_POST["makeItpoints"]))
{

  $reference=mysqli_real_escape_string($mysqli ,$_POST["makeItpoints"]);
  $req=mysqli_query($mysqli,"select count(*) as nbr from points where  referencePoints='$reference' ") or die(mysqli_error($req)); 
     $ligne=mysqli_fetch_assoc($req);
     echo '1';
     if($ligne['nbr']==0)
     {
       echo '2';
      $req=mysqli_query($mysqli,"select prix1 from article where reference='$reference' ") or die(mysqli_error($req)); 
      $ligne=mysqli_fetch_assoc($req);
      $prix=$ligne['prix1'];
      $nombrePoints=$prix*10;
      $req1=mysqli_query($mysqli,"insert into points(referencePoints,nombrePoints) values('$reference','$nombrePoints')  ") or die(mysqli_error($req)); 
     }
}


  //export employee excel *
  //telecharger -------------------------------------------------------------------------
  if(isset($_POST["EmployeeExport"]))
  {
    $dateS=$_POST["dateS"];
    $dateE=$_POST["dateE"];
     if($dateS==null && $dateE==null)
     {
      $dateS='1900-12-12';
      $dateE=date('Y-m-d');
     }
     else if($dateS==null)
     {
      $dateS='1900-12-12';
     }
     else if($dateE==null){
      $dateE=date('Y-m-d');
     }
      $output='';
     $result=$mysqli->query("select * from article a join categorie c on a.idcategorie=c.idcategorie where a.datePublication between '$dateS' and '$dateE' and a.promo='0' ");
   if($result!=null)
   {
    $output .='
    <table class="table" >
    <tr></tr>
    <tr>
   <th colspan="5"></th><th colspan="2" ><h1>Magin Technology Promo Articles </h1></th><th colspan="6"></th>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    </table>
    ';
      $output .='
      <table class="table" border="1">
      <tr>
      <th>reference</th>
      <th>Designation</th>
      <th>Price</th>
      <th> category</th>
      <th>Date pulblication </th>
      <th>Quantity</th>
      </tr>
  
      ';
      while($row = $result->fetch_array())
      {
          $output .='
      <tr>
          <td>'.$row["reference"].'</td>
          <td>'.$row["designation"].'</td>
          <td>'.$row["prix1"].'</td>
          <td>'.$row["theme"].'</td>
          <td>'.$row["datePublication"].'</td>
          <td>'.$row["seul"].'</td>
  
          </tr>
          ';
      }
  
      $output .='</table>';
      $output .='<table class="table"><tr></tr><tr></tr><tr><td colspan="5"></td><td>Export Date : '.date("Y-m-d").'</td><td colspan="6"></td></tr></table>';
  
      header("Content-Type: application/xls");
      header("Content-Disposition:attachment; filename=ProductsList(".date('Y-m-d').").xls" );
   echo $output;
   }
  
  }









