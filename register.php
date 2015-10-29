<?php
require_once 'bootstrap.php';

# Get values of variables
$username = $_POST['username'];
$password = $_POST['password'];
$retype = $_POST['retype'];


if ($username == '' || $password == '' || $retype == '') {
    addFlashMessage('All fields must be filled in order to register <br/>');
    redirect("index.php");
}
if ($password !== $retype) {
    addFlashMessage('Provided passwords have to be identical <br/>');
    redirect("index.php");
}

$existance = userExistance($username);

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