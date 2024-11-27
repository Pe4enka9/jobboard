<?php
global $pdo;
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';

$companies = $pdo->query("SELECT
    companies.*,
    SUM(jobs.available_position) AS total_positions
FROM companies
LEFT JOIN jobs ON companies.id = jobs.company_id
GROUP BY companies.id, companies.company")->fetchAll();

$title = 'Companies';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header_bootstrap.php';
?>

<div class="container mt-3">
    <a href="/admin/" class="btn btn-outline-primary"><i class="bi bi-person me-2"></i>Admin</a>

    <h1 class="text-primary mt-3">Companies</h1>

    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Company</th>
            <th scope="col">Top</th>
            <th scope="col">Available Position</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($companies as $company): ?>
            <tr>
                <th scope="row"><?= $company['id'] ?></th>
                <td><?= $company['company'] ?></td>
                <td><?= $company['is_top'] ? 'Yes' : 'No' ?></td>
                <td><?= $company['total_positions'] ?? '0' ?></td>
                <td><a href="/admin/companies/edit.php?id=<?= $company['id'] ?>" class="btn btn-primary">Edit</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer_bootstrap.php';
?>