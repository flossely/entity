<?php
$id = $_REQUEST['id'];
$key = $_REQUEST['key'];
// EVALUATION DATA
if (!file_exists($id.'/eval.ini')) {
    file_put_contents($id.'/eval.ini', "0=||=0=||=0");
    chmod($id.'/eval.ini', 0777);
}
$allSidesRating = file_get_contents($id.'/eval.ini');
$expAllSideRating = explode('=||=', $allSidesRating);
$leftRating = $expAllSideRating[0];
$centerRating = $expAllSideRating[1];
$rightRating = $expAllSideRating[2];
// CHECKING KEY
if ($key == 'center') {
    $centerRating += 1;
} elseif ($key == 'left') {
    $leftRating += 1;
} elseif ($key == 'right') {
    $rightRating += 1;
}
// SAVING DATA
file_put_contents($id.'/eval.ini', $leftRating.'=||='.$centerRating.'=||='.$rightRating);
chmod($id.'/eval.ini', 0777);
// SORTING DATA
$valuesArray = [$leftRating, $centerRating, $rightRating];
$maxValue = max($valuesArray);
if ($leftRating == $maxValue) {
    $finalResult = -1;
} elseif ($centerRating == $maxValue) {
    $finalResult = 0;
} elseif ($rightRating == $maxValue) {
    $finalResult = 1;
}
// SAVING RESULTS
file_put_contents($id.'/mode', $finalResult);
chmod($id.'/mode', 0777);