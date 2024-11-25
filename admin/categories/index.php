<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>

<style>
    table, th, td {
        padding: 5px;
        border: 1px solid #000;
        border-collapse: collapse;
    }
</style>

<body>

<h1>Categories</h1>

<a href="/admin/categories/create.php">Add category</a>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Popular</th>
        <th>Available Position</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $category['id'] ?></td>
            <td><?= $category['name'] ?></td>
            <td><?= $category['is_popular'] ? 'Yes' : 'No' ?></td>
            <td><?= $category['available_position'] ?></td>
            <td><a href="/admin/categories/edit.php?id=<?= $category['id'] ?>">Edit</a></td>
            <td><a href="/admin/categories/actions/delete.php?id=<?= $category['id'] ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>