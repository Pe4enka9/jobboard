<?php
require $_SERVER['DOCUMENT_ROOT'] . '/check_user.php';

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
$qualifications = $pdo->query("SELECT * FROM qualifications")->fetchAll();
$experiences = $pdo->query("SELECT * FROM experiences")->fetchAll();
$jobTypes = $pdo->query("SELECT * FROM job_types")->fetchAll();
$locations = $pdo->query("SELECT * FROM locations")->fetchAll();

$title = 'Add job';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header_bootstrap.php';
?>

<div class="container mt-3">
    <a href="/companies/jobs/" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-1"></i>Back</a>

    <h1 class="text-primary my-3">Add job</h1>

    <div class="row">
        <div class="col-4">
            <form action="/companies/jobs/actions/store.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>

                <div class="mb-3">
                    <input type="text" name="slug" class="form-control" placeholder="Slug">
                </div>

                <div class="mb-3">
                    <select name="category" class="form-select">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="text" name="min_salary" class="form-control" placeholder="Minimum salary">
                </div>
                <div class="mb-3">
                    <input type="text" name="max_salary" class="form-control" placeholder="Maximum salary">
                </div>

                <div class="mb-3">
                    <select name="qualification" class="form-select">
                        <?php foreach ($qualifications as $qualification): ?>
                            <option value="<?= $qualification['id'] ?>"><?= $qualification['level'] ?> level</option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <select name="experience" class="form-select">
                        <?php foreach ($experiences as $experience): ?>
                            <option value="<?= $experience['id'] ?>"><?= $experience['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <select name="job_type" class="form-select">
                        <?php foreach ($jobTypes as $jobType): ?>
                            <option value="<?= $jobType['id'] ?>"><?= $jobType['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <select name="location" class="form-select">
                        <?php foreach ($locations as $location): ?>
                            <option value="<?= $location['id'] ?>"><?= $location['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="number" name="available_position" id="available_position" class="form-control"
                           placeholder="Available Position">
                </div>

                <div class="mb-3">
                    <input type="file" class="form-control" name="image">
                </div>

                <textarea name="description" id="editor" placeholder="Description" required></textarea>

                <input type="submit" class="btn btn-success my-3" value="Add">
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer_bootstrap.php';
?>