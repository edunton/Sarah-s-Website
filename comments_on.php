<?php
include "simple_html_dom.php";
extract(array_map('htmlspecialchars', $_GET));
$path = 'comments/'.$sect.'/'.$comment_file;
function error_bar($error) {
        if(isset($error)){
                switch ($error) {
                    case '0':
                        echo '<div id=success>Comment Submited</div>';
                        break;
                    case '1':
                        echo '<div id=fail>Comment Needs a Name</div>';
                        break;
                    case '2':
                        echo '<div id=fail>Comment and/or Name Needs to be Shorter</div>';
                        break;
                    case '3':
                        echo '<div id=fail>Comment Needs to be Filled In</div>';
                        break;
                    case '4':
                        echo '<div id=fail>Captcha Filled Out Incorrectly</div>';
                        break;
                    default:
                        break;
                }
            }
}
$err;
if(!isset($error)) {$err = -1;} else {$err = $error;}
?>

<!DOCTYPE html>
<html>
<head>
<meta content="text/html" charset="utf-8"/>
<meta name="keywords" content="Anitmation,Art,Student,Photography,Photoshop,Blog">
<meta name="decription" content="Online art portfolio and blog">
<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="main_style.css">
<link rel="icon" type image="png" href="http://www.favicon.co.uk/ico/4246.png">
 <script type="text/javascript">
 var RecaptchaOptions = {
   theme : 'white'
 };
 </script>
</head>

<body>
    <div id="body_wrapper">

        <?php
        include 'header.php';
        include 'navbar.php';
        error_bar($err); 
        ?>
        <?php if ($sect != 'blog') {echo '<div class="heading">'.$title.'</div>';} ?>
        <div class="embeding">
            <?php
                if ($sect == 'blog') {

                    $html = file_get_html('editable/blog_markup.html');
                    $tags = $html->find('div[id='.$link.']');

                    if(count($tags) != 0){ echo $tags[0];} else {echo '<font color="red">ERROR</font>';}

                }
                if ( preg_match('%jpg$|png$|gif$%', $link) ) {
                    echo '<img src="'.$link.'" alt="subject">';
                }
                elseif ($sect == 'animations' || $sect == 'film'){
                    echo '<iframe width="660" height="415" src="//www.youtube.com/embed/'.$link.'" frameborder="0" allowfullscreen></iframe>';
                }
            ?>
        </div>
        <div id="comment_body">
            <?php
            $coms = file_get_html($path);
            if ($coms == '') {echo '<div id="no_com">Looks pretty quiet in here. Be the first to comment.</div>';}
            else {echo $coms;}
            ?>
        </div>

        <div id="comment_form">
            <?php error_bar($err);?>
            <form action="process_comment.php" method="post">
                <p>Name (Limit 60 Characters):</p><input type="text" name="name" value="ANON"/>
                <p>Comment (Limit 200 Characters):</p><textarea name="comment" id="" cols="30" rows="10">My Comment is (default text):</textarea>
                <input type="hidden" name="path_comment" value=<?php echo $path; ?>/>
                <input type="hidden" name="path_home" value=<?php echo curPageURL(); ?>/>

                <?php
                    require_once('recaptchalib.php');
                    $publickey = "6LcKc-0SAAAAAJgRfkB6tGDQoM7uJGnsDpDewNJn"; // you got this from the signup page
                    echo recaptcha_get_html($publickey);
                ?>
                <input type="submit" name="Submit" value="Submit"/>
            </form>
        </div>

</body>
</html>