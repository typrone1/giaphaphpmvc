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
    public function getChiTietHoSoAction()
    {
        $hoSo = HoSoModel::find($this->routeParams['mahoso']);
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
            $hoSo = HoSoModel::find($maHoSo);
            if (isset($hoSo)) {
                $hoSoBo = HoSoModel::find($hoSo->MaHoSoBo) != false ? HoSoModel::find($hoSo->MaHoSoBo) : null;
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

            $dsAnhEm = HoSoModel::findAllByParent($hoSo->MaHoSoBo);
            View::renderTemplate('HoSo/chi_tiet.html', ['hoSo' => $hoSo, 'hoSoOng' => $hoSoOng, 'hoSoBo' => $hoSoBo, 'dsAnhEm' => $dsAnhEm, 'dsCon' => $dsCon, 'dsVo' => $dsVo]);
        }

    }
    public function indexAction()
    {
        View::renderTemplate('HoSo/danh-sach.html', [
            'dsHoSo' => HoSoModel::getAll()
        ]);
        $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
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
        View::renderTemplate('HoSo/index.html', ['dsHoSo' => \App\Models\HoSo::getAll(), 'dsHoSoNgoaiToc' => HoSoNgoaiToc::getAll(), 'maHoSoBo' => $this->routeParams['mahoso']]);
    }


    public function getHoSoData(){
        $maHoSo = $this->routeParams['id'];
        $result = HoSoModel::find($maHoSo);
        echo \GuzzleHttp\json_encode($result,JSON_UNESCAPED_UNICODE);
    }
    public function deleteHoSoAction(){
        $this->requireQuanTriVienLevel3();
        $mhs = $this->routeParams['id'];
        if (!HoSoModel::find($mhs)->deleteHoSo()){
            Flash::addMessage('Đã xóa thành công !');
        } else {
            Flash::addMessage('Không thể xóa nhánh khi vẫn còn sự phụ thuộc! ', Flash::WARNING);
        }

        $this->redirect(isset($_SESSION['return_to']) ? $_SESSION['return_to'] : '/');
    }
    public function traCuuXungHoAction(){
        View::renderTemplate('TraCuuXungHo/index.html', ['dsHoSo' => HoSoModel::getAll()]);
    }
    public function getTraCuuXungHoAction(){
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
    public function themHoSoAction(){
        $this->requireQuanTriVien();
        View::renderTemplate('HoSo/index.html', ['dsHoSo' => HoSoModel::getAll(), 'dsHoSoNgoaiToc' => HoSoNgoaiToc::getAll()]);
    }

    public function postThemHoSoAction(){
        $hoSo = new HoSoModel($_POST);
        if ($hoSo->save()) {
            Flash::addMessage('Thêm mới hồ sơ thành công');
            $this->redirect('/admin/ho-so/them-ho-so');
        }
        else {
            Flash::addMessage('Thêm hồ sơ không thành công, vui lòng thử lại sau!', Flash::WARNING);
            $this->redirect('/admin/ho-so/them-ho-so');
        }
    }
    public function capNhatHoSoAction(){
        $maHoSo = $this->routeParams['mahoso'];
        $hoSo = HoSoModel::find($maHoSo);
        $hoSo->maHoSo = $maHoSo;
        if ($hoSo->updateInfo($_POST)) {
            Flash::addMessage('Cập nhật hồ sơ thành công !');
        }
        else {
            Flash::addMessage(':( Cập nhật không thành công !', Flash::WARNING);
        }

        $this->redirect('/admin/ho-so/'.$maHoSo);
    }
    public function capNhatAnhHoSoAction(){
        $maHoSo = $this->routeParams['mahoso'];
        $hoSo = HoSoModel::find($maHoSo);
        $hoSo->maHoSo = $maHoSo;
        if ($hoSo->updatePicture($_POST)) {
            Flash::addMessage('Cập nhật ảnh hồ sơ thành công !');
        }
        else {
            Flash::addMessage(':( Cập nhật không thành công !', Flash::WARNING);
        }

        $this->redirect('/admin/ho-so/'.$maHoSo);
    }
    public function setProfileAction(){
        $username = "stint";
        if (isset($username)) {
            $url = $_POST['url'];
            $this->save_image($url, '/profile-pic/' . $username . '.jpg');
            echo "success";
        } else {
            // if username is not redirect to the home page
        }
}