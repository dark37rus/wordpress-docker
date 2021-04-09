<?php
function dataSet($array = []){
    $requst = '';

    if (is_array($array)){
        foreach ($array as $key => $item){
            $requst = $requst . ' data-' . $key . '="' . $item . '"';
        }
    }

    echo $requst;
}

function dataGet($array = []){
    $requst = '';

    if (is_array($array)){
        foreach ($array as $key => $item){
            $requst = $requst . ' data-' . $key . '="' . $item . '"';
        }
    }

    return $requst;
}

function getExtension($filename) {
    $path_info = pathinfo($filename);
    return $path_info['extension'];
}

