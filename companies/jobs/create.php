<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
$qualifications = $pdo->query("SELECT * FROM qualification")->fetchAll();
$experiences = $pdo->query("SELECT * FROM experience")->fetchAll();
$jobTypes = $pdo->query("SELECT * FROM job_type")->fetchAll();
$locations = $pdo->query("SELECT * FROM location")->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add job</title>
</head>

<style>
    input, select, label, textarea {
        display: block;
        margin-bottom: 15px;
    }
</style>

<body>

<h1>Add job</h1>

<form action="/companies/jobs/actions/store.php" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Name" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="text" name="slug" placeholder="Slug">

    <select name="category">
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <input type="text" name="min_salary" placeholder="Minimum salary">
    <input type="text" name="max_salary" placeholder="Maximum salary">

    <select name="qualification">
        <?php foreach ($qualifications as $qualification): ?>
            <option value="<?= $qualification['id'] ?>"><?= $qualification['level'] ?> level</option>
        <?php endforeach; ?>
    </select>

    <select name="experience">
        <?php foreach ($experiences as $experience): ?>
            <option value="<?= $experience['id'] ?>"><?= $experience['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <select name="job_type">
        <?php foreach ($jobTypes as $jobType): ?>
            <option value="<?= $jobType['id'] ?>"><?= $jobType['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <select name="location">
        <?php foreach ($locations as $location): ?>
            <option value="<?= $location['id'] ?>"><?= $location['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <input type="file" name="image">

    <input type="submit" value="Add">
</form>

</body>
</html>