<?php
/**
 * @var $mysqli
 */

$user = checkUser($mysqli);

if(count($_POST))
{
    $img = $_FILES['file']['tmp_name'];
    $size_img = getimagesize($img);
    $width = $size_img[0];
    $height = $size_img[1];
    $mime = $size_img['mime'];

    switch ($size_img['mime'])
    {
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
    $dest = imagecreatetruecolor($wNew,$hNew);

    imagecopyresampled($dest,$src,0,0,0,0,$wNew,$hNew,$width,$height);


    $filename = "photo-" . $user['id'] ."-" . time() . "." . $ext;
    $fullFileName = $_SERVER['DOCUMENT_ROOT'] . "/Blog/images/" . $filename;

    switch($mime)
    {
        case 'image/jpeg':
            imagejpeg($dest,$fullFileName,100);
            break;
        case 'image/gif':
            imagegif($dest,$fullFileName);
            break;
        case 'image/png':
            imagepng($dest,$fullFileName);
            break;
    }

    $title = $_POST['title'];
    $content = $_POST['content'];
    $mysqli->query("INSERT INTO articles SET img ='". $filename."',  title='".$title."',content='".$content."',user_id='" .$user['id']."', createdAt = NOW()");
    header('Location: ?act=getUserArticles');
}
require_once 'templates/addArticle.php';
die();