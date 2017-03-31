<?php

session_start();
include('./getconnection.php');

if(isset($_POST['url'])){

  $postID = $_POST['url'];

  $pdo = getCon();

  $stmt = $pdo->prepare('SELECT  U.userID,upVotes,title,username,postText, UP.image,postID FROM userposts UP,users U where UP.userID = U.userID AND postID = ?');
  $stmt->execute([$postID]);
  if($stmt->rowCount() >0 ){
    // echo var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
  }else{

    return false;
  }
  return false;
}





 ?>
