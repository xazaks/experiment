<?php

require_once 'bootstrap.php';

# Get values of variables
$username = $_POST['username'];
$password = $_POST['password'];

if ($username == '' || $password == '') {
    addFlashMessage('All fields must be filled in <br/>');
    redirect("login.php");
}

try {
    $get_user_password = "SELECT * FROM users WHERE Username = :username AND Password = :password";
    $prepare_get_user_password_querry = $database->prepare($get_user_password);
    $prepare_get_user_password_querry->execute(array(':username' => $username, ':password' => md5($password)));
    $user = $prepare_get_user_password_querry->fetchObject();
    if (null == $user) {
        addFlashMessage("Wrong username or password");
        redirect("login.php");
    }
    $activated = $user->Activated;
    if (null == $activated) {
        addFlashMessage("Your account wasn't activated yet.");
        redirect("login.php");
    } else {
        redirect("logged.php");
    }
} catch (PDOException $exception) {
    echo $exception->getMessage();
}

echo render('templates/', array('users' => $users));