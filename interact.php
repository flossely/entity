<?php

function getForce($sf, $sm, $om, $fk) {
    if ($sm > $om) {
        $k = $fk + ($sm - $om);
        return $sf * $k;
    } elseif ($sm < $om) {
        $k = $fk + ($om - $sm);
        return $sf / $k;
    } else {
        return $sf;
    }
}

$dir = '.';

$sub = $_POST['sub'];
$act = $_POST['act'];
$obj = $_POST['obj'];

$subRating = file_get_contents($sub.'/rating');
$subMode = file_get_contents($sub.'/mode');
$objRating = file_get_contents($obj.'/rating');
$objMode = file_get_contents($obj.'/mode');

if ($act == 'run') {
    header("Location: '$obj'");
} elseif ($act == 'show') {
    header("Location: '$obj/favicon.png'");
} elseif ($act == 'footu') {
    header("Location: '$obj/footu.png'");
} elseif ($act == 'footd') {
    header("Location: '$obj/footd.png'");
} elseif ($act == 'footl') {
    header("Location: '$obj/footl.png'");
} elseif ($act == 'footr') {
    header("Location: '$obj/footr.png'");
} elseif ($act == 'punch') {
    $subForce = 1;
    $subAddForce = getForce($subForce, $subMode, $objMode, 2);
    $subRatingEffect = round($subAddForce, 0);
    $objRating = $objRating - $subRatingEffect;
    $subRating = $subRating + $subRatingEffect;
} elseif ($act == 'kick') {
    $subForce = 2;
    $subAddForce = getForce($subForce, $subMode, $objMode, 2);
    $subRatingEffect = round($subAddForce, 0);
    $objRating = $objRating - $subRatingEffect;
    $subRating = $subRating + $subRatingEffect;
} elseif ($act == 'stab') {
    $subForce = 3;
    $subAddForce = getForce($subForce, $subMode, $objMode, 2);
    $subRatingEffect = round($subAddForce, 0);
    $objRating = $objRating - $subRatingEffect;
    $subRating = $subRating + $subRatingEffect;
} elseif ($act == 'heal') {
    $subForce = 1;
    $subAddForce = getForce($subForce, $subMode, $objMode, 2);
    $subRatingEffect = round($subAddForce, 0);
    $objRating = $objRating + $subRatingEffect;
    $subRating = $subRating - $subRatingEffect;
} elseif ($act == 'mauser') {
    $subForce = 5;
    $subAddForce = getForce($subForce, $subMode, $objMode, 4);
    $subRatingEffect = round($subAddForce, 0);
    $objRating = $objRating - $subRatingEffect;
    $subRating = $subRating + $subRatingEffect;
} elseif ($act == 'ak47') {
    $subForce = 10;
    $subAddForce = getForce($subForce, $subMode, $objMode, 5);
    $subRatingEffect = round($subAddForce, 0);
    $objRating = $objRating - $subRatingEffect;
    $subRating = $subRating + $subRatingEffect;
} elseif ($act == 'm4a1') {
    $subForce = 8;
    $subAddForce = getForce($subForce, $subMode, $objMode, 5);
    $subRatingEffect = round($subAddForce, 0);
    $objRating = $objRating - $subRatingEffect;
    $subRating = $subRating + $subRatingEffect;
} elseif ($act == 'grenade') {
    $subForce = 12;
    $subAddForce = getForce($subForce, $subMode, $objMode, 6);
    $subRatingEffect = round($subAddForce, 0);
    $objRating = $objRating - $subRatingEffect;
    $subRating = $subRating + $subRatingEffect;
} elseif ($act == 'bomb') {
    $subForce = 16;
    $subAddForce = getForce($subForce, $subMode, $objMode, 8);
    $subRatingEffect = round($subAddForce, 0);
    $objRating = $objRating - $subRatingEffect;
    $subRating = $subRating + $subRatingEffect;
} elseif ($act == 'strengthen') {
    $objMode = 1;
} elseif ($act == 'weaken') {
    $objMode = -1;
} elseif ($act == 'neutralize') {
    $objMode = 0;
}

file_put_contents($sub.'/rating', $subRating);
chmod($sub.'/rating', 0777);
file_put_contents($sub.'/mode', $subMode);
chmod($sub.'/mode', 0777);
file_put_contents($obj.'/rating', $objRating);
chmod($obj.'/rating', 0777);
file_put_contents($obj.'/mode', $objMode);
chmod($obj.'/mode', 0777);
