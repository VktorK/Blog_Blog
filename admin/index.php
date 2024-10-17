<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/Blog/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Blog/config/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Blog/config/routers-admin.php';


$dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $opt);

$user = isAdminUser($pdo);

if (isset($_REQUEST['act']) && !empty($routersAdmin[$_REQUEST['act']])) {
    require_once $routersAdmin[$_REQUEST['act']];
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Blog/actions/admin/index.php';
}