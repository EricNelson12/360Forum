<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/post.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/login_script.js"></script>
    <body>
        <?php include('nav.php');?>
        <section class="posts">
            <figure>
                <img src="http://cdn3-www.cattime.com/assets/uploads/2011/08/best-kitten-names-1.jpg" alt="Kitty">
                <figcaption>Look at this cute kitty!</figcaption>
            </figure>
            <form class = "comment" action="" method="post">
                <div>
                    <textarea name="comments" placeholder="Comment here :)" required></textarea>
                </div>
                <input id="button" type="submit" value="Submit">
            </form>
        </section>
        <?php include('sidebar.php'); ?>
    </body>
    <footer>
      Copyright © 2008 Eric Nelson. All rights reserved
    </footer>

</html>
