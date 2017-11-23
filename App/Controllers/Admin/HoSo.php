<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 21/10/2017
 * Time: 10:08 AM
 */

namespace App\Controllers\Admin;

use App\Auth;
use App\Database\MySqlConnection;
use App\Flash;
use App\Models\HoSoNgoaiToc;
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

    public function themConAction()
    {
        View::renderTemplate('ThemHoSo/index.html', ['dsHoSo' => \App\Models\HoSo::getAll(), 'dsHoSoNgoaiToc' => HoSoNgoaiToc::getAll(), 'maHoSoBo' => $this->routeParams['mahoso']]);
    }


    public function getHoSoData(){
        $maHoSo = $this->routeParams['id'];
        $result = HoSoModel::find($maHoSo);
        echo \GuzzleHttp\json_encode($result,JSON_UNESCAPED_UNICODE);
    }
    public function deleteHoSoAction(){
        $mhs = $this->routeParams['id'];
        if (!\App\Models\HoSo::find($mhs)->deleteHoSo()){
            Flash::addMessage('Đã xóa thành công !');
        } else {
            Flash::addMessage('Xóa thất bại !');
        }
        $this->redirect('/giapha/giaPhaDangDung');
    }
    public function traCuuXungHoAction(){
        View::renderTemplate('TraCuuXungHo/index.html', ['dsHoSo' => HoSoModel::getAll()]);
    }
    public function postTraCuuXungHoAction(){
        $dt1 = $_GET['doiTuong1'];
        $dt2 = $_GET['doiTuong2'];
        $mangCungNhanh = [['anh ruột', 'em ruột'],
            ['cha', 'con']
            ,['ông nội', 'cháu nội']
            ,['ông cố', 'cháu cố']];
        $mangKhacNhanh = [['anh', 'em'],
            ['chú/bác', 'cháu']
            ,['ông', 'cháu']
            ,['cố', 'cháu cố']];
        $object1 = self::findObject($dt1);
        $object2 = self::findObject($dt2);
        $mangQuanHe = [];
        if ($this->isCungMotNhanh($object1->MaHoSo, $object2->MaHoSo)) {
            $mangQuanHe = $mangCungNhanh;
        }
        else {
            $mangQuanHe = $mangKhacNhanh;
        }
        $khoangCach = abs($object1->DoiThu - $object2->DoiThu);
        $khoangCach = min($khoangCach, sizeof($mangQuanHe)-1);
        $giaTri = $mangQuanHe[$khoangCach];
        $obj = $object1->DoiThu > $object2->DoiThu ? $object1 : $object2;
        $objOld = $object1->DoiThu <= $object2->DoiThu ? $object1 : $object2;
        $result = $objOld->HoTen." là <b>".$giaTri[0]."</b> ".$obj->HoTen."</b>";
        View::renderTemplate('TraCuuXungHo/index.html', ['dsHoSo' => HoSoModel::getAll(), 'doiTuong1' => $object1->MaHoSo, 'doiTuong2' => $object2->MaHoSo, 'result' => $result]);
    }
    function isCungMotNhanh($keyID1, $keyID2){
        $object1 = self::findObject($keyID1);
        $object2 = self::findObject($keyID2);
        $obj = $object1->DoiThu > $object2->DoiThu ? $object1 : $object2;
        $objOld = $object1->DoiThu <= $object2->DoiThu ? $object1 : $object2;
        if ($object1->MaHoSoBo === $object2->MaHoSoBo) {
            return true;
        }
        while ($obj->DoiThu >= $objOld->DoiThu) {
            $obj = $this->getBoOfId($obj->MaHoSo);
            try {
                if ($obj->MaHoSo === $object1->MaHoSo  || $obj->MaHoSo === $object2->MaHoSo) {
                    return true;
                }
            }
            catch (\Exception $exception){
                return false;
            }

        }
        return false;
    }
    function findObject($keyID) {
        return HoSoModel::find($keyID);
    }
    function getBoOfId($keyID) {
        $object = self::findObject($keyID);
        return self::findObject($object->MaHoSoBo);
    }
}