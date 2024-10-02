<?php

/**
 * @var $mysqli
 */
$id = (int)$_GET['id'];

$result = $mysqli->query("SELECT * FROM articles WHERE id =" . $id);
$article = $result->fetch_assoc();


require_once 'templates/view.php';