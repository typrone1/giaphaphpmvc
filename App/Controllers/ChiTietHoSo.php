<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 18/10/2017
 * Time: 10:06 PM
 */
namespace App\Controllers;

use App\Models\HoSo;
use Core\Controller;
use Core\View;

class ChiTietHoSo extends Controller
{
    public function getChiTietHoSoAction()
    {
//        print_r($this->routeParams);
        $hoSo = HoSo::find($this->routeParams['mahoso']);
        if (empty($hoSo)) {
            echo "Hồ sơ không tồn tại";
        }
        View::renderTemplate('HoSo/chi_tiet.html', ['hoSo' => $hoSo]);
    }

    public function editAction()
    {
        echo "Đây là trang chỉnh sửa";
    }
}