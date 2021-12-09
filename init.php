<?php
$id = $_POST['id'];
$type = $_POST['type'];
if ($type == 'stats') {
    $mode = $_POST['mode'];
    if (!file_exists($id) && !file_exists('.backup/'.$id)) {
        mkdir($id);
        chmod($id, 0777);
        file_put_contents($id.'/mode', $mode);
        chmod($id.'/mode', 0777);
        file_put_contents($id.'/rating', 0);
        chmod($id.'/rating', 0777);
    }
} elseif ($type == 'polls') {
    $value = $_POST['value'];
    $options = $_POST['options'];
    $range = $_POST['range'];
    $question = $_POST['question'];
    $pollData = $value.'=||='.$options.'=||='.$range.'=||='.$question;
    if (!file_exists($id.'.poll')) {
        file_put_contents($id.'.poll', $pollData);
        chmod($id.'.poll', 0777);
    }
}
