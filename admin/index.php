<?php
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';

$title = 'Admin';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header_bootstrap.php';
?>

<div class="container mt-3">
    <a href="/" class="btn btn-outline-primary"><i class="bi bi-house me-2"></i>Home</a>
    <h1 class="text-primary my-3">Admin</h1>
    <a href="/admin/categories/" class="btn btn-outline-primary">Categories</a>
    <a href="/admin/blogs/" class="btn btn-outline-primary">Blogs</a>
    <a href="/admin/companies/" class="btn btn-outline-primary">Companies</a>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer_bootstrap.php';
?>