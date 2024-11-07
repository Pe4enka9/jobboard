<?php
session_start();

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("SELECT id, password FROM companies WHERE company = ?");
$stmt->execute([$_POST['company']]);
$company = $stmt->fetch();

if ($company && password_verify($_POST['password'], $company['password'])) {
    $_SESSION['company_id'] = $company['id'];
    header('Location: /');
} else {
    $_SESSION['error'] = 'Incorrect login or password!';
    setcookie('company', $_POST['company'], time() + 3600, '/login.php');
    header('Location: /login.php');
}