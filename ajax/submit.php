<?php
session_start();
if (!isset($_SESSION['user'])){
  return;
}
// echo "test";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  if(isset($_POST['title'])  &&  isset ($_POST['desc'])){
    //Assign new data to variables
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    


    $boardName = "Cats";

    if(isset($_POST['board'])){
      $boardName = $_POST['board'];
    }


      //Validate the image
      require_once("../validateImg.php");
      $imageFileType = validateImage($_FILES);
      if($imageFileType){

      //store the contents of the files in memory in preparation for upload
      $imageData = file_get_contents($_FILES['fileToUpload']['tmp_name']);
      $imageData = base64_encode($imageData);

      $sql = "INSERT INTO userposts (userID,postText,title,image,contentType,boardName) VALUES (?,?,?,?,?,?)";
      require_once("getconnection.php");
      $pdo = getCon();
      if($pdo->prepare($sql)->execute([$_SESSION['id'],$desc,$title,$imageData,$imageFileType,$boardName])){
        header("Location: ../index.php");
      }else{
        echo "Database Error";
      }
    }else{echo "Couldn't Validate Image";}

  }
}


 ?>
