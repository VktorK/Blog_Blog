<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
require_once 'functions/helpers.php';
require_once 'config.php';


$dsn = "mysql:host=". DB_HOST .";dbname=". DB_NAME .";charset=utf8";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $opt);


if(isset($_GET['act']))
{
    switch($_GET['act']) {
        case 'register':
            require_once 'actions/register.php';
            break;
        case 'login':
            require_once 'actions/login.php';
            break;
        case 'profile':
            require_once 'actions/profile.php';
            break;
        case 'profileUpdate':
            require_once 'actions/profileUpdate.php';
            break;
        case 'addArticle':
            require_once 'actions/addArticle.php';
            break;
        case 'getUserArticles':
            require_once 'actions/getUserArticles.php';
            break;
        case 'articleUserEdit':
            require_once 'actions/articleUserEdit.php';
            break;
        case 'articleUserDestroy':
            require_once 'actions/articleUserDestroy.php';
            break;
        case 'logout':
            require_once 'actions/logout.php';
            break;
        case 'view':
            require_once 'actions/view.php';
            break;
    }
}



$user = null;

$userId = (int)$_SESSION['userId'] ?? null;

if($userId) {
    $result = $pdo->prepare("SELECT * FROM users WHERE id= ? LIMIT 1");
    $result->execute([$userId]);
    $user = $result->fetch();
}

$resultUserArticles = $pdo->query(query: "SELECT * FROM articles ORDER BY id DESC LIMIT 9");
require_once 'templates/index.php';
die();