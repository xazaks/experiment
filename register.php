<?php

error_reporting(-1);

echo '<pre>', print_r(array(
    'get' => $_GET,
    'post' => $_POST), true), '</pre>';

# Get values of variables
$username = $_POST['username'];
$password = $_POST['password'];
$retype = $_POST['retype']

# Send data to database
try {
    $database = new PDO('mysql:host=localhost;dbname=userdata', 'root', '');
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $adduser = "INSERT INTO users (Username, Password) VALUES (:username,:password)";
    $prepare_add_user_querry = $database->prepare($adduser);
    $prepare_add_user_querry->execute(array(':username' => $username, ':password' => md5($password)));
} catch (PDOException $exception) {
    echo $exception->getMessage();
}
# Print data
var_dump($username);
print_r("<br/>");
var_dump($password);
print_r("<br/>");
var_dump($database);
?>