<?php

/**
 * @var $pdo
 */

require_once 'functions/helpers.php';

$articleId = (int)($_GET['id'] ?? null);

$article = getArticle($pdo,$articleId);

$key = "news-"  . $articleId;

if(!isset($_COOKIE[$key]) || !$_COOKIE[$key])
{
    updateViews($pdo,$articleId);
    setcookie($key, 1, time() + 86500, "/");

}


$resultComments = $pdo->prepare("SELECT u.*, c.* FROM comments c left join users u on c.userId = u.id WHERE c.articleId =? AND c.isActive=?");
$resultComments->execute([$articleId,1]);


$user = getUser($pdo);

$userId = !empty($user['id']) ? $user['id'] : 0;
$isAdmin = $user['isAdmin'] ?? NULL;


if(count($_POST) > 0)
{
    $comment = $_POST['comment'];
    $isActive = $user['id'] ? 1 : 0;
    $postComment = $pdo->prepare('INSERT INTO comments SET articleId =?, userId=?,comment=?,isActive=?,createdAt=NOW()');
    $postComment->execute([$articleId,$userId,$comment,$isActive]);
    redirect('/Blog/?act=view&id=' . $articleId);
    
}




require_once 'templates/view.php';
die();