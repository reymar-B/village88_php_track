<?php

session_start();

$errMsg = !isset($_SESSION['errMsg']) ? $errMsg = '' : $errMsg = $_SESSION['errMsg'];

$success = !isset($_SESSION['success']) ? $success = '' : $success = $_SESSION['success'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="apply_basic_encryption_to_sensitive_data">
    <link rel="stylesheet" href="style.css">
    <title>Authentication 01</title>
</head>
<body>
    <div class="container">
        <a href="reset.php">Go To Reset Password</a>
        <p class="error"><?= $errMsg ?></p>
        <p class="success"><?= $success ?></p>
        <form action="process.php" method="POST">
            <input type="hidden" name="users">
            <label>First Name:
                <input type="text" name="first_name">
            </label>
            <label>Last Name:
                <input type="text" name="last_name">
            </label>
            <label>Contact Number:
                <input type="text" name="phone">
            </label>
            <label>Password:
                <input type="password" name="password">
            </label>
            <label>Confirm Password:
                <input type="password" name="confirm_password">
            </label>
            <label>Submit:
                <input class="submit" type="submit" value="OK">
            </label>
        </form>
    </div>
</body>
</html>