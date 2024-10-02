<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div class="bg-white shadow-md rounded-md p-6">

            <img class="mx-auto h-12 w-auto" src="https://www.svgrepo.com/show/499664/user-happy.svg" alt="" />

            <h2 class="my-3 text-center text-3xl font-bold tracking-tight text-gray-900">
                Add Article
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600 max-w">
                Or
                <a href="?act=profile" class="font-medium text-blue-600 hover:text-blue-500">
                    Back to your Profile
                </a>
            </p>

            <form class="space-y-6" method="POST" role="form" enctype="multipart/form-data" action="">
                <input type="hidden" name="act" value="addArticle" />
                <div>
                    <label for="new-password" class="block text-sm font-medium text-gray-700">Title</label>
                    <div class="mt-1">
                        <input name="title" type="text" required
                               class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Content</label>
                    <div class="mt-1">
                        <textarea name="content" autocomplete="content" required
                                  class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"> </textarea>
                    </div>
                </div>
                <div>
                    <label for="file" class="block text-sm font-medium text-gray-700">File</label>
                    <div class="mt-1">
                        <input name="file" type="file" id ="file"
                               class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                    </div>
                </div>
                <div>

                    <button type="submit"
                            class="flex w-full justify-center rounded-md border border-transparent bg-sky-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">
                        Add Article
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>