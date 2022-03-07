<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="bingo_board_html">
    <title>Bingo</title>
</head>
<style>
    table tr th,td
    {
        width: 5rem;
        height: 5rem;
        text-align: center;
        border: 1px solid black;
        font-size: 2rem;
    }
    .row_1
    {
        color: blue;
    }
    .row_2
    {
        color: red;
    }
</style>
<body>
    <table>
        <tr class="row_1">
            <th>B</th>
            <th>I</th>
            <th>N</th>
            <th>G</th>
            <th>O</th>
        </tr>
        <tr class="row_2">
<?php for( $i = 2; $i <= 10; $i += 2) 
        { ?> 
            <td><?= $i; ?></td> 
<?php   } ?> 
        </tr>
        <tr class="row_1">
<?php for( $i = 3; $i <= 15; $i += 3) 
        { ?> 
            <td><?= $i; ?></td> 
<?php   } ?> 
        </tr>
        <tr class="row_2">
<?php for( $i = 4; $i <= 20; $i += 4) 
        { ?> 
            <td><?= $i; ?></td> 
<?php   } ?> 
        </tr>
        <tr class="row_1">
<?php for( $i = 5; $i <= 25; $i += 5) 
        { ?> 
            <td><?= $i; ?></td> 
<?php   } ?> 
        </tr>
        <tr class="row_2">
<?php for( $i = 6; $i <= 30; $i += 6) 
        { ?> 
            <td><?= $i; ?></td> 
<?php   } ?> 
        </tr>
    </table>
</body>
</html>


