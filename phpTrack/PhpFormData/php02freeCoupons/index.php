<?php

session_start();

$customer = 10;
$custName = '';
$rand = '*******';

if(!isset($_SESSION['newCustomer']))
{
    $rand = rand(1000000, 9999999);
}
else
{
    $customer = $_SESSION['newCustomer'];
    
    $rand = $_SESSION['random'];
    
    $custName = $_SESSION['custName'];
}

$display = $customer <= 0 ? 'no_display' : 'show_display';

// Hide discount counter when equal to zero
if($customer <= 0)
{
    $display = 'no_display';
}
else
{
    $display = 'show_display';
}

// Hide or Show when session is set
$hideCoupon = isset($_SESSION['show']) ? $_SESSION['show'] : 'no_display';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="store_data_on_session">
    <link rel="stylesheet" href="style.css">
    <title>Free Coupons</title>
</head>
<body>
    <div class="container">
        <h1>Welcome Customer</h1>
        <p>We're giving away <span>free coupons</span></p>
        <p>as token of appreciation</p>
        <p class="<?= $display ?>">for the first <?= $customer ?> customer(s)</p>
        <form action="process.php" method="POST">
            <label for="name">Kindly type your name:</label>
            <input type="text" name="name">
            <input type="submit" value="submit">
        </form>
        <div class="coupon <?= $hideCoupon ?>">
            <p class="customer">Hi! <span><?= $custName ?></span></p>
            <p>50% discount</p>
            <p class="random"><span><?= $rand ?></span></p>
            <div>
                <a href="process.php?reset=reset">Reset Count</a>
                <a href="process.php?claim=claim">Claim Again</a>
            </div>
        </div>
    </div>
</body>
</html>