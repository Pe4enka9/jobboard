<?php
global $pdo;
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';

$company = $pdo->prepare("SELECT * FROM companies WHERE id = ?");
$company->execute([$_GET['id'] ?? '']);
$company = $company->fetch();

$title = 'Edit company';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header_bootstrap.php';
?>

<div class="container mt-3">
    <a href="/admin/companies/" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-1"></i>Back</a>
    <h1 class="text-primary my-3">Edit company</h1>

    <div class="row">
        <div class="col-3">
            <form action="/admin/companies/actions/update.php" method="post">
                <input type="hidden" name="id" value="<?= $company['id'] ?>">

                <div class="form-check">
                    <input type="checkbox" name="is_top"
                           id="is_top" class="form-check-input" <?= $company['is_top'] ? 'checked' : '' ?>>
                    <label for="is_top" class="form-check-label">Top</label>
                </div>

                <input type="submit" class="btn btn-success mt-3" value="Edit">
            </form>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer_bootstrap.php';
?>