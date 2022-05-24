<?php

/**
 * 
 * Scrabler Function
 * 
 */

function displa_key($key){
    printf(" value = '%s' ", $key);
}

function scrambleData($originalData, $key){
    $originalKey = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $data = '';
    $length = strlen($originalData);
    for($i = 0; $i<$length; $i++){
        $currenChar = $originalData[$i];
        $position = strpos($originalKey, $currenChar);
        if($position !== false){
            $data .= $key[$position];
        }else{
            $data .= $currenChar;
        }
    }

    return $data;
}

//data decode
function decodeData($originalData, $key){
    $originalKey = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $data = '';
    $length = strlen($originalData);
    for($i = 0; $i<$length; $i++){
        $currenChar = $originalData[$i];
        $position = strpos($key, $currenChar);
        if($position !== false){
            $data .= $originalKey[$position];
        }else{
            $data .= $currenChar;
        }
    }

    return $data;
}