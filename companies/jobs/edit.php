<?php
require $_SERVER['DOCUMENT_ROOT'] . '/check_user.php';

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
$qualifications = $pdo->query("SELECT * FROM qualifications")->fetchAll();
$experiences = $pdo->query("SELECT * FROM experiences")->fetchAll();
$jobTypes = $pdo->query("SELECT * FROM job_types")->fetchAll();
$locations = $pdo->query("SELECT * FROM locations")->fetchAll();

$job = $pdo->prepare("SELECT * FROM jobs WHERE id = ?");
$job->execute([$_GET['id'] ?? '']);
$job = $job->fetch();

$title = 'Edit job';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header_bootstrap.php';
?>

<div class="container mt-3">
    <a href="/companies/jobs/" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-1"></i>Back</a>

    <h1 class="text-primary my-3">Edit job</h1>

    <div class="row">
        <div class="col-4">
            <form action="/companies/jobs/actions/update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?? '' ?>">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?= $job['name'] ?>">
                </div>

                <div class="mb-3">
                    <input type="text" name="slug" class="form-control" placeholder="Slug" value="<?= $job['slug'] ?>">
                </div>

                <div class="mb-3">
                    <select name="category" class="form-select">
                        <?php foreach ($categories as $category): ?>
                            <?php if ($job['category_id'] == $category['id']): ?>
                                <option value="<?= $category['id'] ?>" selected><?= $category['name'] ?></option>
                            <?php else: ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="text" name="min_salary" class="form-control" placeholder="Minimum salary"
                           value="<?= $job['min_salary'] ?>">
                </div>
                <div class="mb-3">
                    <input type="text" name="max_salary" class="form-control" placeholder="Maximum salary"
                           value="<?= $job['max_salary'] ?>">
                </div>

                <div class="mb-3">
                    <select name="qualification" class="form-select">
                        <?php foreach ($qualifications as $qualification): ?>
                            <?php if ($job['qualification_id'] == $qualification['id']): ?>
                                <option value="<?= $qualification['id'] ?>" selected><?= $qualification['level'] ?>
                                    level
                                </option>
                            <?php else: ?>
                                <option value="<?= $qualification['id'] ?>"><?= $qualification['level'] ?> level
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <select name="experience" class="form-select">
                        <?php foreach ($experiences as $experience): ?>
                            <?php if ($job['experience_id'] == $experience['id']): ?>
                                <option value="<?= $experience['id'] ?>" selected><?= $experience['name'] ?></option>
                            <?php else: ?>
                                <option value="<?= $experience['id'] ?>"><?= $experience['name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <select name="job_type" class="form-select">
                        <?php foreach ($jobTypes as $jobType): ?>
                            <?php if ($job['job_type_id'] == $jobType['id']): ?>
                                <option value="<?= $jobType['id'] ?>" selected><?= $jobType['name'] ?></option>
                            <?php else: ?>
                                <option value="<?= $jobType['id'] ?>"><?= $jobType['name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <select name="location" class="form-select">
                        <?php foreach ($locations as $location): ?>
                            <?php if ($job['location_id'] == $location['id']): ?>
                                <option value="<?= $location['id'] ?>" selected><?= $location['name'] ?></option>
                            <?php else: ?>
                                <option value="<?= $location['id'] ?>"><?= $location['name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="number" name="available_position" id="available_position" class="form-control"
                           placeholder="Available Position" value="<?= $job['available_position'] ?>">
                </div>

                <div class="mb-3">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                    <img src="<?= $job['image'] ?>" height="100px">
                </div>

                <div class="mb-3">
                    <textarea name="description" id="editor" placeholder="Description"><?= $job['description'] ?></textarea>
                </div>

                <input type="submit" class="btn btn-success mb-3" value="Edit">
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