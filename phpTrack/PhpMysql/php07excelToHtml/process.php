<?php

session_start();

require "connection.php";

$conn = newConnection();

if(isset($_FILES['file']))
{
    if(empty($_FILES['file']['name']))
    {
        $_SESSION['file_err'] = 'Upload file is empty';
    }
    elseif(!fileUpload($_FILES, $conn))
    {
        $_SESSION['file_err'] = 'Upload file is invalid';
    }
    else //UPLOAD FILE TO DB
    {
        $fileName = basename($_FILES["file"]["name"]);
    
        $query = "INSERT INTO files (`content`, `created_at`, `updated_at`) VALUES ('$fileName', now(), now())";
    
        $conn->query($query);
            
        $conn->close();
    
        $_SESSION['file_err'] = 'Upload successful';
    }
    header('Location:index.php');
}

function fileUpload($value, $conn)//VALIDATE FILE AND INSERT THE FILE NAME TO DB
{
    $value = $value['file'];

    $targetDir = 'uploads/';
   
    $targetFile = $targetDir . basename($value['name']);
   
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
   
    $fileSize = $value['size'];
   
    $fileError = $value['error'];
   
    $fileTypeAllowed = ['csv'];

    $fileName = basename($_FILES["file"]["name"]);

    $targetFilePath = $targetDir . $fileName;
    
    $query = "SELECT * FROM `files` WHERE files.content = '$fileName'";// CHECK FOR DUPLICATE FILE
   
    $result = $conn->query($query);

    $result = $result->fetch_all(MYSQLI_ASSOC);

    if( $value['size'] <= 0)
    {
        return false;
    }
    elseif($fileError == 1 || $fileSize > 500000 || !in_array($fileType, $fileTypeAllowed))
    {
        return false;
    }
    elseif(count($result) > 0)
    {
        return false;
    }
    
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    
    return true;

    exit;
}

function getFilePagination($fileName, $conn)
{
    $query = "SELECT * FROM files WHERE files.content = '$fileName'";  
    
    $result = $conn->query($query);

    $result = $result->fetch_assoc();

    return $result;
}

if(isset($_GET['set_file']))
{
    $_SESSION['csv_name'] = $_GET['set_file'];

    header('Location: record.php');
}