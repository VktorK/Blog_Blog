<?php
/**
 * @var $pdo
 */

$user = checkUser($pdo);

$perPage = 5;
$count = $pdo->prepare("SELECT COUNT(*) FROM articles");
$count->execute();
$count = $count->fetchColumn();
$pages = ceil($count / $perPage);

$offset = 0;

$currentPage = (int)($_GET['page']);
$currentPage = $currentPage > 1 ? $currentPage - 1 : 0;

$offset = $perPage * $currentPage;

$resultUserArticles = $pdo->prepare("SELECT * FROM articles WHERE user_id=? ORDER BY id DESC LIMIT ?,?");
$resultUserArticles->execute([$user['id'],$offset,$perPage]);


require_once 'templates/getUserArticles.php';
die();