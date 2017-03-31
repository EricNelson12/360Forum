<?php

session_start();
include('./getconnection.php');

//Get All posts
$pdo = getCon();

$stmt = $pdo->prepare('SELECT  U.userID,upVotes,title,username,postText, UP.image,postID FROM userposts UP,users U where UP.userID = U.userID');
$stmt->execute();
if($stmt->rowCount() >0 ){
  // echo var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
  echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}else{

  return false;
}
return false;





 ?>
