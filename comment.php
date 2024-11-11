<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("INSERT INTO comments(name, comment, email, website, blog_id)
VALUES (:name, :comment, :email, :website, :blog_id)");
$stmt->execute([
    'name' => $_POST['name'],
    'comment' => $_POST['comment'],
    'email' => $_POST['email'],
    'website' => $_POST['website'],
    'blog_id' => $_POST['blog_id']
]);

header("Location: /single-blog.php?slug={$_POST['slug']}");