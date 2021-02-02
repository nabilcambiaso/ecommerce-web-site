<?php 
require_once 'config.php';
//get items to the cart
$cartItems=$_POST["carts"];
$tab=[];
$tab1=[];



foreach ($cartItems as $key => $value) {
    $result= $mysqli->query("Select * from article where reference like '%$value%' ")or die($mysqli->error);
    $result1= $mysqli->query("Select * from promotion where reference like '%$value%' ")or die($mysqli->error);
    //parcourir le curseur (fetch)
    $ligne=mysqli_fetch_assoc($result);
    $ligne1=mysqli_fetch_assoc($result1);
    if($ligne1!=null)
    {
        $tab1[]=$ligne1;
    }
    $tab[]=$ligne;


}
echo json_encode(array($tab,$tab1));