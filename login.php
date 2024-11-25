<?php
session_start();

if (isset($_SESSION['company_id'])) {
    header('Location: /');
    exit();
}

if (isset($_COOKIE['company'])) {
    $company = $_COOKIE['company'];
    setcookie('company', $company, time() - 3600, '/login.php');
}

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
    <title>Login</title>
</head>

<style>
    input {
        display: block;
        margin-bottom: 15px;
    }
</style>

<body>

<div class="container mt-3">
    <h1 class="text-primary">Login</h1>

    <div class="row mt-5">
        <div class="col-4">
            <form action="/auth/login.php" method="post">
                <input type="text" name="company" class="form-control" placeholder="Company"
                       value="<?= $company ?? '' ?>"
                       required">
                <input type="password" name="password" class="form-control" placeholder="Password" required>

                <?php
                if (isset($_SESSION['error'])) {
                    echo "<p class='text-danger'>" . $_SESSION['error'] . "</p>";
                    unset($_SESSION['error']);
                }
                ?>

                <input type="submit" class="btn btn-success" value="Login">
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>