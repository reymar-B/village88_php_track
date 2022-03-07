<?php

require "process.php";

$filePath = getFilePagination($_SESSION['csv_name'], $conn);

$filePath = $filePath['content'];

$csvFile = file("uploads/$filePath");

$resultsPerPage = 50;

foreach ($csvFile as $line)
{
    $data[] = str_getcsv($line);
}

for($i = 1; $i < count($data); $i++)
{
    $newData[$i] = $data[$i]; 
}

$numberOfPage = ceil(count($newData) / $resultsPerPage); 

if(!isset ($_GET['page']))
{  
    $page = 1;  
} 
else 
{  
    $page = $_GET['page'];  
}

$counter = 0;

$counter = ($page * $resultsPerPage) - $resultsPerPage;

for($i = $counter + 1; $i <= ((50 * $page) + 1); $i++)
{
    if(!empty($newData[$i]))
    {
        $value[] = $newData[$i];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="file_upload_csv_files_and_display_with_pagination">
    <link rel="stylesheet" href="style.css">
    <title>Excel To Html</title>
</head>
<body>
    <div class="container">
        <h1><?= $_SESSION['csv_name'] ?></h1>
        <div class="wrapper">
            <table>
                <tr>
                    <th>first name</th>
                    <th>last name</th>
                    <th>address</th>
                    <th>email</th>
                    <th>contact</th>
             </tr>
<?php
    foreach($value as $data)
    {
?>
            <tr>
                <td><?= $data[0] ?></td>
                <td><?= $data[1] ?></td>
                <td><?= $data[3] ?></td>
                <td><?= $data[10] ?></td>
                <td><?= $data[8] ?></td>
            </tr>
<?php
    }
?>
            </table>
        </div>
<?php
    for($page = 1; $page <= $numberOfPage; $page++)
    {  
?>
        <a href ="record.php?page=<?= $page ?>"><?= $page ?></a>  
<?php
    } 

    ?>
        <span><a class="return" href="index.php">Back</a></span>
    </div>
</body>
</html>