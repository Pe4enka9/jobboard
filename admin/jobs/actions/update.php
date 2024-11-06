<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("UPDATE jobs SET name = :name, description = :description,
                  category_id = :category_id, min_salary = :min_salary, max_salary = :max_salary, gender_id = :gender_id,
                  qualification_id = :qualification_id, experience_id = :experience_id, job_type_id = :job_type_id,
                  location_id = :location_id WHERE id = :id");
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
    'id' => $_POST['id']
]);

header('Location: /admin/jobs/');