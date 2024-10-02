<?php
/**
 * @var $mysqli
 */


$result = $mysqli->query("SELECT * FROM users WHERE id='".$_SESSION['userId'] ."'");
$user = $result->fetch_assoc();

require_once 'templates/profile.php';
die();