<?php
/**
 * @var $pdo
 */


if(count($_POST) > 0) {
    $login = $_POST['login'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $password2 = $_POST['password2'] ?? null;

    if (!empty($email) && ($password === $password2)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result = $pdo->prepare("INSERT INTO users set login=?,email =?, password =?, isAdmin=0" );
        $result->execute([$login,$email,$password]);

        sendEmail('Регистрация прошла успешно', 'Поздравляем, регистрация прошла успешно');

        redirect('?act=login');
    } else {
        redirect('?act=register');
    }
}

require_once 'templates/register.php';
die();