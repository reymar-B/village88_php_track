<?php

require "reviews.php";
require "connection.php";

$conn = newConnection();

$reviews = displayReview($conn);

if(!isset($_SESSION['user_name']))
{
    $isLogged =  'login.php';
    
    $log = 'Log In';

    $userName = '';
}
else
{
    $isLogged = 'process.php?logOut=logOut';

    $log = 'Log Out';

    $userName = $_SESSION['user_name'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="static_blog_page_with_dynamic_posts">
    <link rel="stylesheet" href="style.css">
    <title>Blog Page</title>
</head>
<body>
    <div class="container">
        <div class="head">
            <h2>BlogaPak</h2>
            <p>welcome <span><?= $userName ?></span></p>
            <a href="<?= $isLogged ?>"> <?= $log ?> </a>
        </div>
        <h1 class="blog_title">Title</h1>
        <p class="blog_content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, natus dolor placeat suscipit iure pariatur eaque aut tempore 
            atque architecto a illum assumenda nostrum ex, iste sint libero aspernatur. Eligendi eos ipsam, fugiat exercitationem 
            cupiditate quo laborum porro repellat quisquam, ratione ipsum necessitatibus tempore similique? Eligendi, velit sint fugiat 
            est facere blanditiis similique quisquam. Ea, quaerat aperiam aliquid voluptatem rerum provident necessitatibus, aliquam 
            incidunt ad nostrum tenetur odit soluta eaque? Animi a perspiciatis asperiores ipsum totam? Aliquid nisi officiis qui numquam 
            omnis ut eligendi, esse similique deserunt quam, molestiae quae sit laudantium. Atque culpa vitae illo sed, error harum fuga!
            atque architecto a illum assumenda nostrum ex, iste sint libero aspernatur. Eligendi eos ipsam, fugiat exercitationem 
            cupiditate quo laborum porro repellat quisquam, ratione ipsum necessitatibus tempore similique? Eligendi, velit sint fugiat 
            est facere blanditiis similique quisquam. Ea, quaerat aperiam aliquid voluptatem rerum provident necessitatibus, aliquam 
            incidunt ad nostrum tenetur odit soluta eaque? Animi a perspiciatis asperiores ipsum totam? Aliquid nisi officiis qui numquam 
            omnis ut eligendi, esse similique deserunt quam, molestiae quae sit laudantium. Atque culpa vitae illo sed, error harum fuga!
        </p>
        <h2 class>Leave a review</h2>
        <form class="review_form" action="process.php" method="POST">
            <input type="hidden" name="review">
            <textarea name="content"></textarea>
            <input type="submit" value="Post a review">
        </form>
<?php      
    foreach($reviews as $review)
    {
        if(isset($_SESSION['user_name']))
        {
            $replies = displayReply($conn, $review['id']);
        }
        else
        {
            $replies = [];
        }
?>
        <h6 class="review_title"><?= $review['name'] ?> <?= $review['date'] ?></h6>
        <p class="review_content"><?= $review['review'] ?></p>
        <div class="reply">
<?php
        foreach($replies as $reply)
        {
?>
            <h6 class="reply_title"><?= $reply['name'] ?> <?= $reply['date'] ?></h6>
            <p class="reply_msg"><?= $reply['reply'] ?> </p>
<?php
        }
?>
            <form class="<?= $_SESSION['show_form'] ?>" action="process.php" method="POST">
                <input type="hidden" name="reply">
                <input type="hidden" name="review_id" value="<?= $review['id'] ?>">
                <textarea name="message"></textarea>
                <input type="submit" value="Reply">
            </form>
        </div>
<?php
    }
?>
    </div>
</body>
</html>