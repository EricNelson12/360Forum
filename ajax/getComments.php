<?php



session_start();

if(isset($_POST['url'])){

  $postID = $_POST['url'];
  include('./getconnection.php');

  //Get All posts
  $pdo = getCon();

  $stmt = $pdo->prepare('SELECT comment, username,commentID FROM comments C,users U WHERE C.userID = U.userID AND postID = ?');
  $stmt->execute([$postID]);
  if($stmt->rowCount() >0 ){
    // echo var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
  }else{

    return false;
  }
}
return false;





 ?>
