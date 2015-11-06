<?php

function addFlashMessage($msg) {
    $_SESSION["message"] = $msg;
}

function getFlashMessage() {
    if (!isset($_SESSION["message"])) {
        return '';
    }
    $message = $_SESSION["message"];
    $_SESSION["message"] = '';
    return $message;
}

function redirect($place) {
    header("Location: $place");
    exit();
}

function isLoggedIn()
{
    return $_SESSION['logged'];
}

function setLoggedIn($state)
{
    $_SESSION['logged'] = $state;
}
function render($template, array $vars = array()) {
    extract($vars);
    ob_start();
    include $template;
    return ob_get_clean();
}

function userExistance($username) {
    global $database;

    $user_existance = "SELECT COUNT(*) AS count FROM users WHERE Username = :username";
    $prepare_user_existance_querry = $database->prepare($user_existance);
    $prepare_user_existance_querry->execute(array(':username' => $username));
    return $prepare_user_existance_querry->fetchObject()->count;
}
