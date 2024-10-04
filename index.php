<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
require_once 'functions/helpers.php';
require_once 'config/config.php';
require_once 'config/routers.php';


$dsn = "mysql:host=". DB_HOST .";dbname=". DB_NAME .";charset=utf8";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $opt);

if(isset($_REQUEST['act']))
{
    if(!empty($routers[$_REQUEST['act']]))
    {
        require_once $routers[$_REQUEST['act']];
    }
}
$resultUserArticles = $pdo->query(query: "SELECT * FROM articles ORDER BY id DESC LIMIT 9");
$user = null;

$userId = (int)$_SESSION['userId'] ?? null;

if($userId) {
    $result = $pdo->prepare("SELECT * FROM users WHERE id= ? LIMIT 1");
    $result->execute([$userId]);
    $user = $result->fetch();
}


require_once 'templates/index.php';
die();