<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("UPDATE categories SET name = ?, is_popular = ?, available_position = ? WHERE id = ?");
$stmt->execute([
    $_POST['name'],
    isset($_POST['is_popular']) ? 1 : 0,
    $_POST['available_position'],
    $_POST['id']
]);

header('Location: /admin/categories/');