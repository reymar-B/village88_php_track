<?php

session_start();

$money = 500;
$count = 10;

$chances = !isset($_SESSION['chances']) ? $_SESSION['chances'] = $count : $_SESSION['chances'];

$amount = !isset($_SESSION['amount']) ? $_SESSION['amount'] = $money : $_SESSION['amount'];

if(isset($_POST['low_risk']) && $chances > 0 && $amount >= $_POST['low_risk'])
{
    $chances -= 1;

    $betMode = 'low risk';

    $_SESSION['chances'] = $chances;

    $randAmount = randomBet($_POST['low_risk'], 4);

    $newAmount = $amount + $randAmount;

    $_SESSION['amount'] = $newAmount;

    $data = gameMessage($newAmount, $randAmount, $betMode, $chances);

    $_SESSION['message'][] = $data;
}
elseif(isset($_POST['moderate_risk']) && $chances > 0 && $amount >= $_POST['moderate_risk'])
{
    $chances -= 1;

    $betMode = 'moderate risk';
 
    $_SESSION['chances'] = $chances;

    $randAmount = randomBet($_POST['moderate_risk'], 10);

    $newAmount = $amount + $randAmount;

    $_SESSION['amount'] = $newAmount;

    $data = gameMessage($newAmount, $randAmount, $betMode, $chances);

    $_SESSION['message'][] = $data;
}
elseif(isset($_POST['high_risk']) && $chances > 0 && $amount >= $_POST['high_risk'])
{
    $chances -= 1;

    $betMode = 'high risk';
 
    $_SESSION['chances'] = $chances;

    $randAmount = randomBet($_POST['high_risk'], 5);

    $newAmount = $amount + $randAmount;

    $_SESSION['amount'] = $newAmount;

    $data = gameMessage($newAmount, $randAmount, $betMode, $chances);

    $_SESSION['message'][] = $data;
}
elseif(isset($_POST['severe_risk']) && $chances > 0 && $amount >= $_POST['severe_risk'])
{
    $chances -= 1;

    $betMode = 'severe risk';
 
    $_SESSION['chances'] = $chances;

    $randAmount = randomBet($_POST['severe_risk'], 5);

    $newAmount = $amount + $randAmount;

    $_SESSION['amount'] = $newAmount;

    $data = gameMessage($newAmount, $randAmount, $betMode, $chances);

    $_SESSION['message'][] = $data;
}

if(isset($_GET['reset']))
{
    session_destroy();
}

function randomBet($bet, $randNum)
{
    $newRand = rand(1, $randNum);

    $result = $newRand % 2 == 0 ? ($bet * $newRand) * -1 : $bet * $newRand;

    return $result;
}

function gameMessage($amount, $result, $betMode, $chances)
{
    date_default_timezone_get();

    date_default_timezone_set('Asia/Singapore');

    $date = date("m/d/Y h:i:sa");
    
    if($result < 0)
    {
        $betResult = 'is_loser';

        $msg = $date.' You Pushed "'. $betMode.'" Value is '. $result. ' your current money now is '. $amount. ' with '.
                    $chances. ' chance(s) left';

        $msgArr = ['msg' => $msg, 'bet_result' => $betResult];

        return $msgArr;
    }
    else
    {
        $betResult = 'is_winner';

        $msg = $date.' You Pushed "'. $betMode.'" Value is '. $result. ' your current money now is '. $amount. ' with '.
                    $chances. ' chance(s) left';

        $msgArr = ['msg' => $msg, 'bet_result' => $betResult];

        return $msgArr;
    }
}

header('Location: index.php');