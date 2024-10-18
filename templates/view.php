<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Article</title>
</head>
<body>
<?php if(isset($user) && $isAdmin == 1): ?>
<div>
    <a href="/Blog/?act=indexAdmin">Back</a>
</div>
<?php else : ?>
    <div>
        <a href="/Blog">Back</a>
    </div>
<?php endif; ?>
<?php if(isset($user) && ($article['userId'] === $userId) || $isAdmin): ?>
<div>
    <a href="/Blog/?act=articleUserEdit&id=<?= $article['id']?>">Edit</a>
</div>
<?php endif ?>
<div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
    <h3><?= $article['title'] . PHP_EOL ?></h3>
    <p>Количество просмотров : <?= $article['view'] . PHP_EOL ?></p>
    <div><p><?= $article['content'] ?></p></div>
    <div><img src="/Blog/images/<?=$article['img']?>" alt="some picher"/></div>
</div>
<div>
    <form action="" method="post">
        <input type="hidden" name="act" value="view">
        <div class="transform-cpu">
            <lable for="Comment">Comment Text</lable>
            <textarea  class="transform-cpu" name="comment"></textarea>
        </div>
        <button type="submit"> add Comment</button>
    </form>
</div>
<div>
    <?php while($row = $resultComments->fetch()) : ?>
    <p>
        <?= $row['comment'] ?>
        <?= $row['email'] ?>
    </p>
    <?php endwhile;?>
</div>
</body>
</html>