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

    <div class="container mt-3">
        <a href="/companies/jobs" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-1"></i>Back</a>

        <h1 class="text-primary my-3">Responses</h1>

        <?php
        if (isset($_SESSION['error'])) {
            echo "<p class='fs-5 text text-danger fw-bold'>{$_SESSION['error']}</p>";
            unset($_SESSION['error']);
        }
        ?>

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
                        <?php if ($response['response_status_id'] == 1): ?>
                            <td>
                                <form action="/companies/jobs/responses/actions/accept.php" method="post" class="mb-3">
                                    <input type="hidden" name="id" value="<?= $response['id'] ?>">
                                    <input type="hidden" name="job_id" value="<?= $response['job_id'] ?>">
                                    <input type="submit" value="Accept" class="btn btn-success">
                                </form>
                                <form action="/companies/jobs/responses/actions/decline.php" method="post" class="mb-3">
                                    <input type="hidden" name="id" value="<?= $response['id'] ?>">
                                    <input type="hidden" name="job_id" value="<?= $response['job_id'] ?>">
                                    <input type="submit" value="Decline" class="btn btn-danger">
                                </form>
                            </td>
                        <?php elseif ($response['response_status_id'] == 2): ?>
                            <td class="fs-5 text text-success"><i class="bi bi-check-square-fill me-2"></i>Accept</td>
                        <?php else: ?>
                            <td class="fs-5 text text-danger"><i class="bi bi-ban me-2"></i>Decline</td>
                        <?php endif; ?>
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