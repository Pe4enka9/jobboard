<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$responses = $pdo->prepare("SELECT * FROM responses WHERE job_id = ?");
$responses->execute([$_GET['id'] ?? '']);
$responses = $responses->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Responses</title>
</head>

<style>
    table, th, td {
        padding: 5px;
        border: 1px solid #000;
        border-collapse: collapse;
    }
</style>

<body>

<h1>Responses</h1>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Website/Portfolio link</th>
        <th>CV</th>
        <th>Cover letter</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($responses as $response): ?>
        <tr>
            <td><?= $response['name'] ?></td>
            <td><?= $response['email'] ?></td>
            <td><?= $response['url'] ?></td>
            <td><?= $response['CV'] ?></td>
            <td><?= $response['cover_letter'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>