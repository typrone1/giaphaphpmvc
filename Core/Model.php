<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 21/09/2017
 * Time: 10:45 PM
 */
namespace Core;
use App\Config;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;
        if ($db === null) {
            $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
            $db = new \PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
            // Throw an Exception when an error occurs
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return $db;
    }
}