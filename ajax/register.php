<?php
$target_dir = "../uploads/";
$date = new DateTime();
$target_file = $target_dir .$date ->format('His'). basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

//Upload code borrowed from https://www.w3schools.com/php/php_file_upload.asp

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
if ($_FILES["fileToUpload"]["size"] > 500000) {
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
  if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Error Uploading File";
        return;
      }

include("getconnection.php");

//Referenced this tutorial https://phpdelusions.net/pdo#prepared

//Checks to make sure values are POSTED
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['firstname'])  &&  isset ($_POST['lastname']) &&  isset ($_POST['username'])
  &&  isset ($_POST['email']) &&  isset ($_POST['password'])){

    //Assign new data to variables
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Prepare statement, Execute and Get results
    $pdo = getCon();
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ? OR email = ?');
    $stmt->execute([$username,$email]);
    $user = $stmt->fetch();
    if($stmt->rowCount() >0 ){
      echo "Username already exists :(";
    }
    //Create new user
    else{
      $sql = "INSERT INTO users (username,firstName,lastName ,email,password,picURL) VALUES (?,?,?, ?,?,?)";
      if($pdo->prepare($sql)->execute([$username,$firstname,$lastname,$email,md5($password),$target_file])){
        echo "ok";
      }else{
        echo "Database Error";
      }

    }

}
//Prevent sneaky gets
} elseif(($_SERVER["REQUEST_METHOD"] == "GET")){
  echo "Nice try buckaroo";
}
}




 ?>
