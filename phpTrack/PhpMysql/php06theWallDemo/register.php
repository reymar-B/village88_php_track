<?php

session_start();

$errMsg = !isset($_SESSION['err_msg']) ? '' : $_SESSION['err_msg'];

$loginMsg = !isset($_SESSION['log_in_err']) ? '' : $_SESSION['log_in_err'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="blog_page_with_comment_section">
    <link rel="stylesheet" href="style.css">
    <title>The Wall Demo</title>
</head>
<body>
    <div class="container">
        <div class="reg_wrapper">
            <p><?= $errMsg ?></p>
            <form action="process.php" method="POST">
                <input type="hidden" name="register">
                <label>First Name:
                    <input type="text" name="first_name">
                </label>
                <label>Last Name:
                    <input type="text" name="last_name">
                </label>
                <label>Email:
                    <input type="email" name="email">
                </label>
                <label>Password:
                    <input type="password" name="password">
                </label>
                <label>Confirm Password:
                    <input type="password" name="confirm_password">
                </label>
                <input class="submit" type="submit" value="Register">
            </form>
        </div>
        <div class="login_wrapper">
            <p><?= $loginMsg ?></p>
            <form action="process.php" method="POST">
                <input type="hidden" name="login">
                <label>Email:
                    <input type="email" name="email">
                </label>
                <label>Password:
                    <input type="password" name="password">
                </label>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>