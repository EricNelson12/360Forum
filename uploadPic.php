<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
// Either returns upload path, or false
function uploadPhoto($photo){

date_default_timezone_set("Asia/Bangkok");
$date = new DateTime();
$target_file = $target_dir .$date ->format('His').basename($photo["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

//Upload code borrowed from https://www.w3schools.com/php/php_file_upload.asp

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($photo["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        return;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    return;
}

// Check file size
if ($photo["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    return;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
    echo "File must be an Image (png, jpg, jpeg)";
    return;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
      echo "Error Uploading File";
      return;
}else{
  include("ajax/getconnection.php");
  try{
  $pdo = getCon();
  $imageData = file_get_contents($_FILES['fileToUpload']['tmp_name']);
  //store the contents of the files in memory in preparation for upload
  $sql = "INSERT INTO userimages (userID, contentType, image) VALUES(35,?,?)";

  $pdo->prepare($sql)->execute([$imageFileType,$imageData]);
}catch(Exception $e){
    echo $e;
  }




  // if (move_uploaded_file($photo["fileToUpload"]["tmp_name"], $target_file)) {
  //       return $target_file;
  //     }else{
  //       echo "File not uploaded";
  //     }
    }
  }


?>
