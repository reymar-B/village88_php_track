<?php

$data['name'] = $_POST['name'];
$data['course'] = $_POST['course'];
$data['score'] = $_POST['score'];
$data['reason'] = $_POST['reason'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="get_familiar_with_$_POST">
    <link rel="stylesheet" href="style.css">
    <title>Feedback Form</title>
</head>
<body>
    <div class="container">
        <h1>Submitted Entry</h1>
        <div class="section">
            <p>Your Name (optional): </p>
            <p>Course Title: </p>
            <p>Given Score (1-10): </p>
            <p>Reason:</p>
        </div>
        <div class="section">
            <p><?= $data['name'] ?></p>
            <p><?= $data['course'] ?></p>
            <p><?= $data['score'] ?> pts</p>
        </div>
        <p><?= $data['reason'] ?></p>
        <a href="index.php">Return</a>
    </div>
</body>
</html>