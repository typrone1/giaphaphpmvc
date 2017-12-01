<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 26/10/2017
 * Time: 2:54 PM
 */

namespace App\Controllers\Admin;


use App\Flash;
use App\Models\HoSo;
use Core\Controller;
use Core\View;
use App\Models\HoSoNgoaiToc as HoSoNgoaiTocModel;
class HoSoNgoaiToc extends Controller
{
    public function themVoChongAction(){
        View::renderTemplate('HoSoNgoaiToc/them_ho_so.html',['mahoso' => $this->routeParams['id']]);
    }
    public function editHoSoNgoaiTocAction(){
        $maHoSo = $this->routeParams['mahoso'];
        $hoSo = HoSoNgoaiTocModel::find($maHoSo);
        $hoSoPhuThuoc =  HoSo::find($hoSo->MaHoSo);
        View::renderTemplate('HoSoNgoaiToc/edit_ho_so_ngoai_toc.html', ['hoSo' => $hoSo ,'hoSoPhuThuoc' => $hoSoPhuThuoc]);
    }
    public function postThemHoSoNTAction(){
        $hsnt = new HoSoNgoaiTocModel($_POST);
        if ($hsnt->save()) {
            Flash::addMessage('Thông vợ thành công!');
            $this->redirect('/admin/ho-so/'.$hsnt->maHoSo);
        }
        else {
            Flash::addMessage('Thông hồ sơ thất bại!');
            $this->redirect('/admin/ho-so/'.$hsnt->maHoSo);
        }
    }
    function getListVoByID(){
        $maHoSo = $this->routeParams['mahoso'];
        $result = \App\Models\HoSoNgoaiToc::findByChong($maHoSo);
        echo \GuzzleHttp\json_encode($result,JSON_UNESCAPED_UNICODE);
    }
}