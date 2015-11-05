<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>eXpeRimenT</title>
        <link rel="stylesheet" type="text/css" href="sample_style.css">
    </head>
    <body>
        <div class="topbar">
            <div id="register">
                <span class="text align">
                    <a href="index.php">Register</a>
                </span>
            </div>
            <div id="login">
                <span class="text align">
                    <a href="login.php">Login</a>
                </span>
            </div>
        </div>
        <?php if (!empty($message)): ?>
            <div id="msg" class="box text">
                <span class="align">
                    <?php echo $message ?>
                </span>
            </div>
        <?php endif; ?>
        <?php echo $page_content ?>
    </body>
</html>