<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("INSERT INTO categories (name, is_popular, available_position) VALUES (?, ?, ?)");
$stmt->execute([
    $_POST['name'],
    isset($_POST['is_popular']) ? 1 : 0,
    $_POST['available_position']
]);

header('Location: /admin/categories/');