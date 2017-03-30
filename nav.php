<style>
.usernav {
  float:right;
}
</style>


<nav>
    <ul>
        <li>
            <a href="#">Home |</a>
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
        </li>

        <?php
        session_start();
        if (isset($_SESSION['user'])) {
          echo "<li class=\"usernav\">
            <a  href=\"/logout\">Logout</a>
          </li>";
          echo "<li class=\"usernav\"><a>Logged in as ".$_SESSION['user']."</a></li>";

        }else{
          echo "<li class=\"usernav\">
            <a href=\"/login\">Login</a>
          </li>";
        }
        ?>

    </ul>
</nav>
<header>
    <H1>Spreddit</H1>
</header>
