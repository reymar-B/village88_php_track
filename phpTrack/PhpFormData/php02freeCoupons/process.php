<?php

session_start();

$counter = 10;

$count = !isset($_SESSION['customer']) ? $_SESSION['customer'] = $counter : $_SESSION['newCustomer'];

if(isset($_POST['name']) && !empty($_POST['name']))
{
    $count -= 1;

    $_SESSION['custName'] = $_POST['name'];

    $_SESSION['random'] = rand(1000000, 9999999);

    $_SESSION['show'] = 'show_display';
}

$_SESSION['newCustomer'] = $count;

if(isset($_GET['reset']) && $count <= 0)
{
    $_SESSION['newCustomer'] = $counter;

    $_SESSION['show'] = 'no_display';
}

if(isset($_GET['claim']) && $count > 0)
{
    $_SESSION['show'] = 'no_display';
}

header('Location: index.php');
