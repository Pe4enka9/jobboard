<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("UPDATE responses SET response_status_id = 3 WHERE id = ?");
$stmt->execute([$_POST['id']]);

header('Location: /companies/jobs/responses/?id=' . $_POST['job_id']);