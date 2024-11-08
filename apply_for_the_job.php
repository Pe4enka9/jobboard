<?php
session_start();

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$path = $_SERVER['DOCUMENT_ROOT'] . '/responses/';
$types = [
    'image/jpeg',
    'image/png',
    'image/gif',
    'image/svg+xml',
    'image/tiff',
    'image/webp',
];

if (in_array($_FILES['image']['type'], $types)) {
    copy($_FILES['image']['tmp_name'], $path . $_FILES['image']['name']);
    $image = '/responses/' . $_FILES['image']['name'];
} else {
    $_SESSION['error'] = 'Resume is required!';
    header('Location: /job_details.php?slug=' . $_POST['slug']);
    exit();
}

$stmt = $pdo->prepare("INSERT INTO responses(name, email, url, CV, cover_letter, job_slug)
VALUES(:name, :email, :url, :CV, :cover_letter, :job_slug)");
$stmt->execute([
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'url' => $_POST['url'],
    'CV' => $image,
    'cover_letter' => $_POST['cover_letter'],
    'job_slug' => $_POST['slug']
]);

header('Location: /job_details.php?slug=' . $_POST['slug']);