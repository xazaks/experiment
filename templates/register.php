<div class="box login-box">
    <div class="gradient header">
        <span class="text center shadow">
            Welcome
        </span>
    </div>
    <form action="process_register.php" method="post">
        <ul class="text">
            <li>
                <label for="username">Username:</label>
                <input type="text" autocomplete="off" class="background-color border transparency" name="username">
            </li>
            <li>
                <label for="password">Password:</label>
                <input type="password" class="background-color border transparency" name="password">
            </li>
            <li>
                <label for="retype">Retype Password:</label>
                <input type="password" class="background-color border transparency" name="retype">
            </li>
        </ul>
        <input class="button border" type="submit" value="Register">
    </form>
</div>