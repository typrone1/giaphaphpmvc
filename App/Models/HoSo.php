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
        $array = [];
        $ketnoi = mysqli_connect("localhost", "root", "",'giaphadb');
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
        $file_max_weight = 1000000; //limit the maximum size of file allowed (20Mb)
        $ok_ext = array('jpg','png','gif','jpeg'); // allow only these types of files
        $destination = '../public/images/AnhHoSo/'; // where our files will be stored
        $file = $_FILES['hinhAnh'];
        $fileNewName ='';
        if (
            !isset($_FILES['hinhAnh']['error']) ||
            is_array($_FILES['hinhAnh']['error'])
        ) {
            throw new \RuntimeException('Invalid parameters.');
        }
        else {
            $filename = explode(".", $file["name"]);
            $file_name = $file['name']; // file original name

            $file_name_no_ext = isset($filename[0]) ? $filename[0] : null; // File name without the extension

            $file_extension = $filename[count($filename)-1];

            $file_weight = $file['size'];

            $file_type = $file['type'];
            if( $file['error'] == 0 )
            {
                // check if the extension is accepted
                if( in_array($file_extension, $ok_ext)):

                    // check if the size is not beyond expected size
                    if( $file_weight <= $file_max_weight ):


                        // rename the file
                        $fileNewName = md5( $file_name_no_ext[0].microtime() ).'.'.$file_extension ;


                        // and move it to the destination folder
                        if( move_uploaded_file($file['tmp_name'], $destination.$fileNewName) ):

                            echo" File uploaded !";

                        else:

                            echo "can't upload file.";

                        endif;


                    else:

                        echo "File too heavy.";

                    endif;


                else:

                    echo "File type is not supported.";

                endif;
            }
        }
        if (empty($this->errors)) {
            $sql = 'INSERT INTO HoSo (MaHoToc, HoTen, NgaySinh, GioiTinh, DoiThu, ConThu, MaHoSoBo, HinhAnh)
            VALUES (1, :hoTen, :ngaySinh, :gioiTinh, :doiThu, :conThu, :maHoSoBo, :hinhAnh)';
            $db = static::getDB();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':hoTen', $this->hoTen, PDO::PARAM_STR);
            $stmt->bindValue(':ngaySinh', $this->ngaySinh);
            $stmt->bindValue(':gioiTinh', $this->gioiTinh, PDO::PARAM_STR);
            $stmt->bindValue(':doiThu', $this->doiThu, PDO::PARAM_INT);
            $stmt->bindValue(':conThu', $this->conThu, PDO::PARAM_INT);
            $stmt->bindValue(':maHoSoBo', isset($this->maHoSoBo)?$this->maHoSoBo: null, PDO::PARAM_INT);
            $stmt->bindValue(':hinhAnh', $fileNewName, PDO::PARAM_STR);
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
        $sql = 'SELECT hoso.mahoso,hoso.hoten,hosongoaitoc.hoten as hotenvo, mahosobo,hoso.ngaysinh,hoso.ngaymat, hoso.doithu, hoso.conthu, hoso.gioitinh FROM hoso LEFT JOIN
 hosongoaitoc ON hosongoaitoc.mahoso = hoso.mahoso GROUP by hoso.mahoso';
        $db = static::getDB();
        $stmt = $db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function deleteHoSo(){
        $sql = 'DELETE FROM HoSo
                WHERE mahoso = :mahoso';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':mahoso', $this->MaHoSo, PDO::PARAM_STR);
        $stmt->execute();
    }
    public static function findByChi($chiThu)
    {
        $sql = 'SELECT * FROM HoSo
                WHERE ChiThu = :chiThu';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':chiThu', $chiThu, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();
        return $stmt->fetch();
    }
}