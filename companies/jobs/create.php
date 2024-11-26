<?php
require $_SERVER['DOCUMENT_ROOT'] . '/check_user.php';

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
$qualifications = $pdo->query("SELECT * FROM qualifications")->fetchAll();
$experiences = $pdo->query("SELECT * FROM experiences")->fetchAll();
$jobTypes = $pdo->query("SELECT * FROM job_types")->fetchAll();
$locations = $pdo->query("SELECT * FROM locations")->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add job</title>
</head>

<body>

<div class="container mt-3">
    <h1 class="text-primary">Add job</h1>

    <div class="row mt-5">
        <div class="col-4">
            <form action="/companies/jobs/actions/store.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <input type="text" name="slug" class="form-control" placeholder="Slug">

                <select name="category" class="form-select">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <input type="text" name="min_salary" class="form-control" placeholder="Minimum salary">
                <input type="text" name="max_salary" class="form-control" placeholder="Maximum salary">

                <select name="qualification" class="form-select">
                    <?php foreach ($qualifications as $qualification): ?>
                        <option value="<?= $qualification['id'] ?>"><?= $qualification['level'] ?> level</option>
                    <?php endforeach; ?>
                </select>

                <select name="experience" class="form-select">
                    <?php foreach ($experiences as $experience): ?>
                        <option value="<?= $experience['id'] ?>"><?= $experience['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <select name="job_type" class="form-select">
                    <?php foreach ($jobTypes as $jobType): ?>
                        <option value="<?= $jobType['id'] ?>"><?= $jobType['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <select name="location" class="form-select">
                    <?php foreach ($locations as $location): ?>
                        <option value="<?= $location['id'] ?>"><?= $location['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <input type="file" class="form-control" name="image">

                <textarea name="description" id="editor" placeholder="Description" required></textarea>

                <input type="submit" class="btn btn-success mt-3" value="Add">
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
</body>
</html>