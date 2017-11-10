<?php
/**
 * Created by PhpStorm.
 * User: praktikant
 * Date: 10.11.2017
 * Time: 12:15
 */

class Config{

    private static $registry = Array();

    public static function set($key,$value){
        self::$registry[$key] = $value;
    }

    public static function get($key){
        if(array_key_exists($key,self::$registry)){
            return self::$registry[$key];
        }
        return false;
    }
}
