<?php
global $pdo;
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';

$categories = $pdo->query("SELECT * FROM blog_categories")->fetchAll();

$stmt = $pdo->prepare("SELECT
    blogs.*,
    (SELECT GROUP_CONCAT(blog_category_id) FROM blog_category WHERE blog_id = blogs.id) AS category_ids
FROM blogs
WHERE blogs.id = ?");
$stmt->execute([$_GET['id'] ?? '']);
$blog = $stmt->fetch();
$selectedCategories = explode(',', $blog['category_ids'] ?? '');
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
    <title>Edit blog</title>
</head>
<body>

<div class="container mt-3 mb-3">
    <h1 class="text-primary">Edit blog</h1>

    <div class="row mt-5">
        <div class="col-4">
            <form action="/admin/blogs/actions/update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $blog['id'] ?>">

                <div>
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?= $blog['name'] ?>" required>
                </div>

                <div class="mt-3">
                    <label for="short_description" class="form-label">Short description</label>
                    <textarea name="short_description" class="form-control" id="short_description"
                              required><?= $blog['short_description'] ?></textarea>
                </div>

                <div class="mt-3">
                    <label for="categories" class="form-label">Categories</label>
                    <select name="categories[]" class="form-select" id="categories" multiple>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"
                                <?= in_array($category['id'], $selectedCategories) ? 'selected' : '' ?>><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mt-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>

                <img src="<?= $blog['image'] ?>" alt="" class="mt-3" width="500">

                <div class="mt-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="<?= $blog['slug'] ?>">
                </div>

                <div class="mt-3">
                    <label for="editor" class="form-label">Description</label>
                    <textarea name="description" id="editor"><?= $blog['description'] ?></textarea>
                </div>

                <input type="submit" class="btn btn-success mt-3" value="Edit">
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