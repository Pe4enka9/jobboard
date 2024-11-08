<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
$qualifications = $pdo->query("SELECT * FROM qualification")->fetchAll();
$experiences = $pdo->query("SELECT * FROM experience")->fetchAll();
$jobTypes = $pdo->query("SELECT * FROM job_type")->fetchAll();
$locations = $pdo->query("SELECT * FROM location")->fetchAll();

$job = $pdo->prepare("SELECT * FROM jobs WHERE id = ?");
$job->execute([$_GET['id'] ?? '']);
$job = $job->fetch();
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

<h1>Edit job</h1>

<form action="/admin/jobs/actions/update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?? '' ?>">
    <input type="text" name="name" placeholder="Name" value="<?= $job['name'] ?>">
    <textarea name="description" placeholder="Description"><?= $job['description'] ?></textarea>
    <input type="text" name="slug" placeholder="Slug" value="<?= $job['slug'] ?>">

    <select name="category">
        <?php foreach ($categories as $category): ?>
            <?php if ($job['category_id'] == $category['id']): ?>
                <option value="<?= $category['id'] ?>" selected><?= $category['name'] ?></option>
            <?php else: ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>

    <input type="text" name="min_salary" placeholder="Minimum salary" value="<?= $job['min_salary'] ?>">
    <input type="text" name="max_salary" placeholder="Maximum salary" value="<?= $job['max_salary'] ?>">

    <select name="qualification">
        <?php foreach ($qualifications as $qualification): ?>
            <?php if ($job['qualification_id'] == $qualification['id']): ?>
                <option value="<?= $qualification['id'] ?>" selected><?= $qualification['level'] ?> level</option>
            <?php else: ?>
                <option value="<?= $qualification['id'] ?>"><?= $qualification['level'] ?> level</option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>

    <select name="experience">
        <?php foreach ($experiences as $experience): ?>
            <?php if ($job['experience_id'] == $experience['id']): ?>
                <option value="<?= $experience['id'] ?>" selected><?= $experience['name'] ?></option>
            <?php else: ?>
                <option value="<?= $experience['id'] ?>"><?= $experience['name'] ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>

    <select name="job_type">
        <?php foreach ($jobTypes as $jobType): ?>
            <?php if ($job['job_type_id'] == $jobType['id']): ?>
                <option value="<?= $jobType['id'] ?>" selected><?= $jobType['name'] ?></option>
            <?php else: ?>
                <option value="<?= $jobType['id'] ?>"><?= $jobType['name'] ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>

    <select name="location">
        <?php foreach ($locations as $location): ?>
            <?php if ($job['location_id'] == $location['id']): ?>
                <option value="<?= $location['id'] ?>" selected><?= $location['name'] ?></option>
            <?php else: ?>
                <option value="<?= $location['id'] ?>"><?= $location['name'] ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>

    <img src="<?= $job['image'] ?>" height="100px">

    <input type="file" name="image">

    <input type="submit" value="Edit">
</form>

</body>
</html>