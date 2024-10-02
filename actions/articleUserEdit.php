<?php
/**
 * @var $mysqli
 */

$user = checkUser($mysqli);

$articleId = $_GET['id'];

$resulUserArticle = $mysqli->query("SELECT * FROM articles WHERE id='". $articleId ."' AND user_id=" .$user['id']);
$userArticle = $resulUserArticle->fetch_assoc();

if(count($_POST) > 0)
{
    $_POST['title'] ? $title = $_POST['title'] : $userArticle['title'];
    $_POST['content'] ? $content = $_POST['content'] : $userArticle['content'];
    $_POST['createdAt'] ? $createdAt = $_POST['createdAt'] : $userArticle['createdAt'];
    $mysqli->query("UPDATE articles SET title='".$title."', content='". $content. "' WHERE id='". $articleId ."' AND user_id=" .$user['id']);
    header('Location: ?act=getUserArticles');
}

require_once 'templates/articleUserEdit.php';
die();
