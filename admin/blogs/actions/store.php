<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/slug.php';

if (!empty($_FILES['image']['tmp_name'])) {
    $path = '/img/blog/' . $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $path);
} else {
    $path = null;
}

$stmt = $pdo->prepare("INSERT INTO blogs(name, short_description, description, image, slug)
VALUES(:name, :short_description, :description, :image, :slug)");
$stmt->execute([
    "name" => $_POST['name'],
    "short_description" => $_POST['short_description'],
    "description" => $_POST['description'],
    "image" => $path,
    "slug" => empty($_POST['slug']) ? createSlug($_POST['name']) : $_POST['slug']
]);

$blogId = $pdo->lastInsertId();

foreach ($_POST['categories'] as $category) {
    $stmt = $pdo->prepare("INSERT INTO blog_category(blog_id, blog_category_id)
VALUES(:blog_id, :blog_category_id)");
    $stmt->execute([
        "blog_id" => $blogId,
        "blog_category_id" => $category
    ]);
}

header('Location: /admin/blogs/');