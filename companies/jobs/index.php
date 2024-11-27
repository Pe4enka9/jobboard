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

$title = 'Jobs';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header_bootstrap.php';
?>

    <div class="container mt-3">
        <a href="/" class="btn btn-outline-primary"><i class="bi bi-house me-2"></i>Home</a>

        <h1 class="text-primary my-3">Jobs</h1>

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
            <th scope="col">Available Position</th>
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
                <td><?= $job['available_position'] ?></td>
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

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer_bootstrap.php';
?>