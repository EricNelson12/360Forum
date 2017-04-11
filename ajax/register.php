<?php


include("getconnection.php");

//Referenced this tutorial https://phpdelusions.net/pdo#prepared

//Checks to make sure values are POSTED
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
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
      echo "Username or email already exists :(";
    }
    //Create new user
    else{

          //Validate the image
          require_once("../validateImg.php");
          $imageFileType = validateImage($_FILES);
          if($imageFileType){

          //store the contents of the files in memory in preparation for upload
          $imageData = file_get_contents($_FILES['fileToUpload']['tmp_name']);
          $imageData = base64_encode($imageData);

          //Write all new user info into database, including image
          $sql = "INSERT INTO users (username,firstName,lastName ,email,password,contentType, image) VALUES (?,?,?,?,?,?,?)";
          if($pdo->prepare($sql)->execute([$username,$firstname,$lastname,$email,md5($password),$imageFileType,$imageData])){
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
