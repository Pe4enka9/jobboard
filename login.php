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
    <title>Login</title>
</head>

<style>
    input {
        display: block;
        margin-bottom: 15px;
    }
</style>

<body>

<h1>Login</h1>

<form action="/auth/login.php" method="post">
    <input type="text" name="company" placeholder="Company" value="<?= $company ?? '' ?>" required">
    <input type="password" name="password" placeholder="Password" required>

    <?php
    if (isset($_SESSION['error'])) {
        echo "<p style='color: red'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    ?>

    <input type="submit" value="Login">
</form>

</body>
</html>