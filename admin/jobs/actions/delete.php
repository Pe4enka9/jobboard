<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("DELETE FROM jobs WHERE id = ?");
$stmt->execute([$_GET['id'] ?? '']);

header('Location: /admin/jobs/');