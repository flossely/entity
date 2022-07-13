<?php

include 'system.php';
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
define("OLIGARCHY", $cividictus[$lingua]["oligarchy"]);
define("CLASSICAL_REPUBLIC", $cividictus[$lingua]["classical_republic"]);
define("MONARCHY", $cividictus[$lingua]["monarchy"]);
define("THEOCRACY", $cividictus[$lingua]["theocracy"]);
define("MERCHANT_REPUBLIC", $cividictus[$lingua]["merchant_republic"]);
define("FASCISM", $cividictus[$lingua]["fascism"]);
define("COMMUNISM", $cividictus[$lingua]["communism"]);
define("DEMOCRACY", $cividictus[$lingua]["democracy"]);

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

$civ =
[
    "eu" =>
    [
        "rating" => 0.01562000,
        "mode" => 0,
        "coord" => "12.49750000;41.90500000;56",
        "var" =>
        [
            "i" =>
            [
                "era" => ERA_I,
                "started" => START_I,
                "ended" => END_I,
                "name" =>
                [
                    "en" => "Indo-European Tribes",
                    "la" => "Tribuum Indo-Europaeae",
                ],
                "leader" =>
                [
                    "en" => "Antiochus X Eusebes Philopator",
                    "la" => "Antiochus X Evsevis Philopatoris",
                ],
                "economy" => NATURAL_ECONOMY,
                "government" => CHIEFDOM,
            ],
            "ii" =>
            [
                "era" => ERA_II,
                "started" => START_II,
                "ended" => END_II,
                "name" =>
                [
                    "en" => "Roman Empire",
                    "la" => "Imperium Romanum",
                ],
                "leader" =>
                [
                    "en" => "Julius Caesar",
                    "la" => "Julius Caesar",
                ],
                "economy" => FREE_MARKET,
                "government" => AUTOCRACY,
            ],
            "iii" =>
            [
                "era" => ERA_III,
                "started" => START_III,
                "ended" => END_III,
                "name" =>
                [
                    "en" => "Holy Roman Empire",
                    "la" => "Sacrum Imperium Romanum",
                ],
                "leader" =>
                [
                    "en" => "Charlemagne",
                    "la" => "Carolus Magnus",
                ],
                "title" => KING,
                "economy" => FREE_MARKET,
                "government" => MONARCHY,
            ],
            "iv" =>
            [
                "era" => ERA_IV,
                "started" => START_IV,
                "ended" => END_IV,
                "name" =>
                [
                    "en" => "Holy Roman Empire",
                    "la" => "Sacrum Imperium Romanum",
                ],
                "leader" =>
                [
                    "en" => "Charles V",
                    "la" => "Carolus V",
                ],
                "title" => KING,
                "economy" => FREE_MARKET,
                "government" => MONARCHY,
            ],
            "v" =>
            [
                "era" => ERA_V,
                "started" => START_V,
                "ended" => END_V,
                "name" =>
                [
                    "en" => "French Republic",
                    "la" => "Gallico Republica",
                ],
                "leader" =>
                [
                    "en" => "Napoleon Bonaparte",
                    "la" => "Neapolio Bonaparte I",
                ],
                "title" => EMPEROR,
                "economy" => FREE_MARKET,
                "government" => MONARCHY,
            ],
            "vi" =>
            [
                "era" => ERA_VI,
                "started" => START_VI,
                "ended" => END_VI,
                "name" =>
                [
                    "en" => "French Republic",
                    "la" => "Gallico Republica",
                ],
                "leader" =>
                [
                    "en" => "Charles de Gaulle",
                    "la" => "Carolus de Gaulle",
                ],
                "economy" => FREE_MARKET,
                "government" => FASCISM,
            ],
            "vii" =>
            [
                "era" => ERA_VII,
                "started" => START_VII,
                "ended" => END_VII,
                "name" =>
                [
                    "en" => "French Republic",
                    "la" => "Gallico Republica",
                ],
                "leader" =>
                [
                    "en" => "François Mitterrand",
                    "la" => "Franciscus Mitterrand",
                ],
                "economy" => FREE_MARKET,
                "government" => COMMUNISM,
            ],
            "viii" =>
            [
                "era" => ERA_VIII,
                "started" => START_VIII,
                "ended" => END_VIII,
                "name" =>
                [
                    "en" => "European Union",
                    "la" => "Unio Europaea",
                ],
                "leader" =>
                [
                    "en" => "Ursula von der Leyen",
                    "la" => "Ursula de ille Leges",
                ],
                "title" => PRESIDENT,
                "economy" => FREE_MARKET,
                "government" => DEMOCRACY,
            ],
        ],
    ],
    "us" =>
    [
        "rating" => 0.00012564,
        "mode" => 0,
        "coord" => "-77.01222222;38.91444444;48",
        "var" =>
        [
            "v" =>
            [
                "era" => ERA_V,
                "started" => START_V,
                "ended" => END_V,
                "name" =>
                [
                    "en" => "Confederate States of America",
                    "la" => "Confoederatio Americae",
                ],
                "leader" =>
                [
                    "en" => "George Washington",
                    "la" => "Georgius Washingtonius",
                ],
                "title" => PRESIDENT,
                "economy" => FREE_MARKET,
                "government" => DEMOCRACY,
            ],
            "vi" =>
            [
                "era" => ERA_VI,
                "started" => START_VI,
                "ended" => END_VI,
                "name" =>
                [
                    "en" => "United States of America",
                    "la" => "Foederatae Americae",
                ],
                "leader" =>
                [
                    "en" => "Theodore Roosevelt",
                    "la" => "Theodorus Rooseveltius",
                ],
                "title" => PRESIDENT,
                "economy" => FREE_MARKET,
                "government" => DEMOCRACY,
            ],
            "vii" =>
            [
                "era" => ERA_VII,
                "started" => START_VII,
                "ended" => END_VII,
                "name" =>
                [
                    "en" => "United States of America",
                    "la" => "Foederatae Americae",
                ],
                "leader" =>
                [
                    "en" => "Harry Truman",
                    "la" => "Henricus Truman",
                ],
                "title" => PRESIDENT,
                "economy" => FREE_MARKET,
                "government" => DEMOCRACY,
            ],
            "viii" =>
            [
                "era" => ERA_VIII,
                "started" => START_VIII,
                "ended" => END_VIII,
                "name" =>
                [
                    "en" => "United States of America",
                    "la" => "Foederatae Americae",
                ],
                "leader" =>
                [
                    "en" => "Donald Trump",
                    "la" => "Donaldus Trumphius",
                ],
                "title" => PRESIDENT,
                "economy" => FREE_MARKET,
                "government" => DEMOCRACY,
            ],
        ],
    ],
    "ru" =>
    [
        "rating" => 0.00100562,
        "mode" => 0,
        "coord" => "37.61861111;55.75916667;147",
        "var" =>
        [
            "i" =>
            [
                "era" => ERA_I,
                "started" => START_I,
                "ended" => END_I,
                "name" =>
                [
                    "en" => "Slavonic Tribes",
                    "la" => "Tribuum Slavicae",
                ],
                "leader" =>
                [
                    "en" => "Askold",
                    "la" => "Ascoldus",
                ],
                "title" => DUKE,
                "economy" => NATURAL_ECONOMY,
                "government" => CHIEFDOM,
            ],
            "ii" =>
            [
                "era" => ERA_II,
                "started" => START_II,
                "ended" => END_II,
                "name" =>
                [
                    "en" => "Slavonic Tribes",
                    "la" => "Tribuum Slavicae",
                ],
                "leader" =>
                [
                    "en" => "Rurik",
                    "la" => "Ruricus",
                ],
                "title" => DUKE,
                "economy" => NATURAL_ECONOMY,
                "government" => CHIEFDOM,
            ],
            "iii" =>
            [
                "era" => ERA_III,
                "started" => START_III,
                "ended" => END_III,
                "name" =>
                [
                    "en" => "Kievan Rus",
                    "la" => "Magni Duces Kiovienses",
                ],
                "leader" =>
                [
                    "en" => "Vladimir I",
                    "la" => "Vladimirus I",
                ],
                "title" => DUKE,
                "economy" => NATURAL_ECONOMY,
                "government" => CHIEFDOM,
            ],
            "iv" =>
            [
                "era" => ERA_IV,
                "started" => START_IV,
                "ended" => END_IV,
                "name" =>
                [
                    "en" => "Grand Duchy of Moscow",
                    "la" => "Magni Ducatus Moscuensis",
                ],
                "leader" =>
                [
                    "en" => "Ivan IV the Terrible",
                    "la" => "Ioannes IV",
                ],
                "title" => CAESAR,
                "economy" => NATURAL_ECONOMY,
                "government" => MONARCHY,
            ],
            "v" =>
            [
                "era" => ERA_V,
                "started" => START_V,
                "ended" => END_V,
                "name" =>
                [
                    "en" => "Russian Empire",
                    "la" => "Imperium Russicum",
                ],
                "leader" =>
                [
                    "en" => "Peter I the Great",
                    "la" => "Petrus I",
                ],
                "title" => EMPEROR,
                "economy" => FAIR_MARKET,
                "government" => MONARCHY,
            ],
            "vi" =>
            [
                "era" => ERA_VI,
                "started" => START_VI,
                "ended" => END_VI,
                "name" =>
                [
                    "en" => "Soviet Union",
                    "la" => "Unio Sovietica",
                ],
                "leader" =>
                [
                    "en" => "Vladimir Lenin",
                    "la" => "Vladimirus Ulyanov",
                ],
                "economy" => PLANNED_ECONOMY,
                "government" => COMMUNISM,
            ],
            "vii" =>
            [
                "era" => ERA_VII,
                "started" => START_VII,
                "ended" => END_VII,
                "name" =>
                [
                    "en" => "Soviet Union",
                    "la" => "Unio Sovietica",
                ],
                "leader" =>
                [
                    "en" => "Leonid Brezhnev",
                    "la" => "Leonidas Breznev",
                ],
                "economy" => PLANNED_ECONOMY,
                "government" => COMMUNISM,
            ],
            "viii" =>
            [
                "era" => ERA_VIII,
                "started" => START_VIII,
                "ended" => END_VIII,
                "name" =>
                [
                    "en" => "Russian Federation",
                    "la" => "Foederatio Russica",
                ],
                "leader" =>
                [
                    "en" => "Vladimir Putin",
                    "la" => "Vladimirus Putin",
                ],
                "title" => PRESIDENT,
                "economy" => FREE_MARKET,
                "government" => DEMOCRACY,
            ],
        ],
    ],
    "cn" =>
    [
        "rating" => 0.00010278,
        "mode" => 0,
        "coord" => "116.40777778;39.90472222;46",
        "var" =>
        [
            "i" =>
            [
                "era" => ERA_I,
                "started" => START_I,
                "ended" => END_I,
                "name" =>
                [
                    "en" => "Sino-Tibetan Tribes",
                    "la" => "Tribuum Sino-Tibetanum",
                ],
                "leader" =>
                [
                    "en" => "Kong Fuzi",
                    "la" => "Confucius",
                ],
                "economy" => NATURAL_ECONOMY,
                "government" => CHIEFDOM,
            ],
            "ii" =>
            [
                "era" => ERA_II,
                "started" => START_II,
                "ended" => END_II,
                "name" =>
                [
                    "en" => "Qin Dynasty Empire",
                    "la" => "Qin Dynastia Imperium",
                ],
                "leader" =>
                [
                    "en" => "Qin Shi Huang",
                    "la" => "Shinshikotei",
                ],
                "title" => EMPEROR,
                "economy" => NATURAL_ECONOMY,
                "government" => MONARCHY,
            ],
            "iii" =>
            [
                "era" => ERA_III,
                "started" => START_III,
                "ended" => END_III,
                "name" =>
                [
                    "en" => "Tang Dynasty Empire",
                    "la" => "Tang Dynastia Imperium",
                ],
                "leader" =>
                [
                    "en" => "Wu Zetian",
                    "la" => "Takenori Ten",
                ],
                "title" => EMPRESS,
                "economy" => NATURAL_ECONOMY,
                "government" => MONARCHY,
            ],
            "iv" =>
            [
                "era" => ERA_IV,
                "started" => START_IV,
                "ended" => END_IV,
                "name" =>
                [
                    "en" => "Qin Dynasty Empire",
                    "la" => "Qin Dynastia Imperium",
                ],
                "leader" =>
                [
                    "en" => "Kangxi",
                    "la" => "Kokitei",
                ],
                "title" => EMPEROR,
                "economy" => NATURAL_ECONOMY,
                "government" => MONARCHY,
            ],
            "v" =>
            [
                "era" => ERA_V,
                "started" => START_V,
                "ended" => END_V,
                "name" =>
                [
                    "en" => "Qin Dynasty Empire",
                    "la" => "Qin Dynastia Imperium",
                ],
                "leader" =>
                [
                    "en" => "Dowager Cixi",
                    "la" => "Seitaigo",
                ],
                "title" => EMPRESS,
                "economy" => FAIR_MARKET,
                "government" => MONARCHY,
            ],
            "vi" =>
            [
                "era" => ERA_VI,
                "started" => START_VI,
                "ended" => END_VI,
                "name" =>
                [
                    "en" => "Republic of China",
                    "la" => "Respublica Sinarum",
                ],
                "leader" =>
                [
                    "en" => "Sun Yat Sen",
                    "la" => "Magofumi",
                ],
                "economy" => FREE_MARKET,
                "government" => FASCISM,
            ],
            "vii" =>
            [
                "era" => ERA_VII,
                "started" => START_VII,
                "ended" => END_VII,
                "name" =>
                [
                    "en" => "People's Republic of China",
                    "la" => "Popularis Respublica Sinarum",
                ],
                "leader" =>
                [
                    "en" => "Mao Zedong",
                    "la" => "Motakuto",
                ],
                "economy" => FREE_MARKET,
                "government" => COMMUNISM,
            ],
            "viii" =>
            [
                "era" => ERA_VIII,
                "started" => START_VIII,
                "ended" => END_VIII,
                "name" =>
                [
                    "en" => "People's Republic of China",
                    "la" => "Popularis Respublica Sinarum",
                ],
                "leader" =>
                [
                    "en" => "Xi Jinping",
                    "la" => "Shukinpei",
                ],
                "title" => PRESIDENT,
                "economy" => FREE_MARKET,
                "government" => COMMUNISM,
            ],
        ],
    ],
];

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

