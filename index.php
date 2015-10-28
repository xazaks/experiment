<?php
require_once 'functions.php';
session_start();
$message = getFlashMessage();
?>
<html>
    <head>
        <title>eXpeRimenT</title>
        <link rel="stylesheet" type="text/css" href="sample_style.css">
    </head>
    <body>
        <div class="topbar">
            <div id="register">
                <span class="text">
                    Register
                </span>
            </div>
            <div id="login">
                <span class="text">
                    Login
                </span>
            </div>
        </div>
        <?php if (!empty($message)): ?>
            <div id="msg" class="box text">
                <span>
                    <?php echo $message ?>
                </span>
            </div>
        <?php endif; ?>
        <div class="box login-box">
            <div class="gradient header">
                <h3 class="text center shadow">
                    Welcome
                </h3>
            </div>
            <form action="register.php" method="post">
                <ul class="text">
                    <li>
                        <label for="username">Username:</label>
                        <input type="text" autocomplete="off" class="inputs transparency" name="username">
                    </li>
                    <li>
                        <label for="password">Password:</label>
                        <input type="password" class="inputs transparency" name="password">
                    </li>
                    <li>
                        <label for="retype">Retype Password:</label>
                        <input type="password" class="inputs transparency" name="retype">
                    </li>
                </ul>
                <input type="submit" value="Register">
            </form>
        </div>
    </body>
</html>