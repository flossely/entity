<?php

$dir = '.';
$list = str_replace($dir.'/','',(glob($dir.'/*.civ.php')));

/*

if (!is_empty($list)) {
    foreach ($list as $key=>$value) {
        include $value;
    }
}

*/
