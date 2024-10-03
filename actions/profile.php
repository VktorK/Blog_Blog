<?php
/**
 * @var $pdo
 */


$result = $pdo->prepare("SELECT * FROM users WHERE id=?");
$result->execute([$_SESSION['userId']]);
$user = $result->fetch();

require_once 'templates/profile.php';
die();