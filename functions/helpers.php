<?php

use JetBrains\PhpStorm\NoReturn;


/**
 * @param $pdo
 * @return array
 */
function checkUser($pdo): array
{
    if(empty($_SESSION['userId']))
    {
        redirect('/Blog/?act=login');
    }

    $userId = (int)$_SESSION['userId'];

    $result = $pdo->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
    $result->execute([$userId]);
    $user = $result->fetch();

    if(!$user)
    {
        redirect('/Blog/?act=login');
    }
    return $user;
}

function isAdminUser($pdo): array
{
    $user = checkUser($pdo);
    if($user['isAdmin'] != 1) {
      redirect('/Blog/?act=login');
    }
    return $user;
}


function getUser($pdo)
{
    $userId = (int)($_SESSION['userId'] ?? NULL);

    if(!$userId)
    {
        return [];
    }

    $result = $pdo->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
    $result->execute([$userId]);
    $user = $result->fetch();

    if(!$user)
    {
        return [];
    }
    return $user;
}

/**
 * @param $pdo
 * @param int $articleId
 * @return mixed
 */
function getArticle($pdo, int $articleId): mixed
{
    $result = $pdo->prepare("SELECT * FROM articles WHERE id =?");
    $result->execute([$articleId]);
    return $result->fetch();
}

function getAdminArticles($pdo): mixed
{
    $result = $pdo->prepare("SELECT * FROM articles ");
    $result->execute();
    return $result->fetch();
}

/**
 * @param $pdo
 * @param int $articleId
 * @param int $userId
 * @return mixed
 */
function getUserArticle($pdo, int $articleId, int $userId): mixed
{
    $resulUserArticle = $pdo->prepare("SELECT * FROM articles WHERE id=? AND user_id=?");
    $resulUserArticle->execute([$articleId,$userId]);
    return $resulUserArticle->fetch();
}

function getAdminArticle($pdo, int $articleId)
{
    $resulUserArticle = $pdo->prepare("SELECT * FROM articles WHERE id=?");
    $resulUserArticle->execute([$articleId]);
    return $resulUserArticle->fetch();
}

/**
 * @param int $userId
 * @return string
 */
function upload(int $userId): string
{
    $img = $_FILES['file']['tmp_name'];
    $size_img = getimagesize($img);
    $width = $size_img[0];
    $height = $size_img[1];
    $mime = $size_img['mime'];

    switch ($size_img['mime']) {
        case 'image/jpeg':
            $src = imagecreatefromjpeg($img);
            $ext = "jpg";
            break;
        case 'image/gif':
            $src = imagecreatefromgif($img);
            $ext = "gif";
            break;
        case 'image/png':
            $src = imagecreatefrompng($img);
            $ext = "png";
            break;
    }

    $wNew = 100;
    $hNew = floor($height / ($width / $wNew));
    $dest = imagecreatetruecolor($wNew, $hNew);

    imagecopyresampled($dest, $src, 0, 0, 0, 0, $wNew, $hNew, $width, $height);


    $filename = "photo-" . $userId . "-" . time() . "." . $ext;
    $fullFileName = $_SERVER['DOCUMENT_ROOT'] . "/Blog/images/" . $filename;

    switch ($mime) {
        case 'image/jpeg':
            imagejpeg($dest, $fullFileName, 100);
            break;
        case 'image/gif':
            imagegif($dest, $fullFileName);
            break;
        case 'image/png':
            imagepng($dest, $fullFileName);
            break;
    }
    return $filename;
}

#[NoReturn] function redirect(string $uri): void
{
    header("Location: " . $uri);
    die();
}