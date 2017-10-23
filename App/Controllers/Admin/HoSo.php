<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 21/10/2017
 * Time: 10:08 AM
 */

namespace App\Controllers\Admin;


use Core\Controller;
use Core\View;
use App\Models\HoSo as HoSoModel;
class HoSo extends Controller
{
    public function indexAction(){
        View::renderTemplate('DanhSachHoSo/index.html',[
            'dsHoSo' => HoSoModel::getAll()
        ]);
    }

    public function searchAction(){
        $key = isset($_GET['key'])?$_GET['key']:'';
        View::renderTemplate('TimKiem/result_search.html',[
            'dsHoSo' => HoSoModel::getSearch($key)
        ]);

    }
    public function getSoDoGiaPhaAction(){
        $maHoSo = $this->routeParams['maHoSo'];
        $hoSo = HoSoModel::find($maHoSo);
        if(isset($hoSo)){
            $hoSoBo = HoSoModel::find($hoSo->mahsbo)->first();
            if (isset($hoSoBo)){
                $hoSoOng = HoSoModel::find($hoSoBo->mahsbo)->first();
            }
        }
        $dsVo = HoSoModel::find($maHoSo);
        $dsCon = HoSoModel::find($maHoSo);
        $dsAnhEm = HoSoModel::find($hoSo->mahsbo);
        return view('admin.chi-tiet-ho-so', compact(['hoSo','hoSoBo','hoSoOng','dsVo','dsCon','dsAnhEm']));
    }

}