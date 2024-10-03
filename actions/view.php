<?php

/**
 * @var $pdo
 */

require_once 'functions/helpers.php';

$userId = $_SESSION['userId'];
$articleId = (int)$_GET['id'];


$article = getArticle($pdo,$articleId);




require_once 'templates/view.php';