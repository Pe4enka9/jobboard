<?php
global $pdo;
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';

$blogs = $pdo->query("SELECT
blogs.*,
GROUP_CONCAT(blog_categories.name SEPARATOR ', ') AS category_name
FROM blog_category
JOIN blogs ON blog_category.blog_id = blogs.id
JOIN blog_categories ON blog_category.blog_category_id = blog_categories.id
GROUP BY blogs.id")->fetchAll();

$title = 'Blogs';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header_bootstrap.php';
?>

<div class="container mt-3">
    <a href="/admin/" class="btn btn-outline-primary"><i class="bi bi-person me-2"></i>Admin</a>
    <h1 class="text-primary my-3">Blogs</h1>
    <a href="/admin/blogs/create.php" class="btn btn-primary">Add blog</a>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Short description</th>
        <th scope="col">Description</th>
        <th scope="col">Created at</th>
        <th scope="col">Image</th>
        <th scope="col">Slug</th>
        <th scope="col">Categories</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($blogs as $blog): ?>
        <tr>
            <td><?= $blog['name'] ?></td>
            <td><?= $blog['short_description'] ?></td>
            <td><?= $blog['description'] ?></td>
            <td><?= $blog['created_at'] ?></td>
            <td><img src="<?= $blog['image'] ?? '/img/no_image.jpg' ?>" alt="" width="200"></td>
            <td><?= $blog['slug'] ?></td>
            <td><?= $blog['category_name'] ?></td>
            <td><a href="/admin/blogs/edit.php?id=<?= $blog['id'] ?>" class="btn btn-primary">Edit</a></td>
            <td><a href="/admin/blogs/actions/delete.php?id=<?= $blog['id'] ?>" class="btn btn-danger">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer_bootstrap.php';
?>