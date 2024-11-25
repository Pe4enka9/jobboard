<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$categories = $pdo->query("SELECT * FROM blog_categories")->fetchAll();
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
    <title>Add blog</title>
</head>
<body>

<div class="container mt-3">
    <h1 class="text-primary">Add blog</h1>

    <div class="row mt-5">
        <div class="col-4">
            <form action="/admin/blogs/actions/store.php" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>

                <div class="mt-3">
                    <textarea name="short_description" class="form-control" placeholder="Short description"
                              required></textarea>
                </div>

                <div class="mt-3">
                    <select name="categories[]" class="form-select" multiple>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mt-3">
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mt-3">
                    <input type="text" name="slug" class="form-control" placeholder="Slug">
                </div>

                <div class="mt-3">
                    <textarea name="description" id="editor"></textarea>
                </div>

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