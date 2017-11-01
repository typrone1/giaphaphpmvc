<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 05/10/2017
 * Time: 9:01 AM
 */
namespace App\Models;

use Core\Model;
use PDO;

class HoSo extends Model
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
        $stmt = $db->query('SELECT * FROM hoso');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getSearch($tuKhoa = '')
    {
        $db = static::getDB();
        $query = "SELECT * FROM hoso WHERE hoten LIKE ?";
        $params = array("%$tuKhoa%");
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function find($maHoSo)
    {
        $sql = 'SELECT * FROM HoSo
                WHERE mahoso = :mahoso';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':mahoso', $maHoSo, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();

        return $stmt->fetch();
    }

    public static function findAllByParent($maHoSoBo)
    {
        $ketnoi = mysqli_connect("localhost", "root", "",'mvc');
        mysqli_query($ketnoi, "set names utf8");
        $sql = 'SELECT * FROM HoSo ';
        if (!isset($maHoSoBo)){
            $sql.= 'WHERE mahosobo is null';
        } else {
            $sql.= 'WHERE mahosobo = '.$maHoSoBo;
        }
        $query = $ketnoi->query($sql);
        while ($row = mysqli_fetch_object($query))
        {
            $array[] = $row;
        }
        return $array;

    }

    public function save()
    {
        $this->validate();
        if (empty($this->errors)) {
            $sql = 'INSERT INTO HoSo (MaHoToc, HoTen, NgaySinh, GioiTinh, DoiThu, ConThu, MaHoSoBo)
            VALUES (1, :hoTen, :ngaySinh, :gioiTinh, :doiThu, :conThu, :maHoSoBo)';
            $db = static::getDB();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':hoTen', $this->hoTen, PDO::PARAM_STR);
            $stmt->bindValue(':ngaySinh', $this->ngaySinh);
            $stmt->bindValue(':gioiTinh', 'Nam', PDO::PARAM_STR);
            $stmt->bindValue(':doiThu', $this->doiThu, PDO::PARAM_INT);
            $stmt->bindValue(':conThu', $this->conThu, PDO::PARAM_INT);
            $stmt->bindValue(':maHoSoBo', $this->maHoSoBo?$this->maHoSoBo: null, PDO::PARAM_INT);
            return $stmt->execute();
        }
    }

    public function validate()
    {
        if ($this->hoTen == '') {
            $this->errors[] = 'Name is required';
        }
    }

    public static function getDuLieuGiaPha()
    {
        $sql = 'SELECT hoso.mahoso,hoso.hoten,hosongoaitoc.hoten as hotenvo, mahosobo,hoso.ngaysinh,hoso.ngaymat, hoso.doithu, hoso.conthu FROM hoso LEFT JOIN
 hosongoaitoc ON hosongoaitoc.mahoso = hoso.mahoso GROUP by hoso.mahoso';
        $db = static::getDB();
        $stmt = $db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}