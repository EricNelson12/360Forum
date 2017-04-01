<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/post.css">
    <link rel="stylesheet" type="text/css" href="css/loader.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/login_script.js"></script>
    <script src="js/displayPost.js"></script>
    <body>
        <?php include('nav.php');?>
        <?php include('sidebar.php'); ?>
        <section>
            <figure>
                <img src="http://cdn3-www.cattime.com/assets/uploads/2011/08/best-kitten-names-1.jpg" alt="Kitty">
                <figcaption>Look at this cute kitty!</figcaption>
            </figure>

            <form  id="comment-form"  method="post">
              <?php if (isset($_SESSION['user'])) {echo '
                <div>
                    <textarea maxlength = "500" id= "commentArea" name="comment" placeholder="Comment here :)" required></textarea>
                </div>
                <input type="submit" value="Submit">'
                ;}else{ echo '
                  <div style = "text-align:center"><p>Please <a href = "register.html">Register</a> to comment</p></div>';}?>
            </form>

          <ul >

          </ul>


        </section>

    </body>
    <error></error>
    <footer>
      Copyright © 2008 Eric Nelson. All rights reserved
    </footer>

</html>
