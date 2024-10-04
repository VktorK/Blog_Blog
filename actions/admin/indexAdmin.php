<?php
/**
 * @var $pdo
 */

require_once 'functions/helpers.php';


$user = checkUser($pdo);



$resultUserArticles = $pdo->query(query: "SELECT * FROM articles ORDER BY id DESC LIMIT 9");
require_once 'templates/admin/indexAdmin.php';
die();