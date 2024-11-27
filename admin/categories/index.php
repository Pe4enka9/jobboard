<?php
global $pdo;
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';

$categories = $pdo->query("SELECT
    categories.*,
    SUM(jobs.available_position) AS total_positions
FROM categories
LEFT JOIN jobs ON categories.id = jobs.category_id
GROUP BY categories.id, categories.name")->fetchAll();

$title = 'Categories';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header_bootstrap.php';
?>

<div class="container mt-3">
    <a href="/admin/" class="btn btn-outline-primary"><i class="bi bi-person me-2"></i>Admin</a>

    <h1 class="text-primary my-3">Categories</h1>

    <a href="/admin/categories/create.php" class="btn btn-primary">Add category</a>

    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Popular</th>
            <th scope="col">Available Position</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <th scope="row"><?= $category['id'] ?></th>
                <td><?= $category['name'] ?></td>
                <td><?= $category['is_popular'] ? 'Yes' : 'No' ?></td>
                <td><?= $category['total_positions'] ?? '0' ?></td>
                <td><a href="/admin/categories/edit.php?id=<?= $category['id'] ?>" class="btn btn-primary">Edit</a></td>
                <td><a href="/admin/categories/actions/delete.php?id=<?= $category['id'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer_bootstrap.php';
?>