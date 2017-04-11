<?php

session_start();
include('getconnection.php');




//Get All posts from correct board
$pdo = getCon();
if(!isset($_SESSION['board'])){
   $_SESSION['board'] = "All";
}
$boardID = $_SESSION['board'];
// U.image AS uImage

$stmt;

if($_SESSION['board'] != "search"){

      $sql = 'SELECT  U.userID,upVotes,title,username,postText  , UP.image, U.image AS uImage ,  postID FROM userposts UP,users U where UP.userID = U.userID';

      if($boardID != "All"){
      	$sql = $sql . ' AND boardName = ?';
      }

      $stmt = $pdo->prepare($sql);

      $stmt->execute([$boardID]);

}else{

  $sql = 'SELECT  U.userID,upVotes,title,username,postText,  UP.image, U.image AS uImage ,  postID
  FROM userposts UP,users U
  where UP.userID = U.userID AND (title LIKE ? OR postText LIKE ? OR username LIKE ?)';
  $stmt = $pdo->prepare($sql);
  if(isset($_SESSION['searchQuery'])){
    $searchQuery = '%'.$_SESSION['searchQuery'].'%';
  } else{
    $searchQuery = '%poop%';
  }
  $stmt->execute([$searchQuery,$searchQuery,$searchQuery]);
}


if($stmt->rowCount() >0 ){

      echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

}else{

  return false;
}


return false;





 ?>
