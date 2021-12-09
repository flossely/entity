<?php
$id = $_REQUEST['id'];
$key = $_REQUEST['key'];
$content = file_get_contents($id.'/rating');
if ($content < -664) {
    $content = -666;
} else {
    if ($key == 'up') {
        $content += 1;
    } elseif ($key == 'down') {
        $content -= 1;
    }
}
file_put_contents($id.'/rating', $content);
chmod($id.'/rating', 0777);
