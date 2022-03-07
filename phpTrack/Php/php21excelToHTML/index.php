<?php

$csvFile = file('files/us-500.csv');

$data = [];

foreach ($csvFile as $line)
{
    $data[] = str_getcsv($line);
}

$count = count($data);

$newData = [];

for($i = 1; $i < $count; $i++)
{
    $newData[$i] = $data[$i]; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="convert_excel_to_html">
    <link rel="stylesheet" href="style.css">
    <title>excel to html</title>
</head>
<body>
    <table>
        <tr>
            <th>first name</th>
            <th>last name</th>
            <th>company name</th>
            <th>full address</th>
            <th>phone 1</th>
            <th>phone 2</th>
            <th>email address</th>
            <th>website</th>
        </tr>
<?php
    $higlight = 0;

    foreach($newData as $value)
    {
        $higlight++;
?>
        <tr class="highlight_<?= $higlight % 10 ?>">
            <td><?= $value[0] ?></td>
            <td><?= $value[1] ?></td>
            <td><?= $value[2] ?></td>
            <td><?= $value[3] ?></td>
            <td><?= $value[8] ?></td>
            <td><?= $value[9] ?></td>
            <td><?= $value[10] ?></td>
            <td><?= $value[11] ?></td>
        </tr>
<?php
    }
?>
    </table>
</body>
</html>