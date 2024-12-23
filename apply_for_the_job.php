<?php
session_start();

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$path = '/responses/' . $_FILES['image']['name'];
$types = [
    'image/jpeg',
    'image/png',
    'image/gif',
    'image/svg+xml',
    'image/tiff',
    'image/webp',
];

if (in_array($_FILES['image']['type'], $types)) {
    move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $path);
} else {
    $_SESSION['error'] = 'Resume is required!';
    header('Location: /job_details.php?slug=' . $_POST['slug']);
    exit();
}

$stmt = $pdo->prepare("SELECT available_position FROM jobs WHERE id = :id");
$stmt->execute([
    'id' => $_POST['id']
]);
$available_position = $stmt->fetch();

if ($available_position['available_position'] == 0) {
    $_SESSION['error_vacancies'] = 'No vacancies available!';
    header('Location: /job_details.php?slug=' . $_POST['slug']);
    exit();
}

$stmt = $pdo->prepare("INSERT INTO responses(name, email, url, CV, cover_letter, job_id)
VALUES(:name, :email, :url, :CV, :cover_letter, :job_id)");
$stmt->execute([
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'url' => $_POST['url'],
    'CV' => $path,
    'cover_letter' => $_POST['cover_letter'],
    'job_id' => $_POST['id']
]);

header('Location: /job_details.php?slug=' . $_POST['slug']);