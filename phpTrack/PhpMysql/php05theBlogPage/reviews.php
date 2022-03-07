<?php

session_start();

function displayReview($conn)
{
    $userId = !isset($_SESSION['id']) ? 0 : $_SESSION['id'];

    $query = "SELECT CONCAT(users.first_name,' ', users.last_name) AS name, 
                CONCAT( '( ', reviews.created_at, ' )' ) AS date, reviews.content AS review, reviews.id
                FROM users 
                LEFT JOIN reviews 
                ON reviews.user_id = users.id
                WHERE reviews.user_id = $userId 
                ORDER BY date DESC";

    $result = $conn->query($query);

    $result = $result->fetch_all(MYSQLI_ASSOC);

    if(empty($result))
    {
        return [];
    }
    else
    {
        return $result;
    }
}

function displayReply($conn, $reviewId)
{
    $query = "SELECT CONCAT(users.first_name,' ' ,users.last_name) AS name, replies.content AS reply, 
                CONCAT( '( ', replies.created_at, ' )' ) AS date
                FROM reviews 
                LEFT JOIN replies 
                ON reviews.id = replies.review_id 
                LEFT JOIN users 
                ON replies.user_id = users.id
                WHERE reviews.id = $reviewId
                ORDER BY date DESC";

    $result = $conn->query($query);

    $result = $result->fetch_all(MYSQLI_ASSOC);

    if(empty($result))
    {
        return [];
    }
    else
    {
        return $result;
    }
}
