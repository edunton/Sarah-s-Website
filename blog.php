<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8"/>
    <title>My Weblog</title>
    <link rel="stylesheet" href="main_style.css">
    <link rel="icon" type image="png" href="http://www.favicon.co.uk/ico/4246.png">
</head>
<body>
    <div id="body_wrapper">
         <?php
        include 'header.php';
        include 'navbar.php'; ?>
    <div class="heading">My Blog</div>
        <?php
        include 'editable/blog_markup.html';
        ?>

       

    </div>
</body>
</html>