<?php
/**
 * Class SiteLang
 */

class SiteLang
{
    public static $current_lang;

    public static function set_lang($lang){
        self::$current_lang = $lang;
    }

    public static function translate_string($string){

        $matches;
        $array = preg_split('/(\[:..\]|\[:\])/', $string, false, PREG_SPLIT_NO_EMPTY);
        $langs = preg_match_all('/(\[:..\])/', $string, $matches, PREG_SET_ORDER);

        var_dump($matches);
        return $string;
    }

    public static function trans( $ru  = "", $en  = "", $zh = "" ) {

        switch ( self::$current_lang ) {
            case "ru":
                echo $ru;
                break;
            case "en":
                echo $en;
                break;
            case "zh":
                echo $zh;
                break;
            default:
                echo $ru;
        }
    }

    public static function get_trans( $ru  = "", $en  = "", $zh = "" ) {

        switch ( self::$current_lang ) {
            case "ru":
                return $ru;
            case "en":
                return $en;
            case "zh":
                return $zh;
            default:
                return $ru;
        }
    }
}
