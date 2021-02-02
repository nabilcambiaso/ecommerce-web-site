<?php
    include "../../crud/dbConnexion.php";

if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload File') {
    
     $url=$_POST["url"];
     $id=$_POST["idUploads"];
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
     $allowedfileExtensions = array('pdf', 'xlsx', 'docx', 'txt', 'xls', 'doc');
                //check if our file extension is in the array 
            if (in_array($fileExtension, $allowedfileExtensions)) {
              
                // directory in which the uploaded file will be moved
                $uploadFileDir = '../uploaded_files/';
                $dest_path = $uploadFileDir . $newFileName1;
 
                if(move_uploaded_file($fileTmpPath, $dest_path))
                {
                    $req1=$mysqli->query("INSERT INTO `uploaded_files` (`employeeId`, `fileName`) VALUES ('$id', '$newFileName1') ")
                    or die(mysqli_error());
                    header("location:".$url);
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