<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$jobs = $pdo->query("SELECT jobs.*, categories.name AS category, qualification.level AS qualification, experience.name AS experience,
job_type.name AS job_type, location.name AS location
FROM jobs
JOIN categories ON jobs.category_id = categories.id
JOIN qualification ON jobs.qualification_id = qualification.id
JOIN experience ON jobs.experience_id = experience.id
JOIN job_type ON jobs.job_type_id = job_type.id
JOIN location ON jobs.location_id = location.id")->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jobs</title>
</head>

<style>
    table, th, td {
        padding: 5px;
        border: 1px solid #000;
        border-collapse: collapse;
    }
</style>

<body>

<h1>Jobs</h1>

<a href="/admin/jobs/create.php">Add job</a>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Minimum salary</th>
        <th>Maximum salary</th>
        <th>Qualification</th>
        <th>Experience</th>
        <th>Job Type</th>
        <th>Location</th>
        <th>Image</th>
        <th>Date</th>
        <th>Slug</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($jobs as $job): ?>
        <tr>
            <td><?= $job['id'] ?></td>
            <td><?= $job['name'] ?></td>
            <td><?= $job['description'] ?></td>
            <td><?= $job['category'] ?></td>
            <td><?= $job['min_salary'] ?></td>
            <td><?= $job['max_salary'] ?></td>
            <td><?= $job['qualification'] ?> level</td>
            <td><?= $job['experience'] ?></td>
            <td><?= $job['job_type'] ?></td>
            <td><?= $job['location'] ?></td>
            <td><?= $job['image'] ?></td>
            <td><?= $job['date'] ?></td>
            <td><?= $job['slug'] ?></td>
            <td><a href="/admin/jobs/edit.php?id=<?= $job['id'] ?>">Edit</a></td>
            <td><a href="/admin/jobs/actions/delete.php?id=<?= $job['id'] ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>