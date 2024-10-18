<?php
/**
 * @var $pdo
 */

$user = checkUser($pdo);


$error = '';
if(count($_POST) > 0) {
    $title = strip_tags($_POST['title'] ?? NULL);

    $content = strip_tags($_POST['content']?? NULL);
    $filename = '';


    if (!$_FILES['file']['size']) {
        $error = 'Image not found';
    } elseif (!$title || !$content) {
        $error = 'Content is not found';
    } else {
        $filename = upload($user['id']);

        $stmt = $pdo->prepare("INSERT INTO articles SET img = ?, userId = ?, title = ?, content = ?, createdAt = NOW()");
        $stmt->execute([$filename, $user['id'], $title, $content]);
        redirect('/Blog/?act=getUserArticles');
    }

}
require_once 'templates/addArticle.php';
die();