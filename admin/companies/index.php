<?php
global $pdo;
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';

$companies = $pdo->query("SELECT
    companies.*,
    SUM(jobs.available_position) AS total_positions
FROM companies
LEFT JOIN jobs ON companies.id = jobs.company_id
GROUP BY companies.id, companies.company")->fetchAll();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Companies</title>
</head>
<body>

<div class="container mt-3">
    <a href="/admin/" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-1"></i>Back</a>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>