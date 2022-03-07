<?php

require "simple_html_dom.php";

$request = array(
    'http' => array(
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'method' => 'POST',
        'content' => http_build_query(array(
            'jobkeyword' => 'software engineer'
        ))
    )
);

$context = stream_context_create($request);

$html = file_get_html("https://www.onlinejobs.ph/jobseekers/jobsearch", true, $context);

$list = $html->find('h4[class="fs-16 fw-700"]');

$list02 = $html->find('div[class="desc fs-14 d-none d-sm-block"]');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="a_spiderbot_that_can_crawl_through_a_website">
    <title>SpiderBot</title>
</head>
<style>
    table tr th,td
    {
        border: 1px solid black;
        padding: 5px;
        font-size: 20px;
    }
    h1
    {
        color: blue;
    }
</style>
<body>
    <h1>Job Posts <span>via online jobs Ph</span></h1>
    <table>
        <tr>
            <th> <h3>job position</h3></th>
        </tr>
<?php
    for($i = 0; $i < 10; $i++)
    {
?>
        <tr>
            <td><?= $list02[$i]->plaintext ?></td>
        </tr>
<?php
    }
?>   
    </table>
</body>
</html>