<?php
/**
 * @var $pdo
 */
require_once 'templates/addArticle.php';
$user = checkUser($pdo);

$error = '';
if(count($_POST)) {
    $title = strip_tags($_POST['title'] ?? NULL);
    $content = strip_tags($_POST['content']?? NULL);
    if ($_FILES['file']['size'] === 0) {
        $error = 'Файл не загружен';
    }
    elseif(!$title || !$content){
        $error = 'Some Error';
    } else {

        $filename = upload($user['id']);

        $result = $pdo->prepare("INSERT INTO articles SET img =?,  title=?,content=?,user_id=?, createdAt = NOW()");
        $result->execute([$filename,$title,$content,$user['id']]);
        redirect('?act=getUserArticles');
    }

    die();
}