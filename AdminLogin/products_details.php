<?php
require_once 'config.php';

//get product infos ______________________________________________________________
if(isset($_POST['id']))
{
    $id= mysqli_real_escape_string($mysqli , $_POST['id']);
    $result= $mysqli->query("SELECT * FROM article where reference like '$id'")or die($mysqli->error);    

    $article=array();

   //parcourir le curseur (fetych)
   while($ligne=mysqli_fetch_assoc($result))
  {
    $article[]=$ligne;   
 }

 //renvoyé les données sous forme json
 echo json_encode($article);
}
// get comments __________________________________________________________________
if(isset($_POST['comments']))
{

    $id= mysqli_real_escape_string($mysqli , $_POST['comments'])  ;
    $result= $mysqli->query("SELECT * FROM mycomments where ArticleReference like '$id' order by idComments desc")or die($mysqli->error);    

    $comments=array();

   //parcourir le curseur (fetych)
   while($ligne=mysqli_fetch_assoc($result))
  {
    $comments[]=$ligne;   
 }

 //renvoyé les données sous forme json
 echo json_encode($comments);
}
//add comment ____________________________________________________________________
if(isset($_POST['reference']))
{
    $reference= mysqli_real_escape_string($mysqli , $_POST['reference'])  ;
    $comment= mysqli_real_escape_string($mysqli , $_POST['commenter'])  ;
    $result= $mysqli->query("insert into  mycomments(ArticleReference, comments) values('$reference','$comment')")or die($mysqli->error);    
if($result)
{
  $result= $mysqli->query("SELECT * FROM mycomments where ArticleReference like '$reference' order by idComments desc limit 1 ")or die($mysqli->error);    

  $comments=array();

 //parcourir le curseur (fetych)
 while($ligne=mysqli_fetch_assoc($result))
{
  $comments[]=$ligne;   
}

//renvoyé les données sous forme json
echo json_encode($comments);
}
else{
  echo "error";
}
}