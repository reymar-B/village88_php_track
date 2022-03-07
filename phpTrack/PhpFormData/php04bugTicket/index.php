<?php

session_start();

$error = !isset($_SESSION['msg']) ? $error = [] : $error = $_SESSION['msg'];

$printError = !isset($error['error']) ? $printError = '' : $printError = $error['error'];

$response = !isset($error['success']) ? $response = '' : $response = $error['success'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="To_apply_proper_form_validation">
    <link rel="stylesheet" href="style.css">
    <title>Bug Ticket</title>
</head>
<body>
    <div class="container">
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <p class="<?=$response?>"><?= $printError ?></p>
            <div>
                <label>Date:
                    <input type="date" name="date">
                </label>
                <label>First Name:
                    <input type="text" name="first_name">
                </label>
                <label>Last Name
                    <input type="text" name="last_name">
                </label>
                <label>Email
                    <input type="text" name="email">
                </label>
            </div>    
            <div>
                <label>Issue
                    <input type="text" name="issue">
                </label>
                <label>Description
                    <textarea name="description"></textarea>
                </label>
                <label>screenshot (optional)
                    <input type="file" name="files">
                </label>
                <label>
                    <input type="submit" value="Submit">
                </label>
            </div>
        </form>
    </div>
</body>
</html>