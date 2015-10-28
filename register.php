<?php

error_reporting(-1);
require_once 'functions.php';
session_start();

# Get values of variables
$username = $_POST['username'];
$password = $_POST['password'];
$retype = $_POST['retype'];


if ($username == '' or $password == '' or $retype == '') {
    addFlashMessage('All fields must be filled in order to register <br/>');
    redirect("index.php");
}
if ($password !== $retype) {
    addFlashMessage('Provided passwords have to be identical <br/>');
    redirect("index.php");
}
$database = new PDO('mysql:host=localhost;dbname=userdata', 'root', '');
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$user_existance = "SELECT COUNT(*) AS count FROM users WHERE Username = :username";
$prepare_user_existance_querry = $database->prepare($user_existance);
$prepare_user_existance_querry->execute(array(':username' => $username));
$existance = $prepare_user_existance_querry->fetchObject()->count;

if ($existance != 0) {
    addFlashMessage('You are known here, no need to introduce again. <br/>');
    redirect("index.php");
}
try {
    $adduser = "INSERT INTO users (Username, Password) VALUES (:username,:password)";
    $prepare_add_user_querry = $database->prepare($adduser);
    $prepare_add_user_querry->execute(array(':username' => $username, ':password' => md5($password)));
} catch (PDOException $exception) {
    echo $exception->getMessage();
}

addFlashMessage('We will remember you!');
redirect("index.php");

# Print data
/*
var_dump($username);
print_r("<br/>");
var_dump($password);
print_r("<br/>");
var_dump($database);

echo '<pre>', print_r(array(
    'get' => $_GET,
    'post' => $_POST), true), '</pre>';
*/