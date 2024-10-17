<?php
/**
 * @var $resultUserArticles
 * @var $next
 * @var $previous
 * @var $pages
 */
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Blog/templates/admin/header.php'; ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h2>Articles</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Created at</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row = $resultUserArticles->fetch()): ?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><img width="150" src="/Blog/images/<?=$row['img']?>" alt="<?=$row['title']?>"/></td>
                        <td><?=$row['title']?></td>
                        <td><?=$row['createdAt']?></td>
                        <td class="py-4 px-6 border-b border-gray-200">
                            <a href="?act=articleAdminEdit&id=<?= $row['id']?>" class="">Edit</a>
                        </td>
                        <td class="py-4 px-6 border-b border-gray-200">
                            <a href="?act=articleUserDestroyAdmin&id=<?= $row['id']?>" class="">Delete</a>
                        </td>
                    </tr>
                <?php endwhile ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="/Blog/admin/?page=<?=$previous?>">Previous</a></li>
                    <?php for ($i = 1; $i <= $pages; $i++): ?>
                        <li class="page-item"><a class="page-link" href="/Blog/admin/?page=<?=$i?>"><?=$i?></a></li>
                    <?php endfor ?>
                    <li class="page-item"><a class="page-link" href="/Blog/admin/?page=<?=$next?>">Next</a></li>
                </ul>
            </nav>
        </div>
    </main>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Blog/templates/admin/footer.php'; ?>