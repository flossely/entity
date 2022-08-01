<?php

if (file_exists('year')) {
    $today = file_get_contents('year');
} else {
    $today = -2000;
}

// GETTING REQUEST DATA SORTED BY THEIR ORDER IN GET FUNCTION
$key = $_REQUEST['key'];
$host = ($_REQUEST['host']) ? $_REQUEST['host'] : 'https://github.com';
$pkg = $_REQUEST['pkg'];
$repo = $_REQUEST['repo'];
$branch = ($_REQUEST['branch']) ? $_REQUEST['branch'] : '';
$user = $_REQUEST['user'];

// IN CASE YOU WANT TO INSTALL OR UPDATE PACKAGE
if ($key == 'i') {
    if ($pkg == "from" && $repo != "" && $user != "") {
        // REMOVE PACKAGE IF EXISTING
        if (file_exists($repo)) {
            exec('chmod -R 777 .');
            exec('rm -rf '.$repo);
        }
        
        // READY TO INSTALL PACKAGE
        $request = $host.'/'.$user.'/'.$repo;
        if ($branch != '') {
            exec('git clone -b '.$branch.' '.$request);
        } else {
            exec('git clone '.$request);
        }
        chmod($repo, 0777);
        exec('chmod -R 777 .');
        // AFTER INSTALLATION
        file_put_contents($repo.'/coord', '0;0;0');
        chmod($repo.'/coord', 0777);
        file_put_contents($repo.'/mode', 0);
        chmod($repo.'/mode', 0777);
        file_put_contents($repo.'/rating', 0);
        chmod($repo.'/rating', 0777);
        file_put_contents($repo.'/score', 0);
        chmod($repo.'/score', 0777);
        file_put_contents($repo.'/money', 0);
        chmod($repo.'/money', 0777);
        file_put_contents($repo.'/age', 0);
        chmod($repo.'/age', 0777);
        file_put_contents($repo.'/born', $today);
        chmod($repo.'/born', 0777);
    }
    
// IN CASE YOU WANT TO REPLACE PACKAGE WITH NEW
} elseif ($key == 'r') {
    if ($pkg != "" && $repo != "" && $user != "") {
        // REMOVING THE FORMER PACKAGE
        if (file_exists($pkg)) {
            exec('chmod -R 777 .');
            exec('rm -rf '.$pkg);
        }
        header('Location: getdir.php?key=i&host='.$host.'&pkg=from&repo='.$repo.'&branch='.$branch.'&user='.$user);
    }

// IN CASE YOU WANT TO REMOVE PACKAGE
} elseif ($key == 'd') {
    if ($pkg != "" && $repo == 'from' && $user == 'here') {
        if (file_exists($pkg)) {
            exec('chmod -R 777 .');
            exec('rm -rf '.$pkg);
        }
    }
}
