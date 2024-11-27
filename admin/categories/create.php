<?php
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';

$title = 'Add category';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header_bootstrap.php';
?>

<div class="container mt-3">
    <a href="/admin/categories/" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-1"></i>Back</a>

    <h1 class="text-primary my-3">Add category</h1>

    <div class="row">
        <div class="col-3">
            <form action="/admin/categories/actions/store.php" method="post">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="is_popular" class="form-check-input" id="is_popular">
                    <label for="is_popular" class="form-check-label">Popular</label>
                </div>

                <input type="submit" class="btn btn-success" value="Add">
            </form>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer_bootstrap.php';
?>