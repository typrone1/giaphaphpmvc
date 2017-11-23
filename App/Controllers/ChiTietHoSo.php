<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 18/10/2017
 * Time: 10:06 PM
 */
namespace App\Controllers;

use App\Database\Query\MySqlBuilder;
use App\Database\MySqlConnection;
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
        } else {
            $maHoSo = $this->routeParams['mahoso'];
            $connection = new MySqlConnection([
                'dbname' => 'giaphadb',
                'hostname' => '127.0.0.1',
                'username' => 'root',
                'password' => '',
            ]);
            $builder = new MySqlBuilder($connection);
            $hoSoOng = null;
            $hoSoBo = null;
            $dsAnhEm = null;
            $hoSo = HoSo::find($maHoSo);
            if (isset($hoSo)) {
                $hoSoBo = HoSo::find($hoSo->MaHoSoBo) != false ? HoSo::find($hoSo->MaHoSoBo) : null;
                if (isset($hoSoBo->MaHoSoBo)) {
                    $hoSoOng = $builder
                        ->select('mahoso', 'hoten', 'doithu', 'conthu')
                        ->where('mahoso', $hoSoBo->MaHoSoBo)
                        ->from('hoso')
                        ->first();
                }
            }
            $dsVo = $builder
                ->select('mahoso', 'hoten', 'ngaysinh', 'mahosont', 'hinhanh', 'doithu', 'conthu')
                ->where('mahoso', $maHoSo)
                ->from('hosongoaitoc')
                ->all();
            $dsCon = $builder
                ->select('mahoso', 'hoten', 'mahosome', 'doithu', 'conthu')
                ->where('mahosobo', $maHoSo)
                ->from('hoso')
                ->all();

            $dsAnhEm = HoSo::findAllByParent($hoSo->MaHoSoBo);
            View::renderTemplate('HoSo/chi_tiet.html', ['hoSo' => $hoSo, 'hoSoOng' => $hoSoOng, 'hoSoBo' => $hoSoBo, 'dsAnhEm' => $dsAnhEm, 'dsCon' => $dsCon, 'dsVo' => $dsVo]);
        }

    }

    public function editAction()
    {
        echo "Đây là trang chỉnh sửa";
    }

}