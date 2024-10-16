<?php
/**
 * @var $pdo
 */

$user = checkUser($pdo);
if($user['isAdmin'])
{
    require_once 'actions/admin/articleAdminEdit.php';
} else {

$articleId = $_GET['id'];

$userArticle = getUserArticle($pdo,$articleId,$user['id']);

if(count($_POST) > 0) {
    $img = '';
    if ($_FILES['file']['size'] != 0) {
        $filename = upload($user['id']);
        $img = $filename;
        @unlink($_SERVER['DOCUMENT_ROOT'] . '/Blog/images/' . $userArticle['img']);

    }
    $_POST['title'] ? $title = strip_tags($_POST['title']) : $userArticle['title'];
    $_POST['content'] ? $content = strip_tags($_POST['content']) : $userArticle['content'];
    $_POST['createdAt'] ? $createdAt = $_POST['createdAt'] : $userArticle['createdAt'];
    $result = $pdo->prepare("UPDATE articles SET img=?,title=?, content=? WHERE id=? AND user_id=?");
    $result->execute([$img, $title, $content, $articleId, $user['id']]);
    redirect('?act=getUserArticles');

    }
}

require_once 'templates/articleUserEdit.php';
die();
