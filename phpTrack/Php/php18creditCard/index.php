<?php

    $id = 0;
    
    $users = array( 
        array( 'cardholder_name'=> 'Michael Choi', 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432' ),
        array('cardholder_name'=> 'John Supsupin','cvc' => 789, 'acc_num' => '0001 1200 1500 1510' ),
        array('cardholder_name'=> 'KB Tonel', 'cvc' => 567, 'acc_num' => '4568 456 123 5214' ),
        array('cardholder_name'=> 'Mark Guillen', 'cvc' => 345, 'acc_num' => '123 123 123 123'),
        array('cardholder_name'=> 'Tim Bradly', 'cvc' => 590, 'acc_num' => '321 321 231 453'),
        array('cardholder_name'=> 'Chris Hemsworth', 'cvc' => 309, 'acc_num' => '098 097 096 095'),
        array('cardholder_name'=> 'Tony Stark', 'cvc' => 680, 'acc_num' => '6809 7432 7680 9999'),
        array('cardholder_name'=> 'Nicolas Cage', 'cvc' => 887, 'acc_num' => '555 555 555 555'),
        array('cardholder_name'=> 'Scarlet Witch', 'cvc' => 345, 'acc_num' => '1234 4321 567 8905')
    );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="render_output_in_html_table">
    <title>Credit Card</title>
</head>
<style>
    table
    {
        background-color: red;
        font-size: 20px;
    }
        table tr th,td
        {
            border: 1px solid black;
            padding: 5px;
            background-color: white;
        }
    .high_light_1 td
    {
        background-color: rgb(218 217 217);
    }
</style>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Name in uppercase</th>
            <th>Account Num</th>
            <th>CVC Num</th>
            <th>Full Account</th>
            <th>Length of full account</th>
            <th>Is Valid</th>
        </tr>
<?php
    foreach( $users as $user )
    {
        $id++;

        $len =  strlen( $user[ 'acc_num' ].$user[ 'cvc' ] );

        $space = substr_count( $user[ 'acc_num' ]. $user[ 'cvc' ], " ");
?>

        <tr class='high_light_<?= ($id % 3) + 1; ?>'>
            <td> <?= $id ?> </td>
            <td> <?= $user[ 'cardholder_name' ] ?> </td>
            <td> <?= strtoupper( $user[ 'cardholder_name' ] )?> </td>
            <td> <?= $user[ 'acc_num' ] ?> </td>
            <td> <?= $user[ 'cvc' ] ?> </td>
            <td> <?= $user[ 'acc_num' ]. ' '. $user[ 'cvc' ] ?> </td>
            <td> <?=  $len - $space ?> </td>
            <td> <?= $valid = $len >= 19 ? 'Yes' : 'No' ?> </td>
        </tr>

<?php
    }
?>       
    </table>
</body>
</html>