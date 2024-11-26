<?php
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add category</title>
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

<h1>Add category</h1>

<form action="/admin/categories/actions/store.php" method="post">
    <input type="text" name="name" placeholder="Name">
    <input type="number" name="available_position" placeholder="Available Position">

    <div>
        <input type="checkbox" name="is_popular" id="is_popular">
        <label for="is_popular">Popular</label>
    </div>

    <input type="submit" value="Add">
</form>

</body>
</html>