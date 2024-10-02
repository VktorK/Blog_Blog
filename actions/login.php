<?php
/**
 * @var $mysqli ...
 */
$error ='';
if(count($_POST) > 0)
{

    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    $result = $mysqli->query("SELECT * FROM users WHERE email='". $email ."'");
    $user = $result->fetch_assoc();
    if(empty($user))
    {
        $error = 'Пользователя с таким Email не существует';
        header('Location: ?act=login');
        die();
    }

    if(password_verify($password, $user['password']))
    {
        $_SESSION['userId'] = $user['id'];
        header('Location: /Blog/?act=profile');
        die();
    } else {
        $error = 'Cant Fund';
    }

}

require_once 'templates/login.php';
die();