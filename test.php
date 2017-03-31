<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Test</title>
  </head>
  <body>
    <form method="post" action= "uploadPic.php" id="registration-form" enctype="multipart/form-data">

        <?php
        session_start();
        echo "Uploading File<br />";
        include("uploadPic.php");
        try{
          echo(uploadPhoto($_FILES));
        }catch (Exception $e) {
          echo $e;
        }
        $pdo = getCon();
        $stmt = $pdo->prepare("SELECT contentType, image FROM userimages where userID = 35");
        $stmt->execute();

          if($stmt->rowCount() >0 ){
            $row = $stmt->fetch();
          	echo '<img src="data:image/'.$row[0].';base64,'.base64_encode($row[1]).'"/>';
          }else{
            echo "No Picture found";
          }

        echo "<br/>Done";
        ?>
    </form>
  </body>
</html>
