<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Assets/style.css">
    <title>Document</title>
</head>
<body>
<h3> The guestbook</h3>
<form method="post">

    <b> Enter your name:</b>
    <label>
        <input name="name" size="30">
    </label> <br>


    <h3> Comments below:</h3>
    <b>Title</b>
    <label>
        <input name="title">
    </label>
    <label>
        <textarea name="comment" ROWS=6 COLS=60></textarea>
    </label>
    <p>
        <b>Press button to send </b>
        <br>
    </p>

    <input type=submit value="Send it!">
</form>
<?php foreach ($dateOrderPosts as $post) :?>
    <p><strong><?php echo $post['title']?></strong></p>
    <p>Message: <?php echo $post['content']?></p>
    <p>Posted on: <?php echo $post['date']?></p>
    <p>By: <?php echo $post['name']?></p>
<?php endforeach?>

<div id="playground">
</div>
</body>
</html>
