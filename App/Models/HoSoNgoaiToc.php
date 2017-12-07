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
                WHERE mahosont = :mahosont';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':mahosont', $maHoSo, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();

        return $stmt->fetch();
    }

    public static function findByChong($maHoSo)
    {
        $sql = 'SELECT * FROM HoSoNgoaiToc
                WHERE mahoso = :mahoso';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':mahoso', $maHoSo, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function updateInfo($data){
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
        $this->hoTenBo = $data['hoTenBo'];
        $this->hoTenMe = $data['hoTenMe'];
        $this->ngayMat = $data['ngayMat'];

        $sql = 'UPDATE HoSoNgoaiToc
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
                    hoTenBo = :hoTenBo,
                    hoTenMe = :hoTenMe,
                    ngaySinh =:ngaySinh';
        if ($_FILES['hinhAnh']) {

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
                                $sql.= ',HinhAnh =:hinhAnh';
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
        }

        $sql .= "\nWHERE MaHoSoNT = :maHoSoNT";
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':hoTen', $this->hoTen, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':doiThu', $this->doiThu, PDO::PARAM_INT);
        $stmt->bindValue(':conThu', $this->conThu, PDO::PARAM_INT);
        $stmt->bindValue(':queQuan', $this->queQuan, PDO::PARAM_INT);
        $stmt->bindValue(':diaChi', $this->diaChi, PDO::PARAM_INT);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':sdt', $this->sdt, PDO::PARAM_STR);
        $stmt->bindValue(':ngayMat', $this->ngayMat, PDO::PARAM_STR);
        $stmt->bindValue(':noiAnTang', $this->noiAnTang, PDO::PARAM_STR);
        $stmt->bindValue(':ngaySinh', $this->ngaySinh, PDO::PARAM_STR);
        $stmt->bindValue(':ngayMat', $this->ngayMat, PDO::PARAM_STR);
        $stmt->bindValue(':hoTenBo', $this->hoTenBo, PDO::PARAM_STR);
        $stmt->bindValue(':hoTenMe', $this->hoTenMe, PDO::PARAM_STR);
        $stmt->bindValue(':hinhAnh', $fileNewName, PDO::PARAM_STR);
        $stmt->bindValue(':maHoSoNT', $this->maHoSoNT, PDO::PARAM_STR);
        return $stmt->execute();
    }
}