<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("UPDATE companies SET is_top = ? WHERE id = ?");
$stmt->execute([
    isset($_POST['is_top']) ? 1 : 0,
    $_POST['id']
]);

header('Location: /admin/companies/');