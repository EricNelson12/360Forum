<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/post.css">

    <body>
        <nav>
            <ul>
              <li>
                  <a href="index.html">Home |</a>
              </li>
              <li>
                  <a href="#">-Cats</a>
              </li>
              <li>
                  <a href="#">-Kittens</a>
              </li>
              <li>
                  <a href="#">-Random</a>
              </li>
            </ul>
        </nav>
        <header>
            <H1>Spreddit</H1>
        </header>
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
        <section class="sidebar">
            <div class="spacer">
                <form>
                    <input type="text" name="q" placeholder="search" tabindex="20">
                </form>
            </div>
            <div class="spacer">
                <form name="login" action="index_submit" method="get" accept-charset="utf-8">
                    <ul>
                        <li>
                            <label>Login or <a href = "register.html">Register</a></label>
                        </li>
                        <li>
                            <input type="email" name="usermail" placeholder="username" required>
                        </li>
                        <li>
                            <input type="password" name="password" placeholder="password" required>
                        </li>
                        <li>
                            <input class="submit" type="submit" value="Login">
                        </li>
                    </ul>
                </form>
            </div>
            <div class="spacer">
                <a id="submit" href="submit.html">Submit new post</a>
            </div>
        </section>
    </body>
    <footer>
      Copyright © 2008 Eric Nelson. All rights reserved
    </footer>

</html>
