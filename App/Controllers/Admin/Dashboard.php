<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 30/11/2017
 * Time: 4:44 PM
 */

namespace App\Controllers\Admin;


use App\Auth;
use Core\Controller;
use Core\View;

class Dashboard extends Controller
{
    public function indexAction()
    {
//        View::render('Home/index.php', ['name' => 'Ty']);
//        View::renderTemplate('Home/index.html',['name'=>'Ty',
//        'colours' => ['Red', 'Blue', 'Green']
//        ]);
//        Mail::send('typrone1@gmail.com','ty','pro','hello');
        $this->requireLogin();
        $ketnoi = mysqli_connect("localhost", "root", "");
        if (!$ketnoi)
            echo "Kết nối thất bại";
        mysqli_select_db($ketnoi, 'giaphadb');
        mysqli_query($ketnoi, "set names utf8");
        $sql = "SELECT * FROM HoSo";
        $countHoSo = mysqli_num_rows(mysqli_query($ketnoi, $sql));
        $sql = "SELECT * FROM LoaiTin";
        $countLoaiTin = mysqli_num_rows(mysqli_query($ketnoi, $sql));
        $sql = "SELECT * FROM Users";
        $countThanhVien = mysqli_num_rows(mysqli_query($ketnoi, $sql));
        $sql = "SELECT * FROM BaiViet";
        $countBaiViet = mysqli_num_rows(mysqli_query($ketnoi, $sql));
        $sql = "SELECT * FROM HoSo WHERE GioiTinh=1";
        $slNam = mysqli_num_rows(mysqli_query($ketnoi, $sql));;
        $slNu = $countHoSo - $slNam;
        View::renderTemplate('Home/index.html', [
            'user' => Auth::getUser(),
            'countHoSo' => $countHoSo,
            'countLoaiTin' => $countLoaiTin,
            'countThanhVien' => $countThanhVien ,
            'countBaiViet' => $countBaiViet,
            'slNam' => $slNam,
            'slNu' => $slNu
        ]);
    }
}