<?php

include "../../crud/dbConnexion.php";
//onload
if(isset($_POST["load"]))
{
  $req1=$mysqli->query("select * from article a join promotion p on a.reference=p.reference where a.promo='1'");
  $products=[];
  while($ligne=mysqli_fetch_assoc($req1))
  {
    $products[]=$ligne;
  }
  echo json_encode($products);
}


//details
if(isset($_POST["details"]))
{
    $reference=$_POST["details"];
  $req1=$mysqli->query("select * from article a join promotion p on a.reference=p.reference where a.promo='1' and p.reference='$reference'");
  $products=[];
  while($ligne=mysqli_fetch_assoc($req1))
  {
    $products[]=$ligne;
  }
  echo json_encode($products);
}


//delete
if(isset($_POST["EmployeeIdDelete"]))
{
    $reference=$_POST["EmployeeIdDelete"];
  $req=$mysqli->query("delete from promotion  where reference='$reference'");
  $req1=$mysqli->query("update article set promo='0'  where reference='$reference'");
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
     $result=$mysqli->query("select * from promotion p join article a on a.reference=p.reference where a.promo='1' and p.datepromo between '$dateS' and '$dateE' ");
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
      <th>Old Price</th>
      <th>New Price</th>
      <th>Date Promotion </th>
      <th>Duration</th>
      <th>Quantity</th>
      </tr>
  
      ';
      while($row = $result->fetch_array())
      {
          $output .='
      <tr>
          <td>'.$row["reference"].'</td>
          <td>'.$row["designation"].'</td>
          <td>'.$row["ancienprix"].'</td>
          <td>'.$row["Nouveauxprix"].'</td>
          <td>'.$row["datepromo"].'</td>
          <td>'.$row["dure"].'</td>
          <td>'.$row["seul"].'</td>
  
          </tr>
          ';
      }
  
      $output .='</table>';
      $output .='<table class="table"><tr></tr><tr></tr><tr><td colspan="5"></td><td>Export Date : '.date("Y-m-d").'</td><td colspan="6"></td></tr></table>';
  
      header("Content-Type: application/xls");
      header("Content-Disposition:attachment; filename=PromoList(".date('Y-m-d').").xls" );
   echo $output;
   }
  
  }







?>