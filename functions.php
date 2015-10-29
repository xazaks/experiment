<?php

function addFlashMessage($msg) {
    $_SESSION["message"] = $msg;
}

function getFlashMessage() {
    $message = $_SESSION["message"];
    $_SESSION["message"] = '';
    return $message;
}

function redirect($place) {
    header("Location: $place");
    exit();
}

function render($template, array $vars = array()) {
    extract($vars);
    $message;
    $page_content;
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
