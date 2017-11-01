<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 26/10/2017
 * Time: 4:14 PM
 */

namespace App\Models;
use Core\Model;
use PDO;

class BaiViet extends Model
{
    public $errors = [];

    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }
    public function save(){
        $sql = 'INSERT INTO BaiViet (MaLoaiTin, TieuDe, NoiDung)
            VALUES (:maLoaiTin, :tieuDe, :noiDung)';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':maLoaiTin', $this->maLoaiTin, PDO::PARAM_INT);
        $stmt->bindValue(':tieuDe', $this->tieuDe, PDO::PARAM_STR);
        $stmt->bindValue(':noiDung', $this->noiDung, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM BaiViet');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function findOne($maBaiViet)
    {
        $sql = 'SELECT * FROM BaiViet
                WHERE mabaiviet = :mabaiviet';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':mabaiviet', $maBaiViet, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();
        return $stmt->fetch();
    }
}