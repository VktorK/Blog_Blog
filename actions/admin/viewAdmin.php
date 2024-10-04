<?php

/**
 * @var $pdo
 */

require_once 'functions/helpers.php';

$user = checkUser($pdo);


$userAdmin = $user['isAdmin'];
$articleId = (int)$_GET['id'];


$article = getAdminArticles($pdo);




require_once 'templates/view.php';
