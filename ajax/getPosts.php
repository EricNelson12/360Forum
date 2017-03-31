<?php

session_start();
include('./getconnection.php');

//Get All posts
$pdo = getCon();

$stmt = $pdo->prepare('SELECT * FROM userposts');
$stmt->execute();
if($stmt->rowCount() >0 ){
  // echo var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
  echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}else{

  return false;
}
return false;





 ?>
