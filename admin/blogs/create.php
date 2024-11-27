<?php
global $pdo;
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';

$categories = $pdo->query("SELECT * FROM blog_categories")->fetchAll();

$title = 'Add blog';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header_bootstrap.php';
?>

<div class="container mt-3">
    <a href="/admin/blogs/" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-1"></i>Back</a>
    <h1 class="text-primary my-3">Add blog</h1>

    <div class="row">
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

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer_bootstrap.php';
?>