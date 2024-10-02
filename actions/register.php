<?php
/**
 * @var $mysqli
 */


if(count($_POST) > 0) {
    $login = $_POST['login'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $password2 = $_POST['password2'] ?? null;

    if (!empty($email) && ($password === $password2)) {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $mysqli->query("INSERT INTO users set login= '" . $login ."',email ='" .$email ."', password ='". $password."'" );
    } else {
        require_once 'templates/register.php';
        die();
    }
    require_once 'templates/login.php';
    die();
}

require_once 'templates/register.php';
die();