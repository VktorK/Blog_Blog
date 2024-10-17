<?php
/**
 * @var $pdo
 */
$resultUserArticles = $pdo->query(query: "SELECT * FROM articles ORDER BY id DESC LIMIT 9");

$user = null;
$userId = (int)($_SESSION['userId'] ?? null);

if($userId) {
    $result = $pdo->prepare("SELECT * FROM users WHERE id= ? LIMIT 1");
    $result->execute([$userId]);
    $user = $result->fetch();
}


require_once $_SERVER['DOCUMENT_ROOT'] .  '/Blog/templates/index.php';
die();