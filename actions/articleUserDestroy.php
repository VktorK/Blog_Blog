<?php
/**
 * @var $mysqli
 */

$user = checkUser($mysqli);

$articleId = $_GET['id'] ?? NULL;

if(!$articleId)
{
    header("Location: /?act=articles");
    die();
}

$result = $mysqli->query("SELECT * FROM articles WHERE id =" . $articleId);
$article = $result->fetch_assoc();

//var_dump($article);
//exit();

if(!$article)
{
    header("Location: /?act=articles");
    die();
}

@unlink($_SERVER['DOCUMENT_ROOT'] . '/Blog/images/' . $article['img']);

$mysqli->query("DELETE FROM articles WHERE id='".$articleId."' AND user_id=".$user['id']);
header("Location: ?act=getUserArticles");