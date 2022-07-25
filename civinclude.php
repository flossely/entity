<?php

$civdir = '.';
$civlist = str_replace($civdir.'/','',(glob($civdir.'/*.civ.php')));

foreach ($civlist as $key=>$value) {
    include $value;
}
