<?php

/**
 * @var $pdo
 */

require_once 'functions/helpers.php';

$user = checkUser($pdo);

$articleId = (int)$_GET['id'];


$article = getArticle($pdo,$articleId);




require_once 'templates/view.php';