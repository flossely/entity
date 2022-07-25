<?php

if (file_exists("locale")) {
    $localeOpen = file_get_contents("locale");
    $locale = ($localeOpen != "") ? $localeOpen : "en";
} else {
    $locale = "en";
}

$lingua = $locale;

include 'cividictus.php';

function yearconv($year)
{
    if ($year >= 0) {
        $append = "AD";
        $num = $year;
    } else {
        $append = "BC";
        $num = abs($year);
    }
    return $num . " " . $append;
}

include 'civconst.php';

$civ = [];

$civdir = '.';
$civlist = str_replace($civdir.'/','',(glob($civdir.'/*.civ.php')));

foreach ($civlist as $key=>$value) {
    try {
        include $value;
    } catch (Exception $e) {
        continue;
    }
}

$add = $_REQUEST["id"];
$nera = $_REQUEST["era"];

if (array_key_exists($nera, $civ[$add]["var"])) {
    $era = $nera;
} else {
    $era = array_key_first($civ[$add]["var"]);
}

if (file_exists($add)) {
    exec("chmod -R 777 .");
    exec("rm -rf ".$add);
}

mkdir($add);
chmod($add, 0777);
file_put_contents($add."/coord", $civ[$add]["coord"]);
chmod($add."/coord", 0777);
file_put_contents($add."/rating", $civ[$add]["rating"]);
chmod($add."/rating", 0777);
file_put_contents($add."/mode", $civ[$add]["mode"]);
chmod($add."/mode", 0777);

file_put_contents($add."/name", $civ[$add]["var"][$era]["name"][$lingua]);
chmod($add."/name", 0777);
file_put_contents($add."/leader", $civ[$add]["var"][$era]["leader"][$lingua]);
chmod($add."/leader", 0777);
file_put_contents($add."/era", $era);
chmod($add."/era", 0777);

file_put_contents($add."/economy", $civ[$add]["var"][$era]["economy"]);
chmod($add."/economy", 0777);
file_put_contents($add."/government", $civ[$add]["var"][$era]["government"]);
chmod($add."/government", 0777);
if (isset($civ[$add]["var"][$era]["title"])) {
    file_put_contents($add."/title", $civ[$add]["var"][$era]["title"]);
    chmod($add."/title", 0777);
}

$startyear = $civ[$add]["var"][$era]["started"];
$endyear = $civ[$add]["var"][$era]["ended"];

if ($startyear == INFINITY_BC) {
    $yrex = $startyear;
    $yrad = yearconv($endyear);
} elseif ($endyear == INFINITY_AD) {
    $yrex = yearconv($startyear);
    $yrad = $endyear;
} else {
    $yrex = yearconv($startyear);
    $yrad = yearconv($endyear);
}

$erainfo = $civ[$add]["var"][$era]["era"] . " (" . $yrex . " - " . $yrad . ")";

file_put_contents($add."/erainfo.txt", $erainfo);
chmod($add."/erainfo.txt", 0777);

if (isset($civ[$add]["var"][$era]["title"])) {
    if ($civ[$add]["var"][$era]["government"] == DEMOCRACY || $civ[$add]["var"][$era]["government"] == FASCISM || $civ[$add]["var"][$era]["government"] == COMMUNISM) {
        $civbard = $civ[$add]["var"][$era]["title"] . " " . $cividictus[$lingua]["de"] . " " . $civ[$add]["var"][$era]["name"][$lingua] . ", " . $civ[$add]["var"][$era]["leader"][$lingua];
    } else {
        $civbard = $civ[$add]["var"][$era]["title"] . " " . $civ[$add]["var"][$era]["leader"][$lingua] . " " . $cividictus[$lingua]["de"] . " " . $civ[$add]["var"][$era]["name"][$lingua];
    }
} else {
    $civbard = $civ[$add]["var"][$era]["leader"][$lingua] . " " . $cividictus[$lingua]["de"] . " " . $civ[$add]["var"][$era]["name"][$lingua];
}

$civinfo = $civbard . " (" . $civ[$add]["var"][$era]["economy"] . " " . $civ[$add]["var"][$era]["government"] . ")";
file_put_contents($add."/civinfo.txt", $civinfo);
chmod($add."/civinfo.txt", 0777);

if (file_exists($add.'-'.$era)) {
    chmod($add.'-'.$era, 0777);
    rename($add.'-'.$era, $add.'-'.$era.'.d');
}

exec('git clone https://github.com/civhub/'.$add.'-'.$era);
chmod($add.'-'.$era, 0777);

copy('./'.$add.'-'.$era.'/favicon.png', './'.$add.'/favicon.png');
exec('chmod -R 777 .');
exec('rm -rf '.$add.'-'.$era);

if (file_exists($add.'-'.$era.'.d')) {
    chmod($add.'-'.$era.'.d', 0777);
    rename($add.'-'.$era.'.d', $add.'-'.$era);
}
