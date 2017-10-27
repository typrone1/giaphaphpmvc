<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 21/10/2017
 * Time: 10:08 AM
 */

namespace App\Controllers\Admin;

use App\Database\MySqlConnection;
use Core\Controller;
use App\Database\Query\MySqlBuilder;
use Core\View;
use App\Models\HoSo as HoSoModel;

class HoSo extends Controller
{
    public function indexAction()
    {
        View::renderTemplate('DanhSachHoSo/index.html', [
            'dsHoSo' => HoSoModel::getAll()
        ]);
    }

    public function searchAction()
    {
        $key = isset($_GET['key']) ? $_GET['key'] : '';
        View::renderTemplate('TimKiem/result_search.html', [
            'dsHoSo' => HoSoModel::getSearch($key)
        ]);

    }

    public function getSoDoGiaPhaAction()
    {
//        $maHoSo = $this->routeParams['maHoSo'];
        $maHoSo = 9;
        $connection = new MySqlConnection([
            'dbname' => 'mvc',
            'hostname' => '127.0.0.1',
            'username' => 'root',
            'password' => '',
        ]);
        $builder = new MySqlBuilder($connection);
        $hoSoOng = null;
        $hoSoBo = null;
        $hoSo = HoSoModel::find($maHoSo);
        if (isset($hoSo)) {
            $hoSoBo = HoSoModel::find($hoSo->MaHoSoBo);

            if (isset($hoSoBo)) {
                $hoSoOng = $builder
                    ->select('mahoso', 'hoten')
                    ->where('mahoso', $hoSoBo->MaHoSoBo)
                    ->from('hoso')
                    ->first();
            }

        }
        $dsVo = $builder
            ->select('mahoso', 'hoten')
            ->where('mahoso', $maHoSo)
            ->from('hosongoaitoc')
            ->all();
        $dsCon = $builder
            ->select('mahoso', 'hoten')
            ->where('mahosobo', $maHoSo)
            ->from('hoso')
            ->all();
        $dsAnhEm = $builder
            ->select('mahoso', 'hoten')
            ->where('mahosobo', $hoSo->MaHoSoBo)
            ->from('hoso')
            ->all();
        View::renderTemplate('HoSo/xem_quan_he.html', ['hoSoOng' => $hoSoOng, 'hoSoBo' => $hoSoBo, 'dsAnhEm' => $dsAnhEm, 'dsCon' => $dsCon, 'dsVo' => $dsVo]);
    }

    public function themConAction()
    {
        View::renderTemplate('ThemHoSo/index.html', ['maHoSoBo' => $this->routeParams['mahoso']]);
    }
}