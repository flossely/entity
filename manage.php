<?php
$dir = '.';
$mode = $_POST['mode'];
if ($mode == 'merge') {
    $id = $_POST['entity'];
    $concat = '';
    if (!file_exists($id)) {
        mkdir($id);
        chmod($id, 0777);
        $list = $_POST['entities'];
        $entities = explode(';', $list);
        $count = count($entities);
        $rating = 0;
        $modeArr = [];
        foreach ($entities as $key=>$value) {
            if (strpos($value, ':') !== false) {
                $entPart = explode(':', $value);
                $entID = $entPart[0];
                $entFiles = $entPart[1];
                $entFileList = explode(',', $entFiles);
                foreach ($entFileList as $iter=>$file) {
                    chmod($entID.'/'.$file, 0777);
                    if (file_exists($id.'/'.$file)) {
                        $finFile = $concat.$file;
                        rename($entID.'/'.$file, $id.'/'.$finFile);
                        chmod($id.'/'.$finFile, 0777);
                    } else {
                        rename($entID.'/'.$file, $id.'/'.$file);
                        chmod($id.'/'.$file, 0777);
                    }
                }
            } else {
                $entID = $value;
            }
            $entRating = file_get_contents($entID.'/rating');
            $entMode = file_get_contents($entID.'/mode');
            $rating += $entRating;
            $modeArr[] = $entMode;
            $concat .= '#';
            chmod($entID, 0777);
            exec('rm -rf '.$entID);
        }
        $slice = array_slice($modeArr, 0, $count);
        $result = round((array_sum($slice) / sizeof($slice)), 0);
        if ($result > 0) {
            $finRes = 1;
        } elseif ($result < 0) {
            $finRes = -1;
        } else {
            $finRes = 0;
        }
        file_put_contents($id.'/rating', $rating);
        chmod($id.'/rating', 0777);
        file_put_contents($id.'/mode', $finRes);
        chmod($id.'/mode', 0777);
    }
} elseif ($mode == 'divide') {
    $id = $_POST['entity'];
    $concat = '#';
    $rating = file_get_contents($id.'/rating');
    $itmode = file_get_contents($id.'/mode');
    $list = $_POST['entities'];
    $entities = explode(';', $list);
    $count = count($entities);
    foreach ($entities as $key=>$value) {
        if (strpos($value, ':') !== false) {
            $entPart = explode(':', $value);
            $entID = $entPart[0];
            $entRating = round(($rating / $count), 0);
            $entMode = $itmode;
            $entFiles = $entPart[1];
            $entFileList = explode(',', $entFiles);
            if (!file_exists($entID)) {
                mkdir($entID);
                chmod($entID, 0777);
                file_put_contents($entID.'/rating', $entRating);
                chmod($entID.'/rating', 0777);
                file_put_contents($entID.'/mode', $entMode);
                chmod($entID.'/mode', 0777);
                foreach ($entFileList as $iter=>$file) {
                    chmod($id.'/'.$file, 0777);
                    if (strpos($file, $concat) !== false) {
                        $finFile = str_replace($concat, '', $file);
                        copy($id.'/'.$file, $entID.'/'.$finFile);
                        chmod($entID.'/'.$finFile, 0777);
                    } else {
                        copy($id.'/'.$file, $entID.'/'.$file);
                        chmod($entID.'/'.$file, 0777);
                    }
                }
            }
        } else {
            $entID = $value;
            $entRating = round(($rating / $count), 0);
            $entMode = $itmode;
            if (!file_exists($entID)) {
                mkdir($entID);
                chmod($entID, 0777);
                file_put_contents($entID.'/rating', $entRating);
                chmod($entID.'/rating', 0777);
                file_put_contents($entID.'/mode', $entMode);
                chmod($entID.'/mode', 0777);
            }
        }
    }
    chmod($id, 0777);
    exec('rm -rf '.$id);
}
