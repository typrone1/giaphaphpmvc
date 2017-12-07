<?php

/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 30/11/2017
 * Time: 11:14 PM
 */
namespace App\Controllers\API;
use App\Database\MySqlConnection;
use App\Database\Query\MySqlBuilder;
use App\Models\HoSo;
use App\Models\HoSoNgoaiToc;
use Core\Controller;
use Core\View;
use League\Fractal;
class AJAX extends Controller
{
    public function indexAction(){
        $hoSo = HoSo::find($_GET['maHoSo']);
        $dsVo = HoSoNgoaiToc::findByChong($hoSo->MaHoSo);
        $dsCon = HoSo::findAllByParent($hoSo->MaHoSo);
        $hoSoBo = HoSo::find($hoSo->MaHoSoBo);
        $hoSoMe = null;
        if (isset($hoSo->MaHoSoMe)) {
            $hoSoMe = HoSoNgoaiToc::find($hoSo->MaHoSoMe);
        }

        View::render('AJAX/chiTietHoSo.php', ['hoSo' => $hoSo, 'dsVo' => $dsVo, 'dsCon' => $dsCon, 'hoSoBo' => $hoSoBo, 'hoSoMe' => $hoSoMe]);
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
            ->where('mahoso', $hoSo->MaHoSo)
            ->from('hosongoaitoc')
            ->all();
        $dsCon = $builder
            ->select('mahoso', 'hoten', 'mahosome', 'doithu', 'conthu', 'gioiTinh')
            ->where('mahosobo', $hoSo->MaHoSo)
            ->from('hoso')
            ->all();

        $dsAnhEm = HoSo::findAllByParent($hoSo->MaHoSoBo);
        View::renderTemplate('AJAX/so-do-gia-dinh.html', ['hoSo' => $hoSo, 'hoSoOng' => $hoSoOng, 'hoSoBo' => $hoSoBo, 'dsAnhEm' => $dsAnhEm, 'dsCon' =>$dsCon, 'dsVo' => $dsVo]);
    }
    public function searchAction()
    {
        $key = isset($_GET['keywords']) ? $_GET['keywords'] : '';
        header('Content-Type: application/json');
        echo json_encode(HoSo::getSearch($key),JSON_UNESCAPED_UNICODE);
    }
    public function renderResultSearchAction()
    {
        $key = isset($_GET['keywords']) ? $_GET['keywords'] : '';
        $option = isset($_GET['option']) ? $_GET['option'] : '';
        $dsHoSo = HoSo::getSearch($key, $option);
        View::renderTemplate('AJAX/result_search.html', [
            'dsHoSo' => $dsHoSo
        ]);
    }
    function getAll(){
        $hoSos = HoSo::getAll();
        $fractal = new Fractal\Manager();
        $resource = new Fractal\Resource\Collection($hoSos, function(array $hoSo) {
            return [
                'id'      => (int) $hoSo['MaHoSo'],
                'hoTen'   => $hoSo['HoTen'],
                'conThu'   => $hoSo['ConThu'],
                'doiThu'   => $hoSo['DoiThu'],
                'maHoSoBo'   => $hoSo['MaHoSoBo'],
                'ngaySinh'   => $hoSo['NgaySinh'],
                'ngayGio'   => $hoSo['NgayMat'],
            ];
        });
        $array = $fractal->createData($resource)->toArray();
        echo $fractal->createData($resource)->toJson(JSON_UNESCAPED_UNICODE);
    }
}