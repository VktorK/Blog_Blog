<?php
/**
 * @var $pdo
 * @var $user
 */
require_once $_SERVER['DOCUMENT_ROOT'] .'/Blog/templates/admin/addAdminArticle.php';


$error = '';
if(count($_POST)) {
    $title = strip_tags($_POST['title'] ?? NULL);
    $content = strip_tags($_POST['content']?? NULL);
    $category = strip_tags($_POST['category']?? NULL);
    if ($_FILES['file']['size'] === 0) {
        $error = 'Файл не загружен';
    }
    elseif(!$title || !$content){
        $error = 'Some Error';
    } else {

        $filename = upload($user['id']);

        $result = $pdo->prepare("INSERT INTO articles SET img =?,  title=?,content=?,user_id=?, createdAt = NOW()");
        $result->execute([$filename,$title,$content,$user['id']]);
        redirect('/Blog/admin');
    }
    die();
}
