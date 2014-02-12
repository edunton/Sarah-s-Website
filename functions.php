<?php

function curPageURL() {
 $pageURL = 'http';
 if(isSet($_SERVER["HTTPS"])){if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
 }

function del_last_char($str) {
    return substr($str, 0, (strlen($str)-1) );
}

/*
function genDivs($file) {
    $tokens = preg_split(\s, file_get_contents($file, true));
    $tree = (genDivsTree(array( array(), $tokens )))[1]
}

function genDivsTree($tokenArray) {

    $tree = $tokenArray[0];
    $tokens = $tokenArray[1];

    if ($tokens[0] == '!date!'){

        $tokens = genDivsTree(array())
        return array('date' => $tokens(1));
    }
}
*/

 ?>