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

define("INFINITY_BC", "-∞");
define("INFINITY_AD", "∞");

define("ERA_I", $cividictus[$lingua]["ancient_era"]);
define("START_I", INFINITY_BC);
define("END_I", -1000);
define("ERA_II", $cividictus[$lingua]["classical_era"]);
define("START_II", -1000);
define("END_II", 476);
define("ERA_III", $cividictus[$lingua]["medieval_era"]);
define("START_III", 476);
define("END_III", 1500);
define("ERA_IV", $cividictus[$lingua]["renaissance_era"]);
define("START_IV", 1500);
define("END_IV", 1700);
define("ERA_V", $cividictus[$lingua]["industrial_era"]);
define("START_V", 1700);
define("END_V", 1900);
define("ERA_VI", $cividictus[$lingua]["modern_era"]);
define("START_VI", 1900);
define("END_VI", 1950);
define("ERA_VII", $cividictus[$lingua]["atomic_era"]);
define("START_VII", 1950);
define("END_VII", 1990);
define("ERA_VIII", $cividictus[$lingua]["information_era"]);
define("START_VIII", 1990);
define("END_VIII", 2050);
define("ERA_IX", $cividictus[$lingua]["future_era"]);
define("START_IX", 2050);
define("END_IX", 2100);
define("ERA_X", $cividictus[$lingua]["space_era"]);
define("START_X", 2100);
define("END_X", INFINITY_AD);

define("CHIEFDOM", $cividictus[$lingua]["chiefdom"]);

define("AUTOCRACY", $cividictus[$lingua]["autocracy"]);
define("CLASSICAL_REPUBLIC", $cividictus[$lingua]["classical_republic"]);
define("OLIGARCHY", $cividictus[$lingua]["oligarchy"]);

define("MERCHANT_REPUBLIC", $cividictus[$lingua]["merchant_republic"]);
define("MONARCHY", $cividictus[$lingua]["monarchy"]);
define("THEOCRACY", $cividictus[$lingua]["theocracy"]);

define("COMMUNISM", $cividictus[$lingua]["communism"]);
define("DEMOCRACY", $cividictus[$lingua]["democracy"]);
define("FASCISM", $cividictus[$lingua]["fascism"]);

define("MARKET_SOCIALISM", $cividictus[$lingua]["market_socialism"]);
define("NEOLIBERAL_REPUBLIC", $cividictus[$lingua]["neoliberal_republic"]);
define("NEOCOLONIAL_EMPIRE", $cividictus[$lingua]["neocolonial_empire"]);

define("DIGITAL_DEMOCRACY", $cividictus[$lingua]["digital_democracy"]);
define("SYNTHETIC_TECHNOCRACY", $cividictus[$lingua]["synthetic_technocracy"]);
define("CORPORATE_LIBERTARIANISM", $cividictus[$lingua]["corporate_libertarianism"]);

define("NATURAL_ECONOMY", $cividictus[$lingua]["natural_economy"]);
define("FREE_MARKET", $cividictus[$lingua]["free_market"]);
define("FAIR_MARKET", $cividictus[$lingua]["fair_market"]);
define("PLANNED_ECONOMY", $cividictus[$lingua]["planned_economy"]);

define("KING", $cividictus[$lingua]["king"]);
define("QUEEN", $cividictus[$lingua]["queen"]);
define("PRINCE", $cividictus[$lingua]["prince"]);
define("PRINCESS", $cividictus[$lingua]["princess"]);
define("DUKE", $cividictus[$lingua]["duke"]);
define("DUCHESS", $cividictus[$lingua]["duchess"]);
define("CAESAR", $cividictus[$lingua]["caesar"]);
define("EMPEROR", $cividictus[$lingua]["emperor"]);
define("EMPRESS", $cividictus[$lingua]["empress"]);
define("PRESIDENT", $cividictus[$lingua]["president"]);

include 'civilopedia.php';

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

if (file_exists("flags")) {
    chmod("flags", 0777);
    rename("flags", "flags.d");
}

exec("git clone https://github.com/wholemarket/flags");
chmod("flags", 0777);

copy("./flags/".$add."-".$era.".png", "./".$add."/favicon.png");
exec("chmod -R 777 .");
exec("rm -rf flags");

if (file_exists("flags.d")) {
    chmod("flags.d", 0777);
    rename("flags.d", "flags");
}

