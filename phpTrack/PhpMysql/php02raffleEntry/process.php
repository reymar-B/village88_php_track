<?php

session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DATABASE', 'raffle_entries');

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

if ($connection->connect_errno) 
{
    die("Failed to connect to MySQL: (" . $connection->connect_errno . "), " . $connection->connect_error);
}

function validatePhone($phone)
{
    if(!is_numeric($phone))
    {
        return false;
    }
    elseif(strlen($phone) < 11 || strlen($phone) > 11)
    {
        return false;
    }
    
    return true;

    exit;
}

if(!validatePhone($_POST['phone_number']))
{
    $_SESSION['error'] = "Please fill-up correctly!";

    echo "bad";

    header("Location: index.php");
}
else
{
    $number = $_POST['phone_number'];

    $query = "INSERT INTO contact_list (contact_number, created_at, updated_at) VALUES 
                ( '$number', now(), now())";
    
    $connection->query($query);

    // $_SESSION['error'] = " ";

    // $_SESSION['delete_msg'] = " ";

    session_destroy();

    header("Location: success.php");
}

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $query = "DELETE FROM contact_list WHERE id = $id";

    $connection->query($query);

    $_SESSION['delete_msg'] = "Deleted successfuly!";

    header("Location: success.php");
}

$connection->close();