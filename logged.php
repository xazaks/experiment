<?php

require_once 'bootstrap.php';
$get_users_activation_status = "SELECT Id, Username, Activated FROM users";
//$get_users_amount = "SELECT COUNT(*) AS count FROM users";
$sth = $database->prepare($get_users_activation_status);
$sth->execute();
$sth->setFetchMode(PDO::FETCH_CLASS, 'stdClass');
$users = $sth->fetchAll();

echo render("templates/layout.php", array(
    'message' => $message,
    'page_content' => render(
        'templates/logged.php',
        array('users' => $users)
    )
));