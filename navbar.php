<?php
include 'functions.php';

$sect = '';
if(isset($_GET['sect'])) {$sect = htmlspecialchars($_GET['sect']);}
?>

<?php   echo '<ul id="nav">';
        $curPage = curPageName();
        $l = "<li>";
        $curTag = '<li id=current>';

        if($sect != '') {
            echo '<a href="'.$sect.'.php"><li id=back_button><img src="images/curl-left.svg" alt="lt"/>GO BACK</li></a>';
        }

        echo '<a href="blog.php">';
        if ($curPage == 'blog.php' || $sect == 'blog') {echo $curTag;} else {echo $l;}
            echo 'Blog</li></a>';

        echo '<a href="animations.php">';
        if ($curPage == 'animations.php' || $sect == 'animations') {echo $curTag;} else {echo $l;}
            echo 'Animations</li></a>';

        echo '<a href="storyboards.php">';
        if ($curPage == 'storyboards.php' || $sect == 'storyboards') {echo $curTag;} else {echo $l;}
            echo 'Storyboards</li></a>';

        echo '<a href="paintings.php">';
        if ($curPage == 'paintings.php' || $sect == 'paintings') {echo $curTag;} else {echo $l;}
            echo 'Traditional/Photoshop</li></a>';

        echo '<a href="film.php">';
        if ($curPage == 'film.php' || $sect == 'film') {echo $curTag;} else {echo $l;}
            echo 'Film</li></a>';

        echo '<a href="photography.php">';
        if ($curPage == 'photography.php' || $sect == 'photography') {echo $curTag;} else {echo $l;}
            echo 'Photography</li></a>';
        echo '</ul>';

?>    

