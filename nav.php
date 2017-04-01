<style>
.usernav {
  float:right;
}
nav{
  font-size: 1em;
  padding: 0em 1em 0em 1em;
}
</style>


<nav>
    <ul>
        <li>
            <a id ="1" href="/index.php">All</a>
        </li>
        <li>
            <a id ="2" href="#">Cats</a>
        </li>
        <li>
            <a id ="3" href="#">Kittens</a>
        </li>
        <li>
            <a id ="4" href="#">Random</a>
        </li>
        </li>

        <?php
        session_start();
        if (isset($_SESSION['user'])) {
          echo "<li class=\"usernav\">
            <a  href=\"logout.php\">Logout</a>
          </li>";
          echo "<li class=\"usernav\"><a>Logged in as ".$_SESSION['user']."</a></li>";

        }else{
          echo "<li class=\"usernav\">
            <a href=\"/register.html\">Register</a>
          </li>";
        }
        ?>

    </ul>
</nav>
<header>
    <H1>Spreddit</H1>
</header>
