<?php

$row = 5;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="bingo_revisited">
    <title>Bingo Revisited</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
    }
    .container
    {
        margin-top: 3rem;
        text-align: center;
    }
    .row
    {
        border: 0;
        font-size: 0;
    }
    .row div,h1
    {
        display: inline-block;
        padding: 20px;
        width: 3rem;
        height: 3rem;
    }
    .row h1
    {
        font-size: 35px;
    }
    .row div
    {
        font-size: 28px;
        font-weight: bold;
    }
    .bg_0
    {
        background-color: rgb(255 230 11);
    }
    .bg_1
    {
        background-color: black;
        color: white;
    }

</style>
<body>
    <div class="container">
        <div class="row">
            <h1 class="bg_1">B</h1>
            <h1 class="bg_0">I</h1>
            <h1 class="bg_1">N</h1>
            <h1 class="bg_0">G</h1>
            <h1 class="bg_1">O</h1>
        </div>
<?php 
    for( $i = 1; $i <= $row; $i++ )
    {
        $cel = 0;
?>
        <div class="row"> 
<?php
        for( $j = 1; $j <= $row; $j++ )
        {
            $count = $i + 1;

            $cel += $count;
?>
            <div class="bg_<?= ( $i + $j ) % 2 ?>"><?= $cel ?></div>
<?php
        }
?>
        </div>
<?php
    }
?>   
    </div>
</body>
</html>