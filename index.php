<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
require_once 'functions/helpers.php';
require_once 'config.php';


$mysqli = new mysqli(
    DB_HOST,
    DB_USERNAME,
    DB_PASSWORD,
    DB_NAME,
    DB_PORT
);


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

$userId = intval($_SESSION['userId'] ?? null);

if($userId) {
    $result = $mysqli->query("SELECT * FROM users WHERE id='" . $userId . "' LIMIT 1");
    $user = $result->fetch_assoc();
}

$resultUserArticles = $mysqli->query(query: "SELECT * FROM articles ORDER BY id DESC LIMIT 9");
require_once 'templates/index.php';
die();