<?php

session_start();

$errorMessage = !isset($_SESSION['error']) ? $errorMessage = '' : $errorMessage = $_SESSION['error'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="an_application_that_asks_a_user_to_enter_contact_number">
    <link rel="stylesheet" href="style.css">
    <title>Raffle Entry</title>
</head>
<body>
    <div class="container">
        <h1>Raffle Entry</h1>
        <p><?=$errorMessage?></p>
        <form action="process.php" method="POST">
            <label for="phone"></label>
            <input id="phone" type="text" name="phone_number" placeholder="0910xxxxxxx">
            <input class="submit" type="submit" value="Submit">
        </form>
    </div>   
</body>
</html>