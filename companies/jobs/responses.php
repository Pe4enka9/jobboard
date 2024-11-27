<?php
require $_SERVER['DOCUMENT_ROOT'] . '/check_user.php';

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("SELECT * FROM responses WHERE job_id = ?");
$stmt->execute([$_GET['id'] ?? '']);
$responses = $stmt->fetchAll();

$title = 'Responses';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header_bootstrap.php';
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
    <title>Responses</title>
</head>

<body>

<div class="container mt-3">
    <a href="/companies/jobs/" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-1"></i>Back</a>

    <h1 class="text-primary my-3">Responses</h1>

    <?php if ($responses): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Website/Portfolio link</th>
                <th scope="col">CV</th>
                <th scope="col">Cover letter</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($responses as $response): ?>
                <tr>
                    <td><?= $response['name'] ?></td>
                    <td><?= $response['email'] ?></td>
                    <td><?= $response['url'] ?></td>
                    <td><img src="<?= $response['CV'] ?>" alt="" width="200"></td>
                    <td><?= $response['cover_letter'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nothing :(</p>
    <?php endif; ?>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer_bootstrap.php';
?>