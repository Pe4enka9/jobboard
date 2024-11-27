<?php
session_start();

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

try {
    $stmt = $pdo->prepare("SELECT available_position FROM jobs WHERE id = ?");
    $stmt->execute([$_POST['job_id']]);
    $available_position = $stmt->fetchColumn();

    $stmt = $pdo->prepare("UPDATE jobs SET available_position = :available_position WHERE id = :job_id");
    $stmt->execute([
        'available_position' => $available_position - 1,
        'job_id' => $_POST['job_id']
    ]);

    $stmt = $pdo->prepare("UPDATE responses SET response_status_id = 2 WHERE id = ?");
    $stmt->execute([$_POST['id']]);
} catch (PDOException $e) {
    $_SESSION['error'] = 'There are no more available vacancies!';
}

header('Location: /companies/jobs/responses/?id=' . $_POST['job_id']);