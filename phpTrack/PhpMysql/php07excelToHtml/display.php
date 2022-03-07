<?php

require "connection.php";

$conn = newConnection();

function getFile($conn)// GET THE FILE NAME FROM DB
{
    $query = "SELECT * FROM `files`";
   
    $result = $conn->query($query);

    $result = $result->fetch_all(MYSQLI_ASSOC);

    return $result;
}
