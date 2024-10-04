<?php
/**
 * @var $pdo
 */
$user = checkUser($pdo);
$articleId = $_GET['id'];

$userArticle = getAdminArticle($pdo,$articleId);

//var_dump($userArticle);
//exit();
if(count($_POST) > 0) {
    $img = '123';
    if ($_FILES['file']['size']) {
        $filename = upload($user['id']);
        $img = $filename;
        @unlink($_SERVER['DOCUMENT_ROOT'] . '/Blog/images/' . $userArticle['img']);


    } else {
        $_POST['title'] ? $title = strip_tags($_POST['title']) : $userArticle['title'];
        $_POST['content'] ? $content = strip_tags($_POST['content']) : $userArticle['content'];
        $_POST['createdAt'] ? $createdAt = $_POST['createdAt'] : $userArticle['createdAt'];

        $result = $pdo->prepare("UPDATE articles SET img=?,title=?, content=?, createdAt =? WHERE id=?");
        $result->execute([$img, $title, $content,$createdAt, $articleId]);
        redirect('?act=indexAdmin');

    }
}


require_once 'templates/admin/articleAdminEdit.php';
die();