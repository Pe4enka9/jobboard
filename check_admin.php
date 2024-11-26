<?php
session_start();

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("SELECT is_admin FROM companies WHERE id = ?");
$stmt->execute([$_SESSION['company_id']]);
$isAdmin = $stmt->fetch();

if (!$isAdmin['is_admin']) {
    header('Location: /');
    exit();
}