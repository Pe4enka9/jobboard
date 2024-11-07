<?php
session_start();

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

try {
    $stmt = $pdo->prepare("INSERT INTO companies (company, email, password) VALUES(?, ?, ?)");
    $stmt->execute([
        $_POST['company'],
        $_POST['email'],
        password_hash($_POST['password'], PASSWORD_DEFAULT)
    ]);

    $_SESSION['company_id'] = $pdo->lastInsertId();

    header('Location: /');
    exit();
} catch (PDOException $e) {
    $_SESSION['error'] = 'This name is already in use!';
    setcookie('company', $_POST['company'], time() + 3600, "/register.php");
    setcookie('email', $_POST['email'], time() + 3600, "/register.php");
    header('Location: /register.php');
    exit();
}