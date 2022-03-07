<?php

session_start();

require "connection.php";

$conn = newConnection();

if(isset($_POST['register']))//REGISTRATION PROCESS
{
    if(empty($_POST['first_name']) && empty($_POST['last_name']) && empty($_POST['phone']) && empty($_POST['email']) && empty($_POST['password']))
    {
        $_SESSION['err_msg'] = 'All fields must be filled';
    }
    elseif(!validString($_POST['first_name']) && !validString($_POST['last_name']))
    {
        $_SESSION['err_msg'] = 'Name fileds must contain only a string';
    }
    elseif(!checkLength($_POST['first_name'], 2) && !checkLength($_POST['last_name'], 2))
    {
        $_SESSION['err_msg'] = 'Names is less than 2 characters long';
    }
    elseif(!checkLength($_POST['password'], 3))
    {
        $_SESSION['err_msg'] = 'Password is less than 8 characters long';
    }
    elseif($_POST['password'] != $_POST['confirm_password'])
    {
        $_SESSION['err_msg'] = 'Password is incorrect';
    }
    elseif(!validateEmail($_POST['email']))
    {
        $_SESSION['err_msg'] = 'Email is invalid';
    }
    else
    {
        $fisrtName = $_POST['first_name'];
        
        $lastName = $_POST['last_name'];

        $email = $_POST['email'];
        
        // $salt = bin2hex(openssl_random_pseudo_bytes(22));
        
        $password = md5($_POST['password']);

        $query = "INSERT INTO users (`first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES 
                    ('$fisrtName', '$lastName', '$email', '$password', now(), now())";
       
        $conn->query($query);
        
        $conn->close();
        
        unset($_SESSION['err_msg']);

        $_SESSION['success'] = 'Added Successfuly';
    }

    header('Location:register.php');
}

if(isset($_POST['login']))// LOGIN PROCESS
{
    if(empty($_POST['email']) && empty($_POST['password']))
    {
        $_SESSION['log_in_err'] = 'Fields are empty';
    }
    elseif(!loginUser($_POST, $conn))
    {
        $_SESSION['log_in_err'] = 'Incorrect user or password';

        header('Location:register.php');
    }
    else
    {
        unset($_SESSION['log_in_err']);

        header('Location:index.php');
    }
}

if(isset($_GET['action']) == 'log_out')// LOG OUT DESTROY SESSION
{
    unset($_SESSION['user_id']);

    header('Location: index.php');
}


function loginUser($userInput, $conn)//VALIDATE USER
{
    $email = filter_var($userInput['email'], FILTER_SANITIZE_EMAIL);

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    $pass = md5($userInput['password']);

    $query = "SELECT `id`, `first_name`, `email`, `password` FROM `users` WHERE users.email = '$email' AND users.password = '$pass'";
   
    $result = $conn->query($query);

    $result = $result->fetch_assoc();

    if(empty($result))
    {
        return false;
    }
    else
    {
        $_SESSION['user_id'] = $result['id'];

        return true;
    }
}

function validString($data)//CHECK IF INPUT IS A VALID STRING
{
    for($i = 0; $i < strlen($data); $i++)
    {
        if(ctype_digit($data[$i]))
        {
            return false;
        }

        return true;

        exit;
    }
}

function checkLength($data, $len)//CHECK INPUT LENGTH
{
    if(strlen($data) < $len)
    {
        return false;
    }

    return true;
}

function validateEmail($data)//VALIDATE EMAIL
{
    $data = filter_var($data, FILTER_SANITIZE_EMAIL);

    $data = filter_var($data, FILTER_VALIDATE_EMAIL);

    if(!$data)
    {
        return false;

        exit;
    }
    
    return true;
}

if(isset($_POST['message']))// INSERT MESSAGE QUERY
{
    if(!empty($_POST['content']) && isset($_SESSION['user_id']))
    {
        $message = $conn->real_escape_string($_POST['content']);
    
        $userId = $_SESSION['user_id'];
    
        $query = "INSERT INTO `messages` (`user_id`, `content`, `created_at`, `updated_at`) 
                    VALUES ('$userId', '$message', now(), now())";

        $conn->query($query);
    
        $conn->close();
    }

    header('Location: index.php');
}

function getMessages($conn)// GET THE MESSAGES FROM DATA BASE
{
    $query = "SELECT CONCAT(users.first_name ,users.last_name) AS name, 
                CONCAT('( ', messages.created_at, ' )') AS date, content, messages.id AS message_id
                FROM users 
                INNER JOIN messages 
                ON messages.user_id = users.id  
                ORDER BY date DESC";
   
    $result = $conn->query($query);

    $result = $result->fetch_all(MYSQLI_ASSOC);

    return $result;
}

if(isset($_POST['comment']))// INSERT COMMENT QUERY
{
    if(!empty($_POST['content']) && isset($_SESSION['user_id']))
    {
        $comment = $conn->real_escape_string($_POST['content']);

        $messageId = $_POST['message_id'];
    
        $userId = $_SESSION['user_id'];
    
        $query = "INSERT INTO `comments` (`message_id`, `user_id`, `content`, `created_at`, `updated_at`) 
                    VALUES ('$messageId', '$userId', '$comment', now(), now())";

        $conn->query($query);
    
        $conn->close();
    }

    header('Location: index.php');
}

function getComments($conn, $messageId)// GET THE COMMENTS FROM DATA BASE
{
    $messageId = empty($messageId) ? 0 : $messageId;

    $query = "SELECT CONCAT(users.first_name ,users.last_name) AS name, CONCAT('( ', comments.created_at, ' )') AS date, 
                comments.content AS comment
                FROM users 
                LEFT JOIN comments 
                ON comments.user_id = users.id
                LEFT JOIN messages 
                ON messages.id = comments.message_id
                WHERE messages.id = $messageId
                ORDER BY date DESC";
   
    $result = $conn->query($query);

    $result = $result->fetch_all(MYSQLI_ASSOC);

    return $result;
}