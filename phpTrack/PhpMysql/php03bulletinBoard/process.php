<?php

session_start();

require "connection.php";

$conn = newConnection();

if(!validateInput($_POST))
{
    $_SESSION['errMsg'] = 'Input is empty or invalid format';

    header('Location: index.php');
}
else
{
    $data = validateInput($_POST);

    echo $subject = $data['subject'];

    echo $detail = $data['detail'];

    $query = "INSERT INTO announcements (`subject`, `detail`, `created_at`, `updated_at`) VALUES 
                ('$subject', '$detail', now(), now())";
    
    $conn->query($query);

    $conn->close();

    unset($_SESSION['errMsg']);

    header('Location: main.php');
}

function validateInput($data)
{
    $subject = filter_var($data['subject'], FILTER_SANITIZE_STRING);

    $detail = filter_var($data['detail'], FILTER_SANITIZE_STRING);

    if(empty($subject)  && empty($detail))
    {
        return false;
    }

    return ['subject'=>$subject, 'detail'=>$detail];
}


// session_destroy();