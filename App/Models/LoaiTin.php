<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 26/10/2017
 * Time: 11:04 PM
 */

namespace App\Models;


use Core\Model;
use PDO;
class LoaiTin extends Model
{
    public $errors = [];

    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function save(){
        $sql = 'INSERT INTO LoaiTin (TenLoaiTin)
            VALUES (:tenLoaiTin)';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':tenLoaiTin', $this->tenLoaiTin, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM LoaiTin');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}