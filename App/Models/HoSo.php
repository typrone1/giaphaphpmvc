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

    public static function getSearch($tuKhoa = '', $option = 'all')
    {
        $db = static::getDB();
        $query = "SELECT * FROM hoso WHERE hoten LIKE ?";
        if ($option == 'hoTenBo') {
            $query = "SELECT * FROM hoso AS t1 LEFT JOIN hoso AS t2 ON t2.MaHoSoBo = t1.MaHoSo WHERE t1.hoten LIKE ? AND t2.MaHoSo IS NOT NULL";
        } else if ($option == 'namSinh') {
            $query = "select * from hoso WHERE YEAR(NgaySinh) = ?";
        }
        $params = array("%$tuKhoa%");
        if ($option == 'namSinh') {
            $params = array($tuKhoa);
        }
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
        $ketnoi = mysqli_connect("localhost", "root", "", 'giaphadb');
        mysqli_query($ketnoi, "set names utf8");
        $sql = 'SELECT * FROM HoSo ';
        if (!isset($maHoSoBo)) {
            $sql .= 'WHERE mahosobo is null';
        } else {
            $sql .= 'WHERE mahosobo = ' . $maHoSoBo;
        }
        $query = $ketnoi->query($sql);
        while ($row = mysqli_fetch_object($query)) {
            $array[] = $row;
        }
        return $array;

    }

    public function save()
    {
        $this->validate();
        $file_max_weight = 1000000; //limit the maximum size of file allowed (20Mb)
        $ok_ext = array('jpg', 'png', 'gif', 'jpeg'); // allow only these types of files
        $destination = '../public/images/AnhHoSo/'; // where our files will be stored
        $file = $_FILES['hinhAnh'];
        $fileNewName = '';
        if (!isset($_FILES['hinhAnh']['error']) ||
            is_array($_FILES['hinhAnh']['error'])
        ) {
            throw new \RuntimeException('Invalid parameters.');
        } else {
            $filename = explode(".", $file["name"]);
            $file_name = $file['name']; // file original name

            $file_name_no_ext = isset($filename[0]) ? $filename[0] : null; // File name without the extension

            $file_extension = $filename[count($filename) - 1];

            $file_weight = $file['size'];

            $file_type = $file['type'];
            if ($file['error'] == 0) {
                // check if the extension is accepted
                if (in_array($file_extension, $ok_ext)):

                    // check if the size is not beyond expected size
                    if ($file_weight <= $file_max_weight):


                        // rename the file
                        $fileNewName = md5($file_name_no_ext[0] . microtime()) . '.' . $file_extension;
                        // and move it to the destination folder
                        if (move_uploaded_file($file['tmp_name'], $destination . $fileNewName)):

                            echo " File uploaded !";

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
            $sql = 'INSERT INTO HoSo 
            (MaHoToc, HoTen, NgaySinh, GioiTinh, DoiThu, ConThu, MaHoSoBo, MaHoSoMe, HinhAnh, sdt, DiaChi, Email, NgayMat, NoiAnTang, QueQuan)
            VALUES (
            1, :hoTen, :ngaySinh, :gioiTinh, :doiThu, :conThu, :maHoSoBo,:maHoSoMe, :hinhAnh, :sdt, :diaChi, :email, :ngayMat, :noiAnTang, :queQuan)';
            $db = static::getDB();
            $stmt = $db->prepare($sql);
//            var_dump($this);
//            die();
            $stmt->bindValue(':hoTen', $this->hoTen, PDO::PARAM_STR);
            $stmt->bindValue(':ngaySinh', $this->ngaySinh);
            $stmt->bindValue(':gioiTinh', $this->gioiTinh);
            $stmt->bindValue(':doiThu', $this->doiThu, PDO::PARAM_INT);
            $stmt->bindValue(':conThu', $this->conThu, PDO::PARAM_INT);
            $stmt->bindValue(':maHoSoBo', isset($this->maHoSoBo) ? $this->maHoSoBo : null, PDO::PARAM_INT);
            $stmt->bindValue(':maHoSoMe', isset($this->maHoSoMe) ? $this->maHoSoMe : null, PDO::PARAM_INT);
            $stmt->bindValue(':sdt', $this->sdt, PDO::PARAM_STR);
            $stmt->bindValue(':diaChi', $this->diaChi, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':ngayMat', $this->ngayMat, PDO::PARAM_STR);
            $stmt->bindValue(':noiAnTang', $this->noiAnTang, PDO::PARAM_STR);
            $stmt->bindValue(':queQuan', $this->queQuan, PDO::PARAM_STR);
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
        $sql = 'SELECT hoso.mahoso, hoso.mahosome,hoso.hoten,hosongoaitoc.hoten as hotenvo, hoso.quequan, mahosobo,hoso.ngaysinh,hoso.ngaymat, hoso.doithu, hoso.conthu, hoso.gioitinh FROM hoso LEFT JOIN
 hosongoaitoc ON hosongoaitoc.mahoso = hoso.mahoso GROUP by hoso.mahoso';
        $db = static::getDB();
        $stmt = $db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteHoSo()
    {
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

    function updatePicture($data)
    {
        $file_max_weight = 1000000; //limit the maximum size of file allowed (20Mb)
        $ok_ext = array('jpg', 'png', 'gif', 'jpeg'); // allow only these types of files
        $destination = '../public/images/AnhHoSo/'; // where our files will be stored
        $file = $_FILES['hinhAnh'];
        $fileNewName = '';
        if (!isset($_FILES['hinhAnh']['error']) ||
            is_array($_FILES['hinhAnh']['error'])
        ) {
            throw new \RuntimeException('Invalid parameters.');
        } else {
            $filename = explode(".", $file["name"]);
            $file_name = $file['name']; // file original name
            $file_name_no_ext = isset($filename[0]) ? $filename[0] : null; // File name without the extension
            $file_extension = $filename[count($filename) - 1];
            $file_weight = $file['size'];
            $file_type = $file['type'];
            if ($file['error'] == 0) {
                // check if the extension is accepted
                if (in_array($file_extension, $ok_ext)):

                    // check if the size is not beyond expected size
                    if ($file_weight <= $file_max_weight):


                        // rename the file
                        $fileNewName = md5($file_name_no_ext[0] . microtime()) . '.' . $file_extension;


                        // and move it to the destination folder
                        if (move_uploaded_file($file['tmp_name'], $destination . $fileNewName)):

                            echo " File uploaded !";

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
        $sql = 'UPDATE HoSo
            SET HinhAnh =:hinhAnh WHERE MaHoSo =:maHoSo';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':hinhAnh', $fileNewName, PDO::PARAM_STR);
        $stmt->bindValue(':maHoSo', $this->maHoSo, PDO::PARAM_INT);
        return $stmt->execute();
    }

    function updateInfo($data)
    {
        $this->hoTen = $data['hoTen'];
        $this->ngaySinh = $data['ngaySinh'];
        $this->doiThu = $data['doiThu'];
        $this->queQuan = $data['queQuan'];
        $this->conThu = $data['conThu'];
        $this->diaChi = $data['diaChi'];
        $this->sdt = $data['sdt'];
        $this->ngayMat = $data['ngayMat'];
        $this->noiAnTang = $data['noiAnTang'];
        $this->email = $data['email'];
        $this->validate();
        $sql = 'UPDATE HoSo
                SET hoTen = :hoTen,
                    email = :email,
                    doiThu = :doiThu,
                    conThu = :conThu,
                    diaChi = :diaChi,
                    queQuan = :queQuan,
                    sdt = :sdt,
                    ngayMat = :ngayMat,
                    noiAnTang = :noiAnTang,
                    sdt = :sdt,
                    email = :email,
                    ngaySinh =:ngaySinh';
        $sql .= "\nWHERE MaHoSo = :maHoSo";
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':hoTen', $this->hoTen, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':doiThu', $this->doiThu, PDO::PARAM_INT);
        $stmt->bindValue(':conThu', $this->conThu, PDO::PARAM_INT);
        $stmt->bindValue(':queQuan', $this->queQuan, PDO::PARAM_INT);
        $stmt->bindValue(':diaChi', $this->diaChi, PDO::PARAM_INT);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':maHoSo', $this->maHoSo, PDO::PARAM_INT);
        $stmt->bindValue(':sdt', $this->sdt, PDO::PARAM_STR);
        $stmt->bindValue(':ngayMat', $this->ngayMat, PDO::PARAM_STR);
        $stmt->bindValue(':noiAnTang', $this->noiAnTang, PDO::PARAM_STR);
        $stmt->bindValue(':ngaySinh', $this->ngaySinh, PDO::PARAM_STR);
        return $stmt->execute();
    }

    function save_image($inPath, $outPath) {
        $in = fopen($inPath, "rb");
        $out = fopen($outPath, "wb");
        while ($chunk = fread($in, 8192)) {
            fwrite($out, $chunk, 8192);
        }
        fclose($in);
        fclose($out);
        $sql = 'UPDATE HoSo
            SET HinhAnh =:hinhAnh WHERE MaHoSo =:maHoSo';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $exploded = explode('/',$outPath);
        $fileName = $exploded[count($exploded) - 1];
        $stmt->bindValue(':hinhAnh', $fileName, PDO::PARAM_STR);
        $stmt->bindValue(':maHoSo', $this->MaHoSo, PDO::PARAM_INT);
        return $stmt->execute();
    }

//    function checkImageIsNull(){
//        $sql = 'SELECT * FROM HoSo
//                WHERE MaHoSo = :maHoSo';
//        $db = static::getDB();
//        $stmt = $db->prepare($sql);
//        $stmt->bindValue(':maHoSo', $this->MaHoSo, PDO::PARAM_STR);
//        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
//        $stmt->execute();
//        $hoSo = $stmt->fetch();
//        if (empty($hoSo->HinhAnh)) {
//            return true;
//        }
//        return false;
//    }
}