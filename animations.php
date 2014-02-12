<!DOCTYPE html>
<html>
<head>
    <meta content="text/html" charset="utf-8"/>
    <meta name="keywords" content="Anitmation,Art,Student,Photography,Photoshop,Blog">
    <meta name="decription" content="Online art portfolio and blog">
    <title>My Animations</title>
    <link rel="stylesheet" href="main_style.css">
    <link rel="icon" type image="png" href="http://www.favicon.co.uk/ico/4246.png">
    <script type="text/javascript" src="highslide/highslide-full.js"></script>
    <link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
    <script type="text/javascript">
    // Apply the Highslide settings
    hs.graphicsDir = 'highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.align = 'center';
    hs.fadeInOut = true;
    hs.dimmingOpacity = 0.75;
    hs.outlineWhileAnimating = true;
    //hs.wrapperClassName = 'borderless';
    </script>
</head>
<body>
    <div id="body_wrapper">
        <?php
        include 'header.php';
        include 'navbar.php';
        ?>
        <div class="heading">View My Animations:</div>

        <?php include 'editable/animations_markup.html'; ?>
        

    </div>
</body>
</html>