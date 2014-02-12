<?php

date_default_timezone_set('America/New_York');

$title = htmlspecialchars($_POST['Title']);
$post = htmlspecialchars($_POST['Post']);
$password = htmlspecialchars($_POST['Password']);
$section = htmlspecialchars($_POST['Section']);

$dateLabel = date("Y_m_d__H_i_s");

if ($password != 'sweetbabyjesus') {
    echo 'Incorrect Password <a href=blog_posting.php> go back</a>';
    exit();
   // print_r($_POST);
}
elseif (isset($_POST['Text'])) {

    $date_display = date('M d, Y \a\t g:i a');

    function linkit($msg,$label) {
        return '<a href="comments_on.php?title=blog_posting&comment_file='.$label.'.html&link='.$label.'&sect=blog">'.
        $msg.'</a>';
    }

    $formatedPost = '<div class="post_body"><p>'.preg_replace('/\n/', '</p><p>', $post).'</p>'.
    '<div class=com_link>'.linkit('Go To Comments',$dateLabel).'</div></div>';

    $handle = fopen('comments/blog/'.$dateLabel.'.html', 'x+');

    $current = file_get_contents('editable/blog_markup.html',true);

    $new = '<div class="post" id="'.$dateLabel.'">
    <div class="title_post">'.linkit($title,$dateLabel).'</div>
    <div class="date">'.$date_display.'</div>'.
    $formatedPost.'</div>';

    $new_page = $new."\n".$current;

    file_put_contents('editable/blog_markup.html', $new_page);

    echo '<h1>Post Successful</h1><a href=blog.php>See post on the site</a>';

    echo '<h2>'.$title.'</h2>'.$formatedPost;

} elseif (isset($_POST['Picture'])) {

    $directory;
    $view;
    $com_dict;
    $thumb = $_POST['Thumbnail']; 
    $content = $_POST['Content']; 
    $caption = $_POST['Caption'];

    switch ($section) {
        case 'Animations':
            $directory = 'editable/animations_markup.html';
            $view = 'animations.php';
            $com_dict = 'animations';
            break;
        case 'Storyboards':
            $directory = 'editable/storyboards_markup.html';
            $view = 'storyboards.php';
            $com_dict = 'storyboards';
            break;
        case 'Film':
            $directory = 'editable/film_markup.html';
            $view = 'film.php';
            $com_dict = 'film';
            break;
        case 'Photography':
            $directory = 'editable/photography_markup.html';
            $view = 'photography.php';
            $com_dict = 'photography';
            break;
        default:
            $directory = 'editable/paintings_markup.html';
            $view = 'paintings.php';
            $com_dict = 'paintings';
            break;
    }

    $handle = fopen('comments/'.$com_dict.'/'.$dateLabel.'.html', 'x+');

    function link_it($msg,$label,$lnk,$ttl,$sec) {
        return '<a href="comments_on.php?title='.$ttl.'&comment_file='.$label.'.html&link='.$lnk.'&sect='.$sec.'">'.
        $msg.'</a>';
    }

    $vid_script = '';
    $link = $content;
    $expand = 'expand';
    if ($section == 'Film' || $section == 'Animations') {
        $vid_script = ", {objectType: 'iframe', width: 480, height: 385, 
        allowSizeReduction: false, wrapperClassName: 'draggable-header no-footer', 
        preserveContent: false, objectLoadTime: 'after'}";
        $link = 'http://www.youtube.com/embed/'.$content.'?rel=0&amp;wmode=transparent';
        $expand = 'htmlExpand';
    }

    $current = file_get_contents($directory,true);
    $new = 
        '<a href="'.$link.'" onclick="return hs.'.$expand.'(this'.$vid_script.')" class="highslide">
            <img src="'.$thumb.'" alt="'.$caption.'" title="Click to Enlarge">
        </a>

        <div class="highslide-caption">'.
            $caption
        .'<div class="comments">'.
                link_it('Go To Comments',$dateLabel,$content,$caption,$com_dict)
            .'</div>
            </div>

        ';

    $new_page = $new."\n".$current;
    file_put_contents($directory, $new_page);

    echo '<h1>Post Successful</h1><a href='.$view.'>See post on the site</a>';
}

?>