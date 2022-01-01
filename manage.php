<?php
$dir = '.';
$mode = $_POST['mode'];
$id = $_POST['id'];
$data = $_POST['data'];
$sequence = explode(';', $data);
$count = count($sequence);
$last = $count - 1;
if ($mode == 'init') {
    foreach ($sequence as $key=>$value) {
        if (!file_exists($value)) {
            mkdir($value);
            chmod($value, 0777);
            file_put_contents($value.'/rating', 0);
            chmod($value.'/rating', 0777);
            file_put_contents($value.'/mode', 0);
            chmod($value.'/mode', 0777);
        }
    }
} elseif ($mode == 'kill') {
    foreach ($sequence as $key=>$value) {
        if ($value != '' && file_exists($value)) {
            chmod($value, 0777);
            exec('rm -rf '.$value);
        }
    }
} elseif ($mode == 'merge') {
    if (!file_exists($id)) {
        mkdir($id);
        chmod($id, 0777);
        $finRating = 0;
        $modeArr = [];
        $concat = '';
        foreach ($sequence as $key=>$value) {
            if (strpos($value, ':') !== false) {
                $entPart = explode(':', $value);
                $entID = $entPart[0];
                $entFiles = $entPart[1];
                $entFileList = explode(',', $entFiles);
                if (in_array('mode', $entFileList) && in_array('rating', $entFileList)) {
                    unset($entFileList[array_search('mode', $entFileList)]);
                    unset($entFileList[array_search('rating', $entFileList)]);
                }
                foreach ($entFileList as $iter=>$file) {
                    $fullFile = $concat.$file;
                    chmod($entID.'/'.$file, 0777);
                    rename($entID.'/'.$file, $id.'/'.$fullFile);
                    chmod($id.'/'.$fullFile, 0777);
                }
            } else {
                $entID = $value;
                $entFiles = str_replace($dir.'/'.$entID.'/','',(glob($dir.'/'.$entID.'/*')));
                if (in_array('mode', $entFiles) && in_array('rating', $entFiles)) {
                    unset($entFiles[array_search('mode', $entFiles)]);
                    unset($entFiles[array_search('rating', $entFiles)]);
                }
                foreach ($entFiles as $iter=>$file) {
                    $fullFile = $concat.$file;
                    chmod($entID.'/'.$file, 0777);
                    rename($entID.'/'.$file, $id.'/'.$fullFile);
                    chmod($id.'/'.$fullFile, 0777);
                }
            }
            $entRating = file_get_contents($entID.'/rating');
            $entMode = file_get_contents($entID.'/mode');
            $addRating = ($entRating > 0) ? $entRating : 1;
            $finRating += $addRating;
            $modeArr[] = $entMode;
            $concat .= '#';
            chmod($entID, 0777);
            exec('rm -rf '.$entID);
        }
        $slice = array_slice($modeArr, 0, $count);
        $result = round((array_sum($slice) / sizeof($slice)), 0);
        if ($result > 0) {
            $finMode = 1;
        } elseif ($result < 0) {
            $finMode = -1;
        } else {
            $finMode = 0;
        }
        file_put_contents($id.'/rating', $finRating);
        chmod($id.'/rating', 0777);
        file_put_contents($id.'/mode', $finMode);
        chmod($id.'/mode', 0777);
    }
} elseif ($mode == 'divide') {
    $rating = file_get_contents($id.'/rating');
    $itmode = file_get_contents($id.'/mode');
    $concat = '';
    $revConcat = '';
    for ($i = 0; $i < $last; $i++) {
        $revConcat .= '#';
    }
    foreach ($sequence as $key=>$value) {
        if (strpos($value, ':') !== false) {
            $entPart = explode(':', $value);
            $entID = $entPart[0];
            $entRating = round(($rating / $count), 0);
            $entMode = $itmode;
            $entFiles = $entPart[1];
            $entFileList = explode(',', $entFiles);
            if (in_array('mode', $entFileList) && in_array('rating', $entFileList)) {
                unset($entFileList[array_search('mode', $entFileList)]);
                unset($entFileList[array_search('rating', $entFileList)]);
            }
            if (!file_exists($entID)) {
                mkdir($entID);
                chmod($entID, 0777);
                foreach ($entFileList as $iter=>$file) {
                    chmod($id.'/'.$file, 0777);
                    copy($id.'/'.$file, $entID.'/'.$file);
                    chmod($entID.'/'.$file, 0777);
                }
                file_put_contents($entID.'/rating', $entRating);
                chmod($entID.'/rating', 0777);
                file_put_contents($entID.'/mode', $entMode);
                chmod($entID.'/mode', 0777);
            }
        } else {
            $entID = $value;
            $entRating = round(($rating / $count), 0);
            $entMode = $itmode;
            if ($revConcat == $concat) {
                $entFiles = str_replace($dir.'/'.$id.'/','',(glob($dir.'/'.$id.'/'.$concat.'*')));
            } else {
                $entFiles = str_replace($dir.'/'.$id.'/'.$revConcat,'',(glob($dir.'/'.$id.'/'.$concat.'*')));
            }
            if (in_array('mode', $entFiles) && in_array('rating', $entFiles)) {
                unset($entFiles[array_search('mode', $entFiles)]);
                unset($entFiles[array_search('rating', $entFiles)]);
            }
            if (!file_exists($entID)) {
                mkdir($entID);
                chmod($entID, 0777);
                foreach ($entFiles as $iter=>$file) {
                    $fullFile = str_replace('#', '', $file);
                    chmod($id.'/'.$file, 0777);
                    copy($id.'/'.$file, $entID.'/'.$fullFile);
                    chmod($entID.'/'.$fullFile, 0777);
                }
                file_put_contents($entID.'/rating', $entRating);
                chmod($entID.'/rating', 0777);
                file_put_contents($entID.'/mode', $entMode);
                chmod($entID.'/mode', 0777);
            }
        }
        $concat .= '#';
        $revConcat = ltrim($revConcat, '#');
    }
    chmod($id, 0777);
    exec('rm -rf '.$id);
}
