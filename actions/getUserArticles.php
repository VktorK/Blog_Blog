<?php
/**
 * @var $pdo
 */

$user = checkUser($pdo);

$resultUserArticles = $pdo->prepare("SELECT * FROM articles WHERE user_id=? ORDER BY id DESC");
$resultUserArticles->execute([$user['id']]);


require_once 'templates/getUserArticles.php';
die();