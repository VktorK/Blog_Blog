<?php
/**
 * @var $pdo
 */

$user = checkUser($pdo);

if(count($_POST))
{
    $_POST['login'] ?  $login = strip_tags($_POST['login']) : $user['login'];
    $_POST['name'] ? $name = strip_tags($_POST['name']) : $user['name'];
    $_POST['surname'] ? $surname = strip_tags($_POST['surname']) : $user['surname'];
    $_POST['about'] ? $about = strip_tags($_POST['about']) : $user['about'];
    $_POST['phone'] ? $phone = strip_tags($_POST['phone']) : $user['phone'];
    $result = $pdo->prepare("UPDATE users SET login=?,name=?,surname=?,about=?,phone=? WHERE id=?");
    $result->execute([$login,$name,$surname,$about,$phone,$user['id']]);
    redirect('?act=profile');
}

require_once 'templates/profileUpdate.php';
die();