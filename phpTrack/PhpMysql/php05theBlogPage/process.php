<?php

session_start();

require "connection.php";

$conn = newConnection();

if(isset($_POST['login']))
{
    checkUser($_POST, $conn);
}

function checkUser($userInput, $conn)
{
    $email = filter_var($userInput['email'], FILTER_SANITIZE_EMAIL);

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    $pass = $userInput['password'];

    $query = "SELECT `id`, `first_name`, `email`, `password` FROM `users` WHERE users.email = '$email' AND users.password = '$pass'";
        
    $result = $conn->query($query);

    $result = $result->fetch_assoc();

    if(empty($result))
    {
        $_SESSION['log_in_err'] = 'Incorrect user or password';

        header('Location:login.php');
    }
    else
    {
        unset($_SESSION['log_in_err']);

        $_SESSION['id'] = $result['id'];

        $_SESSION['user_name'] = $result['first_name'];

        $_SESSION['show_form'] = 'show_form';

        header('Location:index.php');
    }
}

if(isset($_GET['logOut']))
{
    unset($_SESSION['user_name']);

    $_SESSION['show_form'] = 'hide_form';
    
    header('Location:index.php');
}

if(isset($_POST['review']))
{
    if(!empty($_POST['content']) && isset($_SESSION['user_name']))
    {
        $content = $conn->real_escape_string($_POST['content']);
    
        $userId = $_SESSION['id'];
    
        $query = "INSERT INTO `reviews` (`user_id`, `content`, `created_at`, `updated_at`) 
                    VALUES ('$userId', '$content', now(), now())";
            
        $conn->query($query);
    
        $conn->close();
    }

    header('Location:index.php');
}

if(isset($_POST['reply']))
{
    if(!empty($_POST['message']) && isset($_SESSION['user_name']))
    {
        $replyContent = $conn->real_escape_string($_POST['message']);
    
        $reviewId = $_POST['review_id'];

        $userId = $_SESSION['id'];
    
        $query = "INSERT INTO `replies` (`content`, `review_id`, `user_id`, `created_at`, `updated_at`) 
                    VALUES ('$replyContent', '$reviewId', '$userId', now(), now())";
    
        $conn->query($query);
    
        $conn->close();
    }

    header('Location:index.php');
}

