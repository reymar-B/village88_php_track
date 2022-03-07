<?php

session_start();

$lowRisk = 25;
$moderateRisk = 100;
$highRisk = 500;
$severeRisk = 1000;
$end = '';
$start = '';

$chances = !isset($_SESSION['chances']) ? $chances = 10 : $chances = $_SESSION['chances'];

$amount = !isset($_SESSION['amount']) ? $amount = 500 : $amount = $_SESSION['amount'];

$message = !isset($_SESSION['message']) ? $message = [] : $message = $_SESSION['message'];


if(!isset($_SESSION['chances']))
{
    $start = 'Welcome Gamer!!!';
}
else
{
    if($_SESSION['chances'] <=0 )
    {
        $end = 'Game Over!!!';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descrition" content="money_button_game">
    <link rel="stylesheet" href="style.css">
    <title>Money Button</title>
</head>
<body>
    <div class="container">
        <span>Your money: <?= $amount ?></span>
        <a href="process.php?reset=reset">Reset Game</a>
        <p>Chances Left: <?= $chances ?></p>
        <form action="process.php" method="POST">
            <h3>Low Risk</h3>
            <input type="hidden" name="low_risk" value="<?= $lowRisk ?>">
            <input type="submit" value="Bet">
            <p>by -25 up to 100</p>
        </form>
        <form action="process.php" method="POST">
            <h3>Moderate Risk</h3>
            <input type="hidden" name="moderate_risk" value="<?= $moderateRisk ?>">
            <input type="submit" value="Bet">
            <p>by -100 up to 1000</p>
        </form>
        <form action="process.php" method="POST">
            <h3>High Risk</h3>
            <input type="hidden" name="high_risk" value="<?= $highRisk ?>">
            <input type="submit" value="Bet">
            <p>by -500 up to 2500</p>
        </form>
        <form action="process.php" method="POST">
            <h3>Severe Risk</h3>
            <input type="hidden" name="severe_risk" value="<?= $severeRisk ?>">
            <input type="submit" value="Bet">
            <p>by -3000 up to 5000</p>
        </form>
        <h2>Game host:</h2>
        <div class="msg_box">
            <p><?= $start ?></p>
<?php
    foreach($message as $msg)
    {
?>
            <p class="<?= $msg['bet_result'] ?>"> <?= $msg['msg'] ?></p>
<?php
    }
?>
            <p><?= $end ?></p>
        </div>
    </div>
</body>
</html>