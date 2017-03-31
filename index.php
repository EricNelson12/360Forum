<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/login_script.js"></script>
    <script src="js/getPost.js"></script>

    <body>
      <?php include('nav.php');?>
        <section class="posts">
            <ol>
                <li>
                    <a href = "post.html">Test post please ignore</a>
                </li>
                <li>
                    <a href = "post.html">Cats</a>
                </li>
                <li>
                    <a href = "post.html">Kittens</a>
                </li>
            </ol>
        </section>
        <section class="sidebar">
            <div class="spacer">
                <form>
                    <input type="text" name="q" placeholder="search" tabindex="20">
                </form>
            </div>
            <div class="spacer">
               <?php if (!isset($_SESSION['user'])) {echo '
                <form id="login-form" method="post" accept-charset="utf-8">
                    <ul>
                        <li>
                            <label>Login or <a href = "register.html">Register</a></label>
                        </li>
                        <li>
                            <input type="username" name="username" placeholder="username" required>
                        </li>
                        <li>
                            <input type="password" name="password" placeholder="password" required>
                        </li>
                        <p id = "login-error">
                          Invalid Username or Password
                        </p>
                        <li>
                            <input class="submit" type="submit" value="Login">
                        </li>
                    </ul>
                </form>
                ';}?>
            </div>
            <div class="spacer">
                <a id = "submit" href="submit.html">Submit new post</a>
            </div>
        </section>
    </body>
    <footer>
      Copyright © 2008 Eric Nelson. All rights reserved
    </footer>
</html>
