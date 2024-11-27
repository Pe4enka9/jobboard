<?php
global $pdo;
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';

$category = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
$category->execute([$_GET['id'] ?? '']);
$category = $category->fetch();

$title = 'Edit category';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header_bootstrap.php';
?>

    <div class="container mt-3">
        <a href="/admin/categories/" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-1"></i>Back</a>

        <h1 class="text-primary my-3">Edit category</h1>

        <div class="row">
            <div class="col-4">
                <form action="/admin/categories/actions/update.php" method="post">
                    <input type="hidden" name="id" value="<?= $category['id'] ?>">

                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Name"
                               value="<?= $category['name'] ?>">
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_popular"
                               id="is_popular" class="form-check-input" <?= $category['is_popular'] ? 'checked' : '' ?>>
                        <label for="is_popular" class="form-check-label">Popular</label>
                    </div>

                    <input type="submit" class="btn btn-success" value="Edit">
                </form>
            </div>
        </div>
    </div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer_bootstrap.php';
?>