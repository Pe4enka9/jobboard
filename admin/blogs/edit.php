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

$title = 'Edit blog';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header_bootstrap.php';
?>

<div class="container mt-3 mb-3">
    <a href="/admin/blogs/" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-1"></i>Back</a>
    <h1 class="text-primary my-3">Edit blog</h1>

    <div class="row">
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

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer_bootstrap.php';
?>