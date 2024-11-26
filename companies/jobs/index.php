<?php
require $_SERVER['DOCUMENT_ROOT'] . '/check_user.php';

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$jobs = $pdo->query("SELECT jobs.*, categories.name AS category, qualifications.level AS qualification, experiences.name AS experience,
job_types.name AS job_type, locations.name AS location
FROM jobs
JOIN categories ON jobs.category_id = categories.id
JOIN qualifications ON jobs.qualification_id = qualifications.id
JOIN experiences ON jobs.experience_id = experiences.id
JOIN job_types ON jobs.job_type_id = job_types.id
JOIN locations ON jobs.location_id = locations.id
WHERE company_id = {$_SESSION['company_id']}")->fetchAll();
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
    <title>Jobs</title>
</head>

<body>

<div class="container mt-3">
    <h1 class="text-primary">Jobs</h1>

    <a href="/companies/jobs/create.php" class="btn btn-primary">Add job</a>

</div>

<?php if ($jobs): ?>
    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Minimum salary</th>
            <th scope="col">Maximum salary</th>
            <th scope="col">Qualification</th>
            <th scope="col">Experience</th>
            <th scope="col">Job Type</th>
            <th scope="col">Location</th>
            <th scope="col">Image</th>
            <th scope="col">Date</th>
            <th scope="col">Slug</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($jobs as $job): ?>
            <tr>
                <th scope="row"><?= $job['id'] ?></th>
                <td><?= $job['name'] ?></td>
                <td><?= $job['description'] ?></td>
                <td><?= $job['category'] ?></td>
                <td><?= $job['min_salary'] ?></td>
                <td><?= $job['max_salary'] ?></td>
                <td><?= $job['qualification'] ?> level</td>
                <td><?= $job['experience'] ?></td>
                <td><?= $job['job_type'] ?></td>
                <td><?= $job['location'] ?></td>
                <td><img src="<?= $job['image'] ?? '/img/no_image.jpg' ?>" alt="" width="80"></td>
                <td><?= $job['date'] ?></td>
                <td><?= $job['slug'] ?></td>
                <td><a href="/companies/jobs/responses.php?id=<?= $job['id'] ?>" class="btn btn-info">Responses</a></td>
                <td><a href="/companies/jobs/edit.php?id=<?= $job['id'] ?>" class="btn btn-primary">Edit</a></td>
                <td><a href="/companies/jobs/actions/delete.php?id=<?= $job['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p style="margin-top: 15px;">You don't have any vacancies yet :(</p>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>