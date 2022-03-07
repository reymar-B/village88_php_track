<?php

session_start();

$err = !isset($_SESSION['errMsg']) ? $err = '' : $err = $_SESSION['errMsg'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" simple_app_that_allows_users_to_add_announcements_to_a_database_and_display_them_on_a_separate_page">
    <link rel="stylesheet" href="style.css">
    <title>Bulletin Board</title>
</head>
<body>
    <div class="container">
        <p><?= $err ?></p>
        <form action="process.php" method="POST">
            <label> Subject:
                <input type="text" name="subject">
            </label>
            <label> Details:
                <textarea name="detail"></textarea>
            </label>
            <input class="submit" type="submit" value="Add">
            <a href="main.php">Skip</a>
        </form>
    </div>
</body>
</html>