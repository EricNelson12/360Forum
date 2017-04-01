<?php
session_start();
if (!isset($_SESSION['id'])){
  return;
}
// echo var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  if(isset($_POST['comment']) && isset($_POST['postID'])){
    //Assign new data to variables
    $comment = $_POST['comment'];
    $postID = $_POST['postID'];

      $sql = "INSERT INTO comments (comment, userID, postID) VALUES (?,?,?)";
      require_once("getconnection.php");
      $pdo = getCon();

      if($pdo->prepare($sql)->execute([$comment,$_SESSION['id'],$postID])){
        echo 'ok';
      }else{
        echo 'Error add comment';
      }

  }
}

return true;










 ?>
