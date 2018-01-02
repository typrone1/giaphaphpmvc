<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 26/12/2017
 * Time: 8:02 PM
 */

namespace App\Models;


use Core\Model;
use PDO;

class SuKien extends Model
{
    public $errors = [];

    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM sukien ORDER BY MONTH(sukien.NgayDienRa), DAYOFMONTH(sukien.NgayDienRa)');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $sql = 'SELECT * FROM SuKien LEFT JOIN hoso ON sukien.MaHoSo = hoso.MaHoSo WHERE MaSuKien = :id';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();
        return $stmt->fetch();
    }

    public function save()
    {
        if (empty($this->errors)) {
            $sql = 'INSERT INTO sukien (TenSuKien, NoiDung, NgayDienRa, MaHoSo)
            VALUES (:tenSK, :noiDung, :ngayDienRa, :maHoSo)';
            $db = static::getDB();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':tenSK', $this->tenSuKien, PDO::PARAM_STR);
            $stmt->bindValue(':noiDung', $this->noiDung, PDO::PARAM_STR);
            $stmt->bindValue(':ngayDienRa', $this->ngayDienRa, PDO::PARAM_STR);
            $stmt->bindValue(':maHoSo', isset($this->maHoSo) ? $this->maHoSo : null, PDO::PARAM_STR);
            return $stmt->execute();
        }
        return false;
    }

    public function delete()
    {
        $sql = 'DELETE FROM sukien
                WHERE MaSuKien = :maSuKien';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':maSuKien', $this->MaSuKien, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = 'UPDATE sukien SET TenSuKien = :tenSuKien, NoiDung = :noiDung,
                                  DiaDiem = :diaDiem, NgayDienRa = :ngayDienRa, 
                                  maHoSo = :maHoSo, TrangThai = :trangThai 
                                  WHERE MaSuKien = :maSuKien';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':maSuKien', $this->MaSuKien, PDO::PARAM_INT);
        $stmt->bindValue(':tenSuKien', $data['tenSuKien'], PDO::PARAM_STR);
        $stmt->bindValue(':noiDung', $data['noiDung'], PDO::PARAM_STR);
        $stmt->bindValue(':diaDiem', $data['diaDiem'], PDO::PARAM_STR);
        $stmt->bindValue(':ngayDienRa', $data['ngayDienRa'], PDO::PARAM_STR);
        $stmt->bindValue(':maHoSo', ($data['maHoSo']!='')?$data['maHoSo']:null, PDO::PARAM_INT);
        $stmt->bindValue(':trangThai', $data['trangThai'], PDO::PARAM_INT);
        return $stmt->execute();
    }
}