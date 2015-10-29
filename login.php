<?php
require_once 'bootstrap.php';

$message = getFlashMessage();

echo render("templates/layout.php", array(
    'message' => $message,
    'page_content' => render('templates/login.php')
)); 