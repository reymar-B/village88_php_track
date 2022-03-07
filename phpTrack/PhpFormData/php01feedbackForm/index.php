<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="get_familiar_with_$_POST">
    <link rel="stylesheet" href="style.css">
    <title>Feedback Form</title>
</head>
<body>
    <div class="container">
        <h1>Feedback Form</h1>
        <form action="result.php" method="POST">
            <label for="name">Your Name (optional)</label>
            <input id="name" name="name" type="text" placeholder="Name">
            <label for="course">Course Title:</label>
            <select name="course" id="cours">
                <option value="PHP Track">PHP Track</option>
                <option value="HTML/CSS">HTML/CSS</option>
                <option value="jQuery">jQuery</option>
            </select>
            <label for="score">Given Score (1-10)</label>
            <select id="score" name="score">
                <option value="10">10</option>
                <option value="9">9</option>
                <option value="8">8</option>
            </select>
            <label for="reason">Reason:</label>
            <textarea id="reason" name="reason"></textarea>
            <input class="submit" type="submit" value="Submit">
        </form>
    </div>
</body>
</html>