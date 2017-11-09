<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 26/10/2017
 * Time: 3:11 PM
 */

namespace App\Models;
use PDO;

use Core\Model;

class HoSoNgoaiToc extends Model
{
    public $errors = [];

    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }
    public function save()
    {
        $this->validate();
        if (empty($this->errors)) {
            $sql = 'INSERT INTO HoSoNgoaiToc (MaHoSo, HoTenBo, HoTenMe, HoTen, NgaySinh, GioiTinh, DoiThu, ConThu)
            VALUES (:maHoSo, :hoTenBo, :hoTenMe, :hoTen, :ngaySinh, :gioiTinh, :doiThu, :conThu)';
            $db = static::getDB();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':maHoSo', $this->maHoSo, PDO::PARAM_INT);
            $stmt->bindValue(':hoTenBo', $this->hoTenBo, PDO::PARAM_STR);
            $stmt->bindValue(':hoTenMe', $this->hoTenMe, PDO::PARAM_STR);
            $stmt->bindValue(':hoTen', $this->hoTen, PDO::PARAM_STR);
            $stmt->bindValue(':ngaySinh', $this->ngaySinh);
            $stmt->bindValue(':gioiTinh', 'Nam', PDO::PARAM_STR);
            $stmt->bindValue(':doiThu', $this->doiThu, PDO::PARAM_INT);
            $stmt->bindValue(':conThu', $this->conThu, PDO::PARAM_INT);
            return $stmt->execute();
        }
    }

    public function validate()
    {
        if ($this->hoTen == '') {
            $this->errors[] = 'Name is required';
        }
    }
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM hosongoaitoc');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function find($maHoSo)
    {
        $sql = 'SELECT * FROM HoSoNgoaiToc
                WHERE mahoso = :mahoso';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':mahoso', $maHoSo, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();

        return $stmt->fetch();
    }
}