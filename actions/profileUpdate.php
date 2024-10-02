<?php
/**
 * @var $mysqli
 */

$user = checkUser($mysqli);

if(count($_POST))
{
    $_POST['login'] ? $login = $_POST['login'] : $user['login'];
    $_POST['name'] ? $name = $_POST['name'] : $user['name'];
    $_POST['surname'] ? $surname = $_POST['surname'] : $user['surname'];
    $_POST['about'] ? $about = $_POST['about'] : $user['about'];
    $_POST['phone'] ? $phone = $_POST['phone'] : $user['phone'];
    $mysqli->query("UPDATE users SET login='". $login ."',name='". $name ."',surname='". $surname ."',about='". $about ."',phone='". $phone ."' WHERE id=" . $user['id']);
    header('Location: ?act=profile');
    die();
}

require_once 'templates/profileUpdate.php';
die();