<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Articles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="bg-gray-200 shadow shadow-gray-300 w-100 px-8 md:px-auto">
    <div class="md:h-16 h-28 mx-auto md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">
        <!-- Logo -->
        <div class="text-indigo-500 md:order-1">
            <!-- Heroicon - Chip Outline -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
            </svg>
        </div>
        <?php include_once 'templates/header.php' ?>

    </div>
</nav>
<div class="mt-20">
    <div class="mt-20">
        <h2 class="mt-20 text-3xl font-bold text-center sm:text-5xl">ARTICLES</h2>
    </div>
</div>
<div class="mt-20 shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10">
    <table class="w-full table-fixed mt-10">
        <thead>
        <tr class="bg-gray-100">
            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">id</th>
            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">img</th>
            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Title</th>
            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Created At</th>
            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Edit</th>
            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Delete</th>
        </tr>
        </thead>
        <tbody class="bg-white" <?php while($row = $resultUserArticles->fetch()):?> >
        <tr>
            <td class="py-4 px-6 border-b border-gray-200"><?=$row['id']?></td>
            <td class="py-4 px-6 border-b border-gray-200"><img src="/Blog/images/<?=$row['img']?>" alt="some picher"/></td>
            <td class="py-4 px-6 border-b border-gray-200"><?=$row['title']?></td>
            <td class="py-4 px-6 border-b border-gray-200 truncate"><?=$row['createdAt']?></td>
            <td class="py-4 px-6 border-b border-gray-200">
                <a href="?act=articleUserEdit&id=<?= $row['id']?>" class="bg-green-500 text-white py-1 px-2 rounded-full text-xs">Edit</a>
            </td>
            <td class="py-4 px-6 border-b border-gray-200">
                <a href="?act=articleUserDestroy&id=<?= $row['id']?>" class="bg-red-500 text-white py-1 px-2 rounded-full text-xs">Delete</a>
            </td>
        </tr>
        <?php endwhile ?>
        <?php if(!$resultUserArticles->rowCount()): ?>
        <tr>
            <td colspan="5" align="center">
                Not found
            </td>
        </tr>
        <?php endif?>
        </tbody>

    </table>
</div>
</body>
</html>