<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div>
    <a href="/Blog">Back</a>
</div>
<div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
    <h3><?= $article['title'] . PHP_EOL ?></h3>
    <div><p><?= $article['content'] ?></p></div>
</div>
</body>
</html>