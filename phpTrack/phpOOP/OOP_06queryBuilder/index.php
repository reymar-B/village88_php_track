<?php

require "database.php";

new Database();

$clients = new Client('lead_gen_business');

$values = $clients->where(["last_name" => "Owen"])->get();

$sites = new Site('lead_gen_business');

$sites->select(['client_id', $sites->count]);

$sites->groupBy('client_id');

$sites->having($sites->count, ">", 5);

$displaySite = $sites->get();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>client_id</th>
            <th>COUNT(*)</th>
        </tr>
<?php
    foreach($displaySite as $site)
    {
?>
        <tr>
            <td><?= $site['client_id'] ?></td>
            <td><?= $site['count'] ?></td>
        </tr>
<?php
    }
?>
    </table>
    <table>
        <tr>
            <th>first name</th>
            <th>last name</th>
            <th>email</th>
            <th>joined date</th>
        </tr>
<?php
    foreach($values as $vaalue)
    {
?>
        <tr>
            <td><?= $vaalue['first_name'] ?></td>
            <td><?= $vaalue['last_name'] ?></td>
            <td><?= $vaalue['email'] ?></td>
            <td><?= $vaalue['joined_datetime'] ?></td>
        </tr>
<?php
    }
?>
    </table>
</body>
</html>