<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/slug.php';

$stmt = $pdo->prepare("SELECT image FROM blogs WHERE id = ?");
$stmt->execute([$_POST['id']]);
$blogImage = $stmt->fetch();

if (!empty($_FILES['image']['tmp_name'])) {
    $path = '/img/blog/' . $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $path);
} else {
    $path = $blogImage['image'];
}

$stmt = $pdo->prepare("UPDATE blogs SET
name = :name,
short_description = :short_description,
description = :description,
image = :image,
slug = :slug
             WHERE id = :id");
$stmt->execute([
    "name" => $_POST['name'],
    "short_description" => $_POST['short_description'],
    "description" => $_POST['description'],
    "image" => $path,
    "slug" => empty($_POST['slug']) ? createSlug($_POST['name']) : $_POST['slug'],
    "id" => $_POST['id']
]);

$stmt = $pdo->prepare("DELETE FROM blog_category WHERE blog_id = :blog_id");
$stmt->execute(["blog_id" => $_POST['id']]);

foreach ($_POST['categories'] as $category) {
    $stmt = $pdo->prepare("INSERT INTO blog_category (blog_id, blog_category_id) VALUES (:blog_id, :blog_category_id)");
    $stmt->execute([
        "blog_id" => $_POST['id'],
        "blog_category_id" => $category
    ]);
}

header('Location: /admin/blogs/');