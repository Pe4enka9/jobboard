<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$path = $_SERVER['DOCUMENT_ROOT'] . '/img/';
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
    $image = '/img/' . $_FILES['image']['name'];
} else {
    $image = null;
}

$stmt = $pdo->prepare("INSERT INTO jobs(name, description, category_id, min_salary, max_salary, gender_id,
                 qualification_id, experience_id, job_type_id, location_id, image, date)
VALUES (:name, :description, :category_id, :min_salary, :max_salary, :gender_id,
        :qualification_id, :experience_id, :job_type_id, :location_id, :image, :date)");
$stmt->execute([
    'name' => $_POST['name'],
    'description' => $_POST['description'],
    'category_id' => $_POST['category'],
    'min_salary' => $_POST['min_salary'],
    'max_salary' => $_POST['max_salary'],
    'gender_id' => $_POST['gender'],
    'qualification_id' => $_POST['qualification'],
    'experience_id' => $_POST['experience'],
    'job_type_id' => $_POST['job_type'],
    'location_id' => $_POST['location'],
    'image' => $image,
    'date' => date('Y-m-d')
]);

header('Location: /admin/jobs/');