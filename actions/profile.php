<?php
/**
 * @var $pdo
 */

$userId= (int)($_SESSION['userId'] ?? null);



$user = $pdo->prepare("SELECT * FROM users WHERE id=?");
$user->execute([$userId]);
$user  = $user->fetch();




require_once $_SERVER['DOCUMENT_ROOT'] . '/Blog/templates/profile.php';
die();