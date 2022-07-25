<?php

$dir = '.';
$list = str_replace($dir.'/','',(glob($dir.'/*.civ.php')));

foreach ($list as $key=>$value) {
    include $value;
}
