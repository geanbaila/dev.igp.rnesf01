<?php

/**
 * Elimina los espacios en blanco extra de un string.
 * @param $strig : String con espacios en blanco extra.
 * @return mixed : string sin espacios en blanco extra.
 */
function clean_extra_whitespaces($strig){
    return preg_replace('/\s+/', ' ', trim($strig));
}

function current_time(){
    return \Carbon\Carbon::now();
}

function current_date(){
    return \Carbon\Carbon::today();
}

function str_without_ending($str, $unwanted){
    if (ends_with($str,$unwanted)){
        return mb_substr($str, 0, (mb_strlen($str,'utf-8')-mb_strlen($unwanted,'utf-8')), 'utf-8');
    }
    return $str;
}

function str_without_starting($str, $unwanted){
    if (starts_with($str,$unwanted)){
        return mb_substr($str, mb_strlen($unwanted,'utf-8'), (mb_strlen($str,'utf-8')-1), 'utf-8');
    }
    return $str;
}

function safe_url_encrypt($url){
    return str_replace('=','',encrypt($url));
}

function save_file($params = array()){
    $file =  $params['file'];
    $folder = key_exists('folder',$params)?$params['folder']:'';
    $file_name = key_exists('file_name',$params)?$params['file_name']:null;
    $disk = key_exists('disk',$params)?$params['disk']:'public';

    if (!empty($file_name))
        return $file->storeAs($folder, $file_name, $disk);
    return $file->store($folder, $disk);
}

/**
 * Comprueba si la cadena o número es entero
 * @param $number
 * @return bool
 */
function is_full_integer($number){
    return (ctype_digit($number) || is_integer($number));
}


function str_pluralize($word, $number, $word_to_plural){
    if ($number < 2) return $word;
    return $word_to_plural;
}