<!DOCTYPE html>
<html>
<head>
    <meta content="text/html" charset="utf-8"/>
    <meta name="keywords" content="Anitmation,Art,Student,Photography,Photoshop,Blog">
    <meta name="decription" content="Online art portfolio and blog">
<title>My Paintings and Drawings</title>
<link rel="stylesheet" type="text/css" href="main_style.css">
<link rel="icon" type image="png" href="http://www.favicon.co.uk/ico/4246.png">

<script type="text/javascript" src="highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />

</head>
<body>
    <div id="body_wrapper">
        <?php
        include 'header.php';
        include 'navbar.php';
        ?>
        
        <div class="heading">View My Artwork:</div>

        <script type="text/javascript">
        hs.graphicsDir = 'highslide/graphics/';
        hs.align = 'center';
        hs.transitions = ['expand', 'crossfade'];
        hs.outlineType = 'rounded-white';
        hs.fadeInOut = true;
        hs.dimmingOpacity = 0.75;
        // Add the controlbar
        hs.addSlideshow({
        //slideshowGroup: 'group1',
        interval: 5000,
        repeat: false,
        useControls: true,
        fixedControls: 'fit',
        overlayOptions: {
        opacity: 0.75,
        position: 'bottom center',
        hideOnMouseOut: true
        }
        });
        </script>
        
        <div class="post_pics">
            <?php include 'editable/paintings_markup.html'; ?>
        </div>


    </div>
</body>
</html>