<?php

session_start();

require_once('getconnection.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset ($_POST['username']) &&  isset ($_POST['password'])){

      //Assign new data to variables
      $username = $_POST['username'];
      $password = $_POST['password'];

      $id = login($username,$password);

      if($id){
        $_SESSION['user'] = $username;
        $_SESSION['id']   = $id;
        //This goes back to Ajax js method
        echo  json_encode(array("username" => $username));
        exit();
      }
    }
  }
  //This returns to Ajax js method


      function login($u,$p){
      //Get Connection and connect

      $pdo = getCon();

      $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
      $stmt->execute([$u,md5($p)]);
      $user = $stmt->fetch();
      if($stmt->rowCount() >0 ){
        return $user['userID'];
      }else{
        return false;
      }
    }




 ?>
