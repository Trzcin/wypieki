<?php

use MongoDB\BSON\ObjectID;

class Database
{
    protected static $username = 'wai_web';
    protected static $password = 'w@i_w3b';
    protected static $uri = 'mongodb://localhost:27017/wai';

    public static function get_db(): MongoDB\Database
    {
        try {
            $mongo = new MongoDB\Client(
                self::$uri,
                [
                    'username' => self::$username,
                    'password' => self::$password
                ]
            );
        } catch (Exception $err) {
            die($err);
        }

        $db = $mongo->wai;
        return $db;
    }

    public static function toObjectIDArray($string_ids)
    {
        $map_func = function ($val) {
            return new ObjectID($val);
        };
        return array_map($map_func, $string_ids);
    }
}
