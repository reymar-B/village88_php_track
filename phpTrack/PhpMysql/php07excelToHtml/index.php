<?php

session_start();

require "display.php";

$files = getFile($conn);

$err = !isset($_SESSION['file_err']) ? '' : $_SESSION['file_err'];

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
    <div class="upload_wrapper">
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <p><?= $err ?></p>
            <input type="file" name="file">
            <input type="submit" value="upload">
        </form>
        <h2>Upload a file</h2>
        <div class="submit_wrapper">
            <ol>
<?php
        foreach($files as $file)
    {
?>
                <li><a href="process.php?set_file=<?= $file['content'] ?>"><?= $file['content'] ?></a></li>
<?php
    }
?>
            </ol>
        </div>
    </div>
</body>
</html>