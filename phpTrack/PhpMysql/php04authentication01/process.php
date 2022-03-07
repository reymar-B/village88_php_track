<?php

session_start();

require "connection.php";

$conn = newConnection();

unset($_SESSION['success']);

unset($_SESSION['errMsg']);

unset($_SESSION['reset_err']);

unset($_SESSION['reset_success']);

if(isset($_POST['users']))
{
    if(empty($_POST['first_name']) && empty($_POST['last_name']) && empty($_POST['phone']) && empty($_POST['password']))
    {
        $_SESSION['errMsg'] = 'All fields must be filled';
    }
    elseif(!validString($_POST['first_name']) && !validString($_POST['last_name']))
    {
        $_SESSION['errMsg'] = 'Name fileds must contain only a string';
    }
    elseif(!checkLength($_POST['first_name'], 2) && !checkLength($_POST['last_name'], 2))
    {
        $_SESSION['errMsg'] = 'Names is less than 2 characters long';
    }
    elseif(!checkLength($_POST['password'], 8))
    {
        $_SESSION['errMsg'] = 'Password is less than 8 characters long';
    }
    elseif($_POST['password'] != $_POST['confirm_password'])
    {
        $_SESSION['errMsg'] = 'Password is incorrect';
    }
    elseif(!checkLength($_POST['phone'], 11) || !validPhone($_POST['phone']))
    {
        $_SESSION['errMsg'] = 'Enter a valid Phone number';
    }
    elseif(!checDuplicate($_POST['phone'], $conn))
    {
        $_SESSION['errMsg'] = 'Phone number already existing';
    }
    else
    {
        $fisrtName = $_POST['first_name'];
        
        $lastName = $_POST['last_name'];

        $phone = $_POST['phone'];
        
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        
        $password = md5($_POST['password']). $salt;

        $query = "INSERT INTO users (`first_name`, `last_name`, `phone`, `password`,`salt`, `created_at`, `updated_at`) VALUES 
                ('$fisrtName', '$lastName', '$phone', '$password', '$salt', now(), now())";
        
        $conn->query($query);
        
        $conn->close();
        
        unset($_SESSION['errMsg']);

        $_SESSION['success'] = 'Added Successfuly';
    }

    header('Location:index.php');
}

function checDuplicate($data, $conn)//CHECK FOR DUPLICATE DATA
{
    $phone = $data;

    $query = "SELECT phone FROM users WHERE users.phone = $phone";
        
    $result = $conn->query($query);

    $result = $result->fetch_all(MYSQLI_ASSOC);

    if(count($result) > 0)
    {
        return false;
    }

    return true;

    exit;
}

function checkLength($data, $len)//CHECK INPUT LENGTH
{
    if(strlen($data) < $len)
    {
        return false;
    }

    return true;
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

function validPhone($data)//CHECK IF ONLY NUMERIC
{
    for($i = 0; $i < strlen($data); $i++)
    {
        if(!ctype_digit($data[$i]))
        {
            return false;
        }

        return true;

        exit;
    }
}

// RESET PASSWORD

if(isset($_POST['reset']))
{
    if(empty($_POST['phone']) && empty($_POST['old_password']) && empty($_POST['new_password']))
    {
        $_SESSION['reset_err'] = 'Fields are empty';
    }
    elseif($_POST['old_password'] == $_POST['new_password'] || strlen($_POST['new_password']) < 8)
    {
        $_SESSION['reset_err'] = 'Password not changed';
    }
    elseif(!checkPhone($_POST, $conn))
    {
        $_SESSION['reset_err'] = 'Phone does not exist';
    }
    elseif(!checkPass(checkPhone($_POST, $conn), $_POST))
    {
        $_SESSION['reset_err'] = 'Password not matched';
    }
    else
    {
        $salt = checkPhone($_POST, $conn);

        $salt = $salt['salt'];

        $newPass = md5($_POST['new_password']). $salt;

        $phone = $_POST['phone'];

        $query = "UPDATE `users` SET `password` = '$newPass', `updated_at` = now() WHERE phone = $phone";
    
        $conn->query($query);

        $conn->close();

        unset($_SESSION['reset_err']);

        $_SESSION['reset_success'] = 'Updated successfully';
    }

    header('Location:reset.php');
}

function checkPhone($data, $conn)
{
    $phone = intval($data['phone']);
    
    $query = "SELECT * FROM `users` WHERE users.phone = $phone";
        
    $result = $conn->query($query);
    
    $result = $result->fetch_assoc();

    if(empty($result))
    {
        return false;

        exit;
    }

    return $result;
}

function checkPass($data, $postData)
{
    if(empty($data))
    {
        return false;

        exit;
    }
    else
    {
        $oldPassFromInput = $postData['old_password'];
    
        $salt = $data['salt'];
    
        $hashPass = $data['password'];
    }

    if($hashPass == md5($oldPassFromInput).$salt)
    {
        return true;

        exit;
    }
}
