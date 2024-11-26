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
    <title>Edit job</title>
</head>

<body>

<div class="container mt-3">
    <h1 class="text-primary">Edit job</h1>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
</body>
</html>