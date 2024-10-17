<?php
/**
 * @var $pdo
 */
$perPage = 5;
$result = $pdo->prepare(query: "SELECT count(*) FROM articles");
$result->execute();
$count = $result->fetchColumn();

$pages = ceil($count / $perPage);

$offset = 0;

$currentGetPage = (int)($_GET['page'] ?? null);
$currentPage = $currentGetPage > 1 ? $currentGetPage - 1 : 0;
$offset = $perPage * $currentPage;

$stopButton = false;

$next = $currentGetPage + 1;
$previous = $currentGetPage - 1;

$resultUserArticles = $pdo->prepare("SELECT * FROM articles ORDER BY id DESC LIMIT ?, ?");
$resultUserArticles->execute([$offset,$perPage]);

include_once $_SERVER['DOCUMENT_ROOT'] . '/Blog/templates/admin/index.php';

