<?php
include 'simple_html_dom.php';
include 'functions.php';

define('NO_ERRORS','&error=0');
define('ERROR_NO_NAME','&error=1');
define('ERROR_TOO_LONG','&error=2');
define('ERROR_NO_COM','&error=3');
define('CAP_WRONG', '&error=4');

define('DIRECTORY','comments/');
define('WORD_LIM', 200);
define('NAME_LIM',60);

extract(array_map('htmlspecialchars', $_POST));

require_once('recaptchalib.php');
$privatekey = "6LcKc-0SAAAAACN9-fQYct64Vk3xcfKGFDX8HnmT";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if(empty($path_home) || empty($path_comment)) {echo 'ERROR'; exit();}

if(substr($path_comment,0,strlen(DIRECTORY)) != DIRECTORY) {echo 'ERROR'; exit();}

$path_home = del_last_char($path_home);
$path_comment = del_last_char($path_comment);

$path_home = preg_replace('%&amp;%', '&', $path_home);

if (!$resp->is_valid){header('Location: '.$path_home.CAP_WRONG); exit();}

if(empty($name) || $name == ''){header('Location: '.$path_home.ERROR_NO_NAME); exit();}

if(empty($comment) || strlen($comment) == 0){header('Location: '.$path_home.ERROR_NO_COM); exit();}

if(strlen($comment) > WORD_LIM || strlen($name) > NAME_LIM){header('Location: '.$path_home.ERROR_TOO_LONG); exit();}

$current = file_get_contents($path_comment,true);

echo $current;

$new = '<div class="comment_wrapper">
<div class="commenter">'.$name.'</div>
<div class="comment_body">'.$comment.'</div>
</div>';

$new_page = $new.$current;

file_put_contents($path_comment, $new_page);

header("Location: ".$path_home.NO_ERRORS);

exit(); 
?>