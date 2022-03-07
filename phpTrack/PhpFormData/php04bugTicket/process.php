<?php

session_start();

$error = '';

if(!checkEmpty($_POST))
{
    $error = 'Fields must not be empty!';

    $result = 'is_error';
}
elseif(!validateName($_POST))
{
    $error = 'Names must not have a number!';

    $result = 'is_error';
}
elseif(!validateEmail($_POST))
{
    $error = 'Invalid Email';

    $result = 'is_error';
}
elseif(!checkLength($_POST['issue'], 50))
{
    $error = 'Must not be morethan 50 characters long!';

    $result = 'is_error';
}
elseif(!checkLength($_POST['description'], 250))
{
    $error = 'Must not be morethan 250 characters long!';

    $result = 'is_error';
}
elseif(!validateDate($_POST))
{
    $error = 'Please check date';

    $result = 'is_error';
}
elseif(!fileUpload($_FILES))
{
    $error = 'Files are invalid!';

    $result = 'is_error';
}
else
{
    $result = 'is_success';

    $error = 'Thank you for your patience! Please wait a response from our IT team.';
}

$_SESSION['msg'] = ['error' => $error, 'success' => $result];

function checkEmpty($value)
{
    
    if(!empty($value['date']) && !empty($value['first_name']) && !empty($value['last_name']) &&
        !empty($value['email'])  && !empty($value['issue']) && !empty($value['description']))
    {
        return true;
    }

    return false;
    
    exit;
}

function validateEmail($value)
{
    $email = $value['email'];

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if(!$email)
    {
        return false;
    }

    return true;

    exit;
}

function validateName($value)
{
    $firstName = filter_var($value['first_name'], FILTER_SANITIZE_STRING);

    $lastName = filter_var($value['last_name'], FILTER_SANITIZE_STRING);

    $fullName = $firstName.$lastName;

    if(!$firstName && !$lastName || checkNumeric($fullName))
    {
        return false;
    }

    return true;

    exit;
}

function checkNumeric($fullName)
{
    for($i = 0; $i < strlen($fullName); $i++)
    {
        if(is_numeric($fullName[$i]) === true)
        {
            return true;
        }
    }

    return false;

    exit;
}

function checkLength($value, $len)
{
    if(strlen($value) > $len)
    {
        return false;
    }

    return true;

    exit;
}

function validateDate($value)
{
    $value = $value['date'];
    
    $dateNow = date("Y-m-d");

    if($value != $dateNow)
    {
        return false;
    }
    
    return true;

    exit;
}

function fileUpload($value)
{
    $value = $value['files'];

    $targetDir = 'uploads/';
   
    $targetFile = $targetDir . basename($value['name']);
   
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
   
    $fileSize = $value['size'];
   
    $fileTempName = $value['tmp_name'];
   
    $fileError = $value['error'];
   
    $fileTypeAllowed = ['jpg', 'jpeg', 'png', 'csv'];
   
    $newFileName = uniqid('', true).'.'.$fileType;

    if( $value['size'] <= 0)
    {
        return true;
    }
    elseif($fileError == 1 || $fileSize > 500000 || !in_array($fileType, $fileTypeAllowed))
    {
        return false;
    }
    
    return move_uploaded_file($fileTempName, $targetDir.$newFileName);

    exit;
}
// session_destroy();
header('Location: index.php');