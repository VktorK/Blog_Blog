<?php if($user): ?>
<div class="text-gray-500 order-3 w-full md:w-auto md:order-2">
    <ul class="flex font-semibold justify-between">
        <!-- Active Link = text-indigo-500
        Inactive Link = hover:text-indigo-500 -->
        <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="/Blog">Main Page</a></li>
        <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="?act=getUserArticles">User Articles</a></li>
        <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="?act=addArticle">Add Article</a></li>
        <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="?act=profile">Profile</a></li>
        <div class="order-2 md:order-3">
            <button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-gray-50 rounded-xl flex items-center gap-2">
                <!-- Heroicons - Login Solid -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <a href="?act=logout">LogOut</a>
            </button>
        </div>
    </ul>
</div>
<?php endif ?>