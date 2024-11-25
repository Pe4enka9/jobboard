<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$blogs = $pdo->query("SELECT
blogs.*,
GROUP_CONCAT(blog_categories.name SEPARATOR ', ') AS category_name
FROM blog_category
JOIN blogs ON blog_category.blog_id = blogs.id
JOIN blog_categories ON blog_category.blog_category_id = blog_categories.id
GROUP BY blogs.id")->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Blogs</title>
</head>
<body>

<div class="container mt-3">
    <h1 class="text-primary">Blogs</h1>
    <a href="/admin/blogs/create.php" class="btn btn-primary mt-3">Add blog</a>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>