<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 21/09/2017
 * Time: 10:51 PM
 */
namespace App\Models;
use Core\Model;

class Post extends Model
{
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT title FROM posts');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}