<?php

include "../../crud/dbConnexion.php";
//onload
if(isset($_POST["load"]))
{
  $req1=$mysqli->query("select * from article a join points p on a.reference=p.referencePoints ");
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
  $req1=$mysqli->query("select * from article a join points p on a.reference=p.referencePoints  where p.referencePoints='$reference'");
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
  $req=$mysqli->query("delete from points  where referencePoints='$reference'");
}




  //export employee excel *
  //telecharger -------------------------------------------------------------------------
  if(isset($_POST["EmployeeExport"]))
  {
    
      $output='';
     $result=$mysqli->query("select * from points p join article a on a.reference=p.referencePoints ");
   if($result!=null)
   {
    $output .='
    <table class="table" >
    <tr></tr>
    <tr>
   <th colspan="5"></th><th colspan="2" ><h1>Magin Technology Points Articles </h1></th><th colspan="6"></th>
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
      <th>nombre de points</th>
      <th>Quantity</th>
      </tr>
  
      ';
      while($row = $result->fetch_array())
      {
          $output .='
      <tr>
          <td>'.$row["reference"].'</td>
          <td>'.$row["designation"].'</td>
          <td>'.$row["nombrePoints"].'</td>
          <td>'.$row["seul"].'</td>
  
          </tr>
          ';
      }
  
      $output .='</table>';
      $output .='<table class="table"><tr></tr><tr></tr><tr><td colspan="5"></td><td>Export Date : '.date("Y-m-d").'</td><td colspan="6"></td></tr></table>';
  
      header("Content-Type: application/xls");
      header("Content-Disposition:attachment; filename=PointsList(".date('Y-m-d').").xls" );
   echo $output;
   }
  
  }







?>