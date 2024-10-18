<?php
/**
 * @var $pdo
 * @var $user
 */
$articleId = $_GET['id'];
if (!$articleId) {
    redirect('/Blog/admin');
}
$userArticle = getAdminArticle($pdo,$articleId);

$categories = $pdo->prepare("SELECT * FROM categories ORDER BY name");
$categories->execute();




if(count($_POST)) {
    $img = $userArticle['img'];
    if ($_FILES['file']['size']) {
        $filename = upload($user['id']);
        $img = $filename;
        @unlink($_SERVER['DOCUMENT_ROOT'] . '/Blog/images/' . $userArticle['img']);

    }
    $_POST['title'] ? $title = strip_tags($_POST['title']) : $userArticle['title'];
    $_POST['content'] ? $content = strip_tags($_POST['content']) : $userArticle['content'];
    $categoryId = (int)$_POST['categoryId'];
    $categoryId = $categoryId ?: 0;
    $isPublished = $_POST['isPublished'] ?? 0;

    $result = $pdo->prepare("UPDATE articles SET img=?,title=?, content=?,categoryId=?,isPublished=? WHERE id=?");
    $result->execute([$img, $title, $content,$categoryId,$isPublished,$articleId]);
//    var_dump($result);
//    exit();
    redirect('/Blog/admin');
}




require_once $_SERVER['DOCUMENT_ROOT'] . '/Blog/templates/admin/articleAdminEdit.php';
die();