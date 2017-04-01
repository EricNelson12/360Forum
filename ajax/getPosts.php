<?php

session_start();
include('./getconnection.php');

//Get All posts
$pdo = getCon();
if(!isset($_SESSION['board'])){
   $_SESSION['board'] = "All";
}
$boardID = $_SESSION['board'];

$sql = 'SELECT  U.userID,upVotes,title,username,postText, UP.image,postID FROM userposts UP,users U where UP.userID = U.userID';

if($boardID != "All"){
	$sql = $sql . ' AND boardName = ?';
}

$stmt = $pdo->prepare($sql);
$stmt->execute([$boardID]);
if($stmt->rowCount() >0 ){
  // echo var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
  echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}else{

  return false;
}
return false;





 ?>
