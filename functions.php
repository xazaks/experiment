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
