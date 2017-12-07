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

    public function save()
    {
        $this->validate();
        if (empty($this->errors)) {
            $file_max_weight = 1000000; //limit the maximum size of file allowed (20Mb)
            $ok_ext = array('jpg', 'png', 'gif', 'jpeg'); // allow only these types of files
            $destination = '../public/images/AnhBaiViet/'; // where our files will be stored
            $file = $_FILES['hinhAnh'];
            $fileNewName = '';
            if (
                !isset($_FILES['hinhAnh']['error']) ||
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
            $sql = 'INSERT INTO BaiViet (MaLoaiTin, TieuDe, NoiDung, HinhAnh, NgayDuaTin, MaThanhVien)
            VALUES (:maLoaiTin, :tieuDe, :noiDung, :hinhAnh, CURRENT_DATE, :maThanhVien)';
            $db = static::getDB();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':maLoaiTin', $this->maLoaiTin, PDO::PARAM_INT);
            $stmt->bindValue(':maThanhVien', $this->maThanhVien, PDO::PARAM_INT);
            $stmt->bindValue(':tieuDe', $this->tieuDe, PDO::PARAM_STR);
            $stmt->bindValue(':noiDung', $this->noiDung, PDO::PARAM_STR);
            $stmt->bindValue(':hinhAnh', $fileNewName, PDO::PARAM_STR);
            return $stmt->execute();
        }
        return false;
    }

    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT TieuDe, NoiDung, BaiViet.HinhAnh, name, NgayDuaTin, MaBaiViet FROM BaiViet,users WHERE baiviet.MaThanhVien = users.id ORDER BY MaBaiViet DESC');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function findOne($maBaiViet)
    {
        $sql = 'SELECT TieuDe, NoiDung, BaiViet.HinhAnh, name, NgayDuaTin, MaBaiViet FROM BaiViet, users
                WHERE mabaiviet = :mabaiviet AND baiviet.MaThanhVien = users.id';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':mabaiviet', $maBaiViet, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();
        return $stmt->fetch();
    }

    public function validate()
    {
// Name
        if ($this->noiDung == '') {
            $this->errors[] = 'Nội dung không được để trống !';
        }
    }
}