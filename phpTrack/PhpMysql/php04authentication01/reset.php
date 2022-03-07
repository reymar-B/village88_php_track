<?php

session_start();

$errMsg = !isset($_SESSION['reset_err']) ? $errMsg = '' : $errMsg = $_SESSION['reset_err'];

$success = !isset($_SESSION['reset_success']) ? $success = '' : $success = $_SESSION['reset_success'];

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
    <div class="reset_container">
        <h2>Reset Password</h2>
        <p class="error"><?= $errMsg ?></p>
        <p class="success"><?= $success ?></p>
        <a href="index.php">Back</a>
        <form action="process.php" method="POST">
            <input type="hidden" name="reset">
            <label>Contact Number:
                <input type="text" name="phone">
            </label>
            <label>Old Password:
                <input type="password" name="old_password">
            </label>
            <label>New Password:
                <input type="password" name="new_password">
            </label>
            <label>Submit:
                <input class="reset" type="submit" value="OK">
            </label>
        </form>
    </div>
</body>
</html>