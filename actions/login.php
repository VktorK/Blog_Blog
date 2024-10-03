<?php
/**
 * @var $pdo ...
 */
/** @var TYPE_NAME $error */
$error ='';
if(count($_POST) > 0)
{

    $email = strip_tags($_POST['email'] ?? null);
    $password = strip_tags($_POST['password'] ?? null);

    $result = $pdo->prepare("SELECT * FROM users WHERE email=?");
    $result->execute([$email]);
    $user = $result->fetch();
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
        $error = "Can't Fund";
    }

}

require_once "templates/login.php";
die();