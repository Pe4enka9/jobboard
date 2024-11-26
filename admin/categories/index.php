<?php
global $pdo;
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
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
    <title>Categories</title>
</head>

<body>

<div class="container mt-3">
    <h1 class="text-primary">Categories</h1>

    <a href="/admin/categories/create.php" class="btn btn-primary mt-3">Add category</a>

    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Popular</th>
            <th scope="col">Available Position</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <th scope="row"><?= $category['id'] ?></th>
                <td><?= $category['name'] ?></td>
                <td><?= $category['is_popular'] ? 'Yes' : 'No' ?></td>
                <td><?= $category['available_position'] ?></td>
                <td><a href="/admin/categories/edit.php?id=<?= $category['id'] ?>" class="btn btn-primary">Edit</a></td>
                <td><a href="/admin/categories/actions/delete.php?id=<?= $category['id'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>