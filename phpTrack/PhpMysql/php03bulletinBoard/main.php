<?php

session_start();

require "connection.php";

$conn = newConnection();

$query = "SELECT * FROM announcements ORDER BY id DESC ";

$result = $conn->query($query);

$result = $result->fetch_all(MYSQLI_ASSOC);

$result = !isset($result) ? $result = [] : $result = $result;

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
    <div class="main">
        <a href="index.php">Create Announcements</a>
        <h2>Bulletin Board View</h2>
<?php
    foreach($result as $data)
    {
?>
        <div class="wrapper">
            <h4><?= date_format(date_create($data['created_at']),'F D, y'). ' - '. $data['subject'] ?></h4>
            <p><?= $data['detail'] ?></p>
        </div>
<?php
    }
?>
    </div>
</body>
</html>