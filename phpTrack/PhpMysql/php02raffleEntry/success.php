<?php

session_start();

$deleteMsg = !isset($_SESSION['delete_msg']) ? $deleteMsg = '' : $deleteMsg = $_SESSION['delete_msg'];

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DATABASE', 'raffle_entries');

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

$query = "SELECT * FROM contact_list ORDER BY id DESC ";

$result = $connection->query($query);

$data = $connection->query($query);

$data = $data->fetch_assoc();

$result = $result->fetch_all(MYSQLI_ASSOC);

$phone = !isset($data['contact_number']) ? $phone = '******' : $phone = $data['contact_number'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="an_application_that_asks_a_user_to_enter_contact_number">
    <link rel="stylesheet" href="style.css">
    <title>Raffle Entry</title>
</head>
<body>
    <div class="wrapper">

        <h5>Success contact number <?= $phone ?> is now added</h5>
        <table>
            <tr>
                <th>Contact Number</th>
                <th>Date Inserted</th>
                <th>Remove Contact</th>
            </tr>
        <p><?= $deleteMsg ?></p>
<?php
    foreach($result as $data)
    {
?>
            <tr>
                <td><?= $data['contact_number'] ?></td>
                <td><?= date_format(date_create($data['created_at']),'F d, Y h:i:s a') ?></td>
                <td><a href="process.php?id=<?= $data['id'] ?>">Delete</a></td>
            </tr>
<?php
}
?>   
        </table>
        <a class="add_contact" href="index.php">Add Contact</a>
    </div>
</body>
</html>