<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
// Either returns upload path, or false

function validateImage($photo){

  $target_file = basename($photo["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  //Upload code borrowed from https://www.w3schools.com/php/php_file_upload.asp

  // Check if image file is a actual image or fake image

    $check = getimagesize($photo["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        return false;
    }

  // Check file size
  if ($photo["fileToUpload"]["size"] > 16777215) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
      return false;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      $uploadOk = 0;
      echo "File must be an Image (png, jpg, jpeg)";
      return false;
  }

  // Check if $uploadOk is set to 0 by an error
  if (!$uploadOk == 0) {
        return $imageFileType;
  }
}







?>
