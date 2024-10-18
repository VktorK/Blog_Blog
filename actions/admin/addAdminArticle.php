<?php
/**
 * @var $pdo
 * @var $user
 */


$userId = $user['id'];


$error = '';

$categories = $pdo->prepare("SELECT * FROM categories ORDER BY name");
$categories->execute();


if(count($_POST) > 0) {
    $title = strip_tags($_POST['title'] ?? NULL);
    $content = strip_tags($_POST['content'] ?? NULL);
    $categoryId = (int)($_POST['categoryId'] ?? NULL);
    if ($_FILES['file']['size'] === 0) {
        $error = 'Файл не загружен';
    }
    elseif(!$title || !$content){
        $error = 'Some Error';
    } else {

        $filename = upload($userId);

        $result = $pdo->prepare("INSERT INTO articles SET img =?,title=?,content=?,userId=?,categoryId=?, createdAt = NOW()");
        $result->execute([$filename, $title, $content,$categoryId,$userId]);

        redirect('/Blog/admin');
    }
}
require_once $_SERVER['DOCUMENT_ROOT'] .'/Blog/templates/admin/addAdminArticle.php';
die();

//$img='';
//if(count($_POST)) {
//    if ($_FILES['file']['size']) {
//        $filename = upload($user['id']);
//        $img = $filename;
//        @unlink($_SERVER['DOCUMENT_ROOT'] . '/Blog/images/' . $user['img']);
//    }
//
//    $title = strip_tags($_POST['title']) ?? null;
//    $content = strip_tags($_POST['content']) ?? null;
//    $categoryId = (int)$_POST['categoryId'] ?? null;
//    $categoryId = $categoryId ?: 0;
//
//
//    $result = $pdo->prepare("INSERT INTO articles SET img =?,  title=?,content=?,user_id=?, createdAt = NOW()");
//    $result->execute([$img, $title, $content, $user['id']]);
////    var_dump($result);
////    exit();
//}
//    redirect('/Blog/admin');
