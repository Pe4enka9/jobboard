<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/slug.php';

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
    $image = $pdo->prepare("SELECT image FROM jobs WHERE id = ?");
    $image->execute([$_POST['id']]);
    $image = $image->fetch();
    $image = $image['image'];
}

$stmt = $pdo->prepare("UPDATE jobs SET name = :name, description = :description,
                  category_id = :category_id, min_salary = :min_salary, max_salary = :max_salary,
                  qualification_id = :qualification_id, experience_id = :experience_id, job_type_id = :job_type_id,
                  location_id = :location_id, image = :image, slug = :slug WHERE id = :id");
$stmt->execute([
    'name' => $_POST['name'],
    'description' => $_POST['description'],
    'category_id' => $_POST['category'],
    'min_salary' => $_POST['min_salary'],
    'max_salary' => $_POST['max_salary'],
    'qualification_id' => $_POST['qualification'],
    'experience_id' => $_POST['experience'],
    'job_type_id' => $_POST['job_type'],
    'location_id' => $_POST['location'],
    'image' => $image,
    'slug' => empty($_POST['slug']) ? createSlug($_POST['name']) : $_POST['slug'],
    'id' => $_POST['id']
]);

header('Location: /companies/jobs/');