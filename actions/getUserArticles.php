<?php
/**
 * @var $mysqli
 */

$user = checkUser($mysqli);

$resultUserArticles = $mysqli->query("SELECT * FROM articles WHERE user_id='". $user['id'] ."' ORDER BY id DESC");


require_once 'templates/getUserArticles.php';
die();