<?php
/**
 * @var $pdo
 */

$user = checkUser($pdo);

$articleId = $_GET['id'] ?? NULL;

if(!$articleId)
{
    header("Location: /?act=articles");
    die();
}


$article = getArticle($pdo,$articleId);


if(!$article)
{
    redirect('/?act=articles');
}

@unlink($_SERVER['DOCUMENT_ROOT'] . '/Blog/images/' . $article['img']);

$result = $pdo->prepare("DELETE FROM articles WHERE id=? AND user_id=?");
$result->execute([$articleId,$user['id']]);
redirect('?act=getUserArticles');