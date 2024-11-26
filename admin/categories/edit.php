<?php
global $pdo;
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';

$category = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
$category->execute([$_GET['id'] ?? '']);
$category = $category->fetch();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit category</title>
</head>

<style>
    input {
        display: block;
        margin-bottom: 15px;
    }

    div {
        display: flex;
        gap: 5px;
    }
</style>

<body>

<h1>Edit category</h1>

<form action="/admin/categories/actions/update.php" method="post">
    <input type="hidden" name="id" value="<?= $category['id'] ?>">
    <input type="text" name="name" placeholder="Name" value="<?= $category['name'] ?>">

    <div>
        <input type="checkbox" name="is_popular" id="is_popular" <?= $category['is_popular'] ? 'checked' : '' ?>>
        <label for="is_popular">Popular</label>
    </div>

    <input type="submit" value="Edit">
</form>

</body>
</html>