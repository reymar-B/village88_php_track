<?php

session_start();

$errMsg = !isset($_SESSION['log_in_err']) ? '' : $_SESSION['log_in_err'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="static_blog_page_with_dynamic_posts">
    <link rel="stylesheet" href="style.css">
    <title>Blog Page</title>
</head>
<body>
    <div class="login_container">
        <p><?= $errMsg ?></p>
        <form action="process.php" method="POST">
            <input type="hidden" name="login">
            <label>Email:
                <input type="email" name="email">
            </label>
            <label>Password:
                <input type="text" name="password">
            </label>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>