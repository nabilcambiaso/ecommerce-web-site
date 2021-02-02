<?php

require_once 'config.php';

if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Envoyer Fichier') {
    
    $date=date("y-m-d H:i:s");
    $id=$_POST["clientIdSend"];
   if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
     
       // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName =  $fileName. '.' . $fileExtension;
    $newFileName1 =  $fileName.' ('.date("y-m-d").')'. '.' . $fileExtension;

       //allow some extensions only
    $allowedfileExtensions = array('pdf', 'xlsx', 'docx', 'txt', 'xls', 'doc' ,'jpg' , 'png');
               //check if our file extension is in the array 
           if (in_array($fileExtension, $allowedfileExtensions)) {
             
               // directory in which the uploaded file will be moved
               $uploadFileDir = 'uploaded_files/';
               $dest_path = $uploadFileDir . $newFileName1;

               if(move_uploaded_file($fileTmpPath, $dest_path))
               {
                   $req1=$mysqli->query("INSERT INTO `uploaded_files` (`fileName`,`idclient`, `dateFiles`) VALUES ('$newFileName1','$id','$date') ")
                   or die(mysqli_error());
                   header("location:../files.php");
               }
               else
               {
                var_dump('There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.');
               }
             

           }
           else{
               echo("<br><br><h1>File type Not Allowed !</h1>");
           }
   }
   else
   {
    echo('<br><br><h1>There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.</h1>');
   }
}


 //uploaded files
 if(isset($_POST["uploadId"]))
 {
     $uploadedId=$_POST["uploadId"];
     $req1=$mysqli->query("select * from uploaded_files where idclient='$uploadedId'")
     or die(mysqli_error())
     ;
     $uploaded=[];
     while($ligne=mysqli_fetch_assoc($req1))
     {
       $uploaded[]=$ligne;
     }
     echo json_encode($uploaded);
 }

  //delete files
  if(isset($_POST["deleteId"]))
  {
      $Id=$_POST["deleteId"];
      $req1=$mysqli->query("delete from uploaded_files where filesId='$Id'")
      or die(mysqli_error())
      ;
  }


?>