<?php

if (file_exists('locale')) {
    $localeOpen = file_get_contents('locale');
    $locale = ($localeOpen != '') ? $localeOpen : 'en';
} else {
    $locale = 'en';
}

$lingua = $locale;

$dictus =
[
    'en' =>
    [
        'ancient_era' => 'Ancient Era',
        'classical_era' => 'Classical Era',
        'medieval_era' => 'Medieval Era',
        'renaissance_era' => 'Renaissance Era',
        'industrial_era' => 'Industrial Era',
        'modern_era' => 'Modern Era',
        'atomic_era' => 'Atomic Era',
        'information_era' => 'Information Era',
        'future_era' => 'Future Era',
        'space_era' => 'Space Era',
        'de' => 'of the',
        'chiefdom' => 'Chiefdom',
        'autocracy' => 'Autocracy',
        'oligarchy' => 'Oligarchy',
        'classical_republic' => 'Classical Republic',
        'monarchy' => 'Monarchy',
        'theocracy' => 'Theocracy',
        'merchant_republic' => 'Merchant Republic',
        'fascism' => 'Fascism',
        'communism' => 'Communism',
        'democracy' => 'Democracy',
        'natural_economy' => 'Natural Economy',
        'free_market' => 'Free Market',
        'fair_market' => 'Fair Market',
        'planned_economy' => 'Planned Economy',
        'king' => 'King',
        'queen' => 'Queen',
        'prince' => 'Prince',
        'princess' => 'Princess',
        'duke' => 'Duke',
        'duchess' => 'Duchess',
        'caesar' => 'Tsar',
        'emperor' => 'Emperor',
        'empress' => 'Empress',
        'president' => 'President',
    ],
    'la' =>
    [
        'ancient_era' => 'Antiquitas',
        'classical_era' => 'Antiquitas Classica',
        'medieval_era' => 'Medium Aevum',
        'renaissance_era' => 'Aevum Litterarum Artiumque Renatarum',
        'industrial_era' => 'Aevum Investigatium',
        'modern_era' => 'Recentioris Aetatis',
        'atomic_era' => 'Nuclei Aetas',
        'information_era' => 'Informationes Aetatis',
        'future_era' => 'Futurae Aetatis',
        'space_era' => 'Aevum Spatio',
        'de' => 'de',
        'chiefdom' => 'Principatus',
        'autocracy' => 'Autocratia',
        'oligarchy' => 'Oligarchia',
        'classical_republic' => 'Res Publica Classica',
        'monarchy' => 'Monarchia',
        'theocracy' => 'Theocratia',
        'merchant_republic' => 'Mercator Rem Publicam',
        'fascism' => 'Fascismus',
        'communism' => 'Communismus',
        'democracy' => 'Democratia',
        'natural_economy' => 'Naturalis Oeconomia',
        'free_market' => 'Liberum Forum',
        'fair_market' => 'Aequum Forum',
        'planned_economy' => 'Cogitavit Oeconomia',
        'king' => 'Rex',
        'queen' => 'Regina',
        'prince' => 'Princeps',
        'princess' => 'Regia Puella',
        'duke' => 'Dux',
        'duchess' => 'Ducissa',
        'caesar' => 'Caesar',
        'emperor' => 'Imperator',
        'empress' => 'Imperatrix',
        'president' => 'Praesidens',
    ],
];

function yearconv($year)
{
    if ($year >= 0) {
        $append = 'AD';
        $num = $year;
    } else {
        $append = 'BC';
        $num = abs($year);
    }
    return $num . ' ' . $append;
}

define('ERA_I', $dictus[$lingua]['ancient_era']);
define('END_I', -1000);
define('ERA_II', $dictus[$lingua]['classical_era']);
define('START_II', -1000);
define('END_II', 476);
define('ERA_III', $dictus[$lingua]['medieval_era']);
define('START_III', 476);
define('END_III', 1500);
define('ERA_IV', $dictus[$lingua]['renaissance_era']);
define('START_IV', 1500);
define('END_IV', 1700);
define('ERA_V', $dictus[$lingua]['industry_era']);
define('START_V', 1700);
define('END_V', 1900);
define('ERA_VI', $dictus[$lingua]['modern_era']);
define('START_VI', 1900);
define('END_VI', 1950);
define('ERA_VII', $dictus[$lingua]['atomic era']);
define('START_VII', 1950);
define('END_VII', 1990);
define('ERA_VIII', $dictus[$lingua]['information_era']);
define('START_VIII', 1990);
define('END_VIII', 2050);
define('ERA_IX', $dictus[$lingua]['future_era']);
define('START_IX', 2050);
define('END_IX', 2100);
define('ERA_X', $dictus[$lingua]['space_era']);
define('START_X', 2100);

define('CHIEFDOM', $dictus[$lingua]['chiefdom']);
define('AUTOCRACY', $dictus[$lingua]['autocracy']);
define('OLIGARCHY', $dictus[$lingua]['oligarchy']);
define('CLASSICAL_REPUBLIC', $dictus[$lingua]['classical_republic']);
define('MONARCHY', $dictus[$lingua]['monarchy']);
define('THEOCRACY', $dictus[$lingua]['theocracy']);
define('MERCHANT_REPUBLIC', $dictus[$lingua]['merchant_republic']);
define('FASCISM', $dictus[$lingua]['fascism']);
define('COMMUNISM', $dictus[$lingua]['communism']);
define('DEMOCRACY', $dictus[$lingua]['democracy']);

define('NATURAL_ECONOMY', $dictus[$lingua]['natural_economy']);
define('FREE_MARKET', $dictus[$lingua]['free_market']);
define('FAIR_MARKET', $dictus[$lingua]['fair_market']);
define('PLANNED_ECONOMY', $dictus[$lingua]['planned_economy']);

define('KING', $dictus[$lingua]['king']);
define('QUEEN', $dictus[$lingua]['queen']);
define('PRINCE', $dictus[$lingua]['prince']);
define('PRINCESS', $dictus[$lingua]['princess']);
define('DUKE', $dictus[$lingua]['duke']);
define('DUCHESS', $dictus[$lingua]['duchess']);
define('CAESAR', $dictus[$lingua]['caesar']);
define('EMPEROR', $dictus[$lingua]['emperor']);
define('EMPRESS', $dictus[$lingua]['empress']);
define('PRESIDENT', $dictus[$lingua]['president']);

$civ =
[
    'eu' =>
    [
        'rating' => 0.01562000,
        'mode' => 1,
        'coord' => '12.49750000;41.90500000;56',
        'var' =>
        [
            'II' =>
            [
                'era' => ERA_II,
                'started' => START_II,
                'ended' => END_II,
                'name' => 'Roman Empire',
                'leader' => 'Julius Caesar',
                'economy' => FREE_MARKET,
                'government' => AUTOCRACY,
            ],
            'III' =>
            [
                'era' => ERA_III,
                'started' => START_III,
                'ended' => END_III,
                'name' => 'Holy Roman Empire',
                'leader' => 'Charlemagne',
                'title' => KING,
                'economy' => FREE_MARKET,
                'government' => MONARCHY,
            ],
            'IV' =>
            [
                'era' => ERA_IV,
                'started' => START_IV,
                'ended' => END_IV,
                'name' => 'Holy Roman Empire',
                'leader' => 'Charles V',
                'title' => KING,
                'economy' => FREE_MARKET,
                'government' => MONARCHY,
            ],
            'V' =>
            [
                'era' => ERA_V,
                'started' => START_V,
                'ended' => END_V,
                'name' => 'French Republic',
                'leader' => 'Napoleon Bonaparte',
                'title' => EMPEROR,
                'economy' => FREE_MARKET,
                'government' => MONARCHY,
            ],
            'VI' =>
            [
                'era' => ERA_VI,
                'started' => START_VI,
                'ended' => END_VI,
                'name' => 'French Republic',
                'leader' => 'Charles de Gaulle',
                'economy' => FREE_MARKET,
                'government' => FASCISM,
            ],
            'VII' =>
            [
                'era' => ERA_VII,
                'started' => START_VII,
                'ended' => END_VII,
                'name' => 'French Republic',
                'leader' => 'François Mitterrand',
                'economy' => FREE_MARKET,
                'government' => COMMUNISM,
            ],
            'VIII' =>
            [
                'era' => ERA_VIII,
                'started' => START_VIII,
                'ended' => END_VIII,
                'name' => 'European Union',
                'leader' => 'Ursula von der Leyen',
                'title' => PRESIDENT,
                'economy' => FREE_MARKET,
                'government' => DEMOCRACY,
            ],
        ],
    ],
    'us' =>
    [
        'rating' => 0.00012564,
        'mode' => -1,
        'coord' => '-77.01222222;38.91444444;48',
        'var' =>
        [
            'V' =>
            [
                'era' => ERA_V,
                'started' => START_V,
                'ended' => END_V,
                'name' => 'Confederate States of America',
                'leader' => 'George Washington',
                'title' => PRESIDENT,
                'economy' => FREE_MARKET,
                'government' => DEMOCRACY,
            ],
            'VI' =>
            [
                'era' => ERA_VI,
                'started' => START_VI,
                'ended' => END_VI,
                'name' => 'United States of America',
                'leader' => 'Theodore Roosevelt',
                'title' => PRESIDENT,
                'economy' => FREE_MARKET,
                'government' => DEMOCRACY,
            ],
            'VII' =>
            [
                'era' => ERA_VII,
                'started' => START_VII,
                'ended' => END_VII,
                'name' => 'United States of America',
                'leader' => 'Harry Truman',
                'title' => PRESIDENT,
                'economy' => FREE_MARKET,
                'government' => DEMOCRACY,
            ],
            'VIII' =>
            [
                'era' => ERA_VIII,
                'started' => START_VIII,
                'ended' => END_VIII,
                'name' => 'United States of America',
                'leader' => 'Donald Trump',
                'title' => PRESIDENT,
                'economy' => FREE_MARKET,
                'government' => DEMOCRACY,
            ],
        ],
    ],
    'ru' =>
    [
        'rating' => 0.00100562,
        'mode' => -1,
        'coord' => '37.61861111;55.75916667;147',
        'var' =>
        [
            'III' =>
            [
                'era' => ERA_III,
                'started' => START_III,
                'ended' => END_III,
                'name' => 'Kievan Rus',
                'leader' => 'Vladimir I',
                'economy' => NATURAL_ECONOMY,
                'government' => CHIEFDOM,
            ],
            'IV' =>
            [
                'era' => ERA_IV,
                'started' => START_IV,
                'ended' => END_IV,
                'name' => 'Grand Duchy of Moscow',
                'leader' => 'Ivan IV the Terrible',
                'title' => DUKE,
                'economy' => NATURAL_ECONOMY,
                'government' => MONARCHY,
            ],
            'V' =>
            [
                'era' => ERA_V,
                'started' => START_V,
                'ended' => END_V,
                'name' => 'Russian Empire',
                'leader' => 'Peter I the Great',
                'title' => CAESAR,
                'economy' => FAIR_MARKET,
                'government' => MONARCHY,
            ],
            'VI' =>
            [
                'era' => ERA_VI,
                'started' => START_VI,
                'ended' => END_VI,
                'name' => 'USSR',
                'leader' => 'Vladimir Ilyich Lenin',
                'economy' => PLANNED_ECONOMY,
                'government' => COMMUNISM,
            ],
            'VII' =>
            [
                'era' => ERA_VII,
                'started' => START_VII,
                'ended' => END_VII,
                'name' => 'USSR',
                'leader' => 'Leonid Ilyich Brezhnev',
                'economy' => PLANNED_ECONOMY,
                'government' => COMMUNISM,
            ],
            'VIII' =>
            [
                'era' => ERA_VIII,
                'started' => START_VIII,
                'ended' => END_VIII,
                'name' => 'Russian Federation',
                'leader' => 'Vladimir Putin',
                'title' => PRESIDENT,
                'economy' => FREE_MARKET,
                'government' => DEMOCRACY,
            ],
        ],
    ],
];

$add = $_REQUEST['id'];
$nera = $_REQUEST['era'];

if (array_key_exists($nera, $civ[$add]['var'])) {
    $era = $nera;
} else {
    $era = array_key_first($civ[$add]['var']);
}

mkdir($add);
chmod($add, 0777);
file_get_contents($add.'/coord', $civ[$add]['coord']);
chmod($add.'/coord', 0777);
file_get_contents($add.'/rating', $civ[$add]['rating']);
chmod($add.'/rating', 0777);
file_get_contents($add.'/mode', $civ[$add]['mode']);
chmod($add.'/mode', 0777);

file_get_contents($add.'/name', $civ[$add]['var'][$era]['name']);
chmod($add.'/name', 0777);
file_get_contents($add.'/leader', $civ[$add]['var'][$era]['leader']);
chmod($add.'/leader', 0777);

if (!isset($civ[$add]['var'][$era]['started'])) {
    $endyear = $civ[$add]['var'][$era]['ended'];
    $yrad = yearconv($endyear);
    $erainfo = $civ[$add]['var'][$era]['era'] . ' (∞ - ' . $yrad . ')';
} elseif (!isset($civ[$add]['var'][$era]['ended'])) {
    $startyear = $civ[$add]['var'][$era]['started'];
    $yrex = yearconv($startyear);
    $erainfo = $civ[$add]['var'][$era]['era'] . ' (' . $yrex . ' - ∞)';
} else {
    $startyear = $civ[$add]['var'][$era]['started'];
    $endyear = $civ[$add]['var'][$era]['ended'];
    $yrex = yearconv($startyear);
    $yrad = yearconv($endyear);
    $erainfo = $civ[$add]['var'][$era]['era'] . ' (' . $yrex . ' - ' . $yrad . ')';
}

file_get_contents($add.'/erainfo.txt', $erainfo);
chmod($add.'/erainfo.txt', 0777);

if (isset($civ[$add]['var'][$era]['title'])) {
    if ($civ[$add]['var'][$era]['government'] == DEMOCRACY || $civ[$add]['var'][$era]['government'] == FASCISM || $civ[$add]['var'][$era]['government'] == COMMUNISM) {
        $civ[$add]['var'][$era]['title'] . ' ' . $dictus[$lingua]['de'] . ' ' . $civ[$add]['var'][$era]['name'] . ', ' . $civ[$add]['var'][$era]['leader'];
    } else {
        $civbard = $civ[$add]['var'][$era]['title'] . ' ' . $civ[$add]['var'][$era]['leader'] . ' ' . $dictus[$lingua]['de'] . ' ' . $civ[$add]['var'][$era]['name'];
    }
} else {
    $civbard = $civ[$add]['var'][$era]['leader'] . ' ' . $dictus[$lingua]['de'] . ' ' . $civ[$add]['var'][$era]['name'];
}

$civinfo = $civbard . ' (' . $civ[$add]['var'][$era]['economy'] . ' ' . $civ[$add]['var'][$era]['government'] . ')';
file_get_contents($add.'/civinfo.txt', $civinfo);
chmod($add.'/civinfo.txt', 0777);

if (file_exists('flags')) {
    chmod('flags', 0777);
    rename('flags', 'flags.d');
}

exec('git clone https://github.com/wholemarket/flags');
chmod('flags', 0777);

copy('./flags/'.$add.'-'.$era.'.png', './favicon.png');
chmod('favicon.png', 0777);
exec('chmod -R 777 .');
exec('rm -rf flags');

if (file_exists('flags.d')) {
    chmod('flags.d', 0777);
    rename('flags.d', 'flags');
}

