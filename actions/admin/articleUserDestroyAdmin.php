<?php
/**
 * @var $pdo
 */

$user = checkUser($pdo);

$articleId = $_GET['id'] ?? NULL;

if(!$articleId)
{
    header("Location: /?act=indexAdmin");
    die();
}


$article = getArticle($pdo,$articleId);


if(!$article)
{
    redirect('/?act=indexAdmin');
}

@unlink($_SERVER['DOCUMENT_ROOT'] . '/Blog/images/' . $article['img']);

$result = $pdo->prepare("DELETE FROM articles WHERE id=?");
$result->execute([$articleId]);
redirect('?act=getAllUserArticlesToAdmin');