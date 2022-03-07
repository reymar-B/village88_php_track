<?php

require "process.php";

$messages = getMessages($conn);

$action = !isset($_SESSION['user_id']) ? 'register.php': 'process.php?action=log_out';

$userAction = !isset($_SESSION['user_id']) ? 'Log in' : 'Log out';

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
        <a href="<?= $action ?>"><?= $userAction ?></a>
        <H1>The Wall Demo</H1>
        <h2>Post a message</h2>
        <form class="message_form" action="process.php" method="POST">
            <input type="hidden" name="message">
            <textarea name="content"></textarea>
            <input type="submit" value="creata a message">
        </form>
<?php
    foreach($messages as $message)
    {
        $comments = !isset($_SESSION['user_id']) ? [] : getComments($conn, $message['message_id']);
?>
        <h4><?= $message['name'].' '. $message['date'] ?></h4>
        <p><?= $message['content'] ?></p>
<?php
        foreach($comments as $comment)
        {
?>
        <h5 class="comment"><?= $comment['name'].' '. $comment['date'] ?></h5>
        <p class="comment"><?= $comment['comment'] ?></p>
        
<?php
        }
?>
        <div class="comment_wrapper">
            <h5>Post a comment</h5>
            <form class="comment_form" action="process.php" method="POST">
                <input type="hidden" name="comment">
                <input type="hidden" name="message_id" value="<?= $message['message_id'] ?>">
                <textarea name="content"></textarea>
                <input type="submit" value="comments">
            </form>
        </div>
<?php
    }
?>
    </div>
</body>
</html>