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
            <a class = "board" href="index.php">All</a>
        </li>
        <li>
            <a  class = "board" href="index.php">Cats</a>
        </li>
        <li>
            <a class = "board" href="index.php">Kittens</a>
        </li>
        <li>
            <a class = "board" href="index.php">Random</a>
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
            <a href=\"../register.html\">Register</a>
          </li>";
        }
        ?>

    </ul>
</nav>
<header>
    <H1><a href = "index.php">Spreaddit</a></H1>
</header>
