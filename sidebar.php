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
        '; } else{echo'
    </div>
    <div class="spacer">
        <a id = "submit" href="submit.html">Submit new post</a>
    </div>';}?>
</section>
