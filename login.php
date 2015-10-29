<?php
require_once 'bootstrap.php';

# Get values of variables
$username = $_POST['username'];
$password = $_POST['password'];

if ($username == '' || $password == '') {
    addFlashMessage('All fields must be filled in order to login <br/>');
    redirect("index.php");
}

try {
    $get_user_password = "SELECT * FROM users WHERE Username = :username AND Password = :password";
    $prepare_get_user_password_querry = $database->prepare($get_user_password);
    $prepare_get_user_password_querry->execute(array(':username' => $username, ':password' => md5($password)));
    $user = $prepare_get_user_password_querry->fetchObject();
    if (null !== $user){
        // zalogowany
    }
} catch (PDOException $exception) {
    echo $exception->getMessage();
}