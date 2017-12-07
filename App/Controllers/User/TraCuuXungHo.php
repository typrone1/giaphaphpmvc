<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 03/12/2017
 * Time: 3:08 PM
 */

namespace App\Controllers\User;


use App\Models\HoSo;
use Core\Controller;
use App\Models\TraCuuXungHo as TraCuuXungHoModel;
use Core\View;

class TraCuuXungHo extends Controller
{
    public function add()
    {
        $maHoSo = $this->routeParams['mahoso'];
        $hoSo = HoSo::find($maHoSo);
//        var_dump($hoSo);
//        die();
        $oldSession = null;
        if (isset($_SESSION["dsDoiTuong"])) {
            // it does; output the message
            $oldSession = isset($_SESSION["dsDoiTuong"]) ? unserialize($_SESSION["dsDoiTuong"]) : null;
        }

        $traCuuXungHo = new TraCuuXungHoModel($oldSession);
        if ($hoSo != false) {
            $traCuuXungHo->add($hoSo, $maHoSo);
        }
        $_SESSION["dsDoiTuong"] = serialize($traCuuXungHo);
        echo "<p style='color: red'>Thêm thành công</p>";
    }
    public function getAllDoiTuongAction()
    {
        if (isset($_SESSION["dsDoiTuong"])) {
            $session = unserialize($_SESSION['dsDoiTuong']);
//            var_dump($session);
//            die();
            $dsDoiTuong = $session->dsDoiTuong;
            $dt1 = isset($dsDoiTuong[$session->lastID]) ? $dsDoiTuong[$session->lastID] : null;
            $dt2 = isset($dsDoiTuong[$session->firstID]) ? $dsDoiTuong[$session->firstID] : null;
            View::renderTemplate("AJAX/ket_qua_tra_cuu_cach_xung_ho.html", ['hoSo1' => $dt1, 'hoSo2' => $dt2]);
            echo "<br><hr>Kết quả: <br>".self::getTraCuuXungHoAction();
        }
    }

    public function deleteAction()
    {
        $maHoSo = $this->routeParams['mahoso'];
        $oldSession = null;
        if (isset($_SESSION["dsDoiTuong"])) {
            $oldSession = isset($_SESSION["dsDoiTuong"]) ? unserialize($_SESSION["dsDoiTuong"]) : null;
        }
        $traCuuXungHo = new TraCuuXungHoModel($oldSession);
        $traCuuXungHo->delete($maHoSo);
        $_SESSION["dsDoiTuong"] = serialize($traCuuXungHo);
    }

    public function getTraCuuXungHoAction()
    {
        $session = unserialize($_SESSION['dsDoiTuong']);
        $dsDoiTuong = $session->dsDoiTuong;
        $dt1 = isset($dsDoiTuong[$session->lastID]) ? $dsDoiTuong[$session->lastID]->MaHoSo : null;
        $dt2 = isset($dsDoiTuong[$session->firstID]) ? $dsDoiTuong[$session->firstID]->MaHoSo : null;
        if (!isset($dt1) || !isset($dt2)) {
            return;
        }
        $mangCungNhanh = [['anh ruột', 'em ruột'],
            ['cha', 'con']
            , ['ông nội', 'cháu nội']
            , ['ông cố', 'cháu cố']];
        $mangKhacNhanh = [['anh', 'em'],
            ['chú/bác', 'cháu']
            , ['ông', 'cháu']
            , ['cố', 'cháu cố']];
        $object1 = self::findObject($dt1);
        $object2 = self::findObject($dt2);
        $mangQuanHe = [];
        if ($this->isCungMotNhanh($object1->MaHoSo, $object2->MaHoSo)) {
            $mangQuanHe = $mangCungNhanh;
        } else {
            $mangQuanHe = $mangKhacNhanh;
        }

        $khoangCach = abs($object1->DoiThu - $object2->DoiThu);
        $khoangCach = min($khoangCach, sizeof($mangQuanHe) - 1);
        $giaTri = $mangQuanHe[$khoangCach];
        if ($khoangCach == 0) {
            $obj = $object1->ConThu > $object2->ConThu ? $object1 : $object2;
            $objOld = $object1->ConThu <= $object2->ConThu ? $object1 : $object2;
            $isCungMotNhanh = $this->isCungMotNhanh($obj->MaHoSo, $objOld->MaHoSo);
            if ($isCungMotNhanh) {
                if ($objOld->GioiTinh == '1') {
                    $giaTri = ['anh ruột', 'em ruột'];
                } else {
                    $giaTri = ['chị ruột', 'em ruột'];
                }
            } else {
                if ($objOld->GioiTinh == '1') {
                    $giaTri = ['anh', 'em'];
                } else {
                    $giaTri = ['chị', 'em'];
                }
            }
            $result = $objOld->HoTen . " là <b>" . $giaTri[0] . "</b> " . $obj->HoTen . "</b>";
            $result .= "<br>" . $obj->HoTen . " là <b>" . $giaTri[1] . "</b> " . $objOld->HoTen . "</b>";
            return $result;
        }
        if ($khoangCach == 1) {
            $obj = $object1->DoiThu > $object2->DoiThu ? $object1 : $object2;
            $objOld = $object1->DoiThu <= $object2->DoiThu ? $object1 : $object2;
            $parentLower = self::getBoOfId($obj->MaHoSo);
            $isCungMotNhanh = $this->isCungMotNhanh($obj->MaHoSo, $objOld->MaHoSo);
            if ($isCungMotNhanh == false){
                if ($parentLower->ConThu > $objOld->ConThu) {
                    $giaTri = ['chú', 'cháu'];
                } else {
                    $giaTri = ['bác', 'cháu'];
                }
            }
            $result = $objOld->HoTen . " là <b>" . $giaTri[0] . "</b> " . $obj->HoTen . "</b>";
            $result .= "<br>".$obj->HoTen . " là <b>" . $giaTri[1] . "</b> " . $objOld->HoTen . "</b>";
            return $result;
        }
        $obj = $object1->DoiThu > $object2->DoiThu ? $object1 : $object2;
        $objOld = $object1->DoiThu <= $object2->DoiThu ? $object1 : $object2;
        $result = $objOld->HoTen . " là <b>" . $giaTri[0] . "</b> " . $obj->HoTen . "</b>";
        $result .= "<br>".$obj->HoTen . " là <b>" . $giaTri[1] . "</b> " . $objOld->HoTen . "</b>";
        return $result;
    }

    function isCungMotNhanh($keyID1, $keyID2)
    {
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
                if ($obj->MaHoSo === $object1->MaHoSo || $obj->MaHoSo === $object2->MaHoSo) {
                    return true;
                }
            } catch (\Exception $exception) {
                return false;
            }

        }
        return false;
    }

    function findObject($keyID)
    {
        return HoSo::find($keyID);
    }

    function getBoOfId($keyID)
    {
        $object = self::findObject($keyID);
        return self::findObject($object->MaHoSoBo);
    }
}