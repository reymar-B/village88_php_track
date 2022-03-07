<?php

function newConnection()
{
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_DATABASE', 'the_wall_demo');
    
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

    if ($connection->connect_errno) 
    {
        die("Failed to connect to MySQL: (" . $connection->connect_errno . "), " . $connection->connect_error);
    }

    return $connection;
}