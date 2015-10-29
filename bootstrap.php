<?php
error_reporting(-1);

session_start();

require_once 'functions.php';

$database = new PDO('mysql:host=localhost;dbname=userdata', 'root', '');
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
