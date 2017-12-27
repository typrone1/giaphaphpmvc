<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 26/10/2017
 * Time: 4:14 PM
 */

namespace App\Controllers\Admin;


use App\Flash;
use App\Models\HoSo;
use App\Models\SuKien;
use Core\Controller;
use Core\View;
use App\Models\BaiViet as BaiVietModel;
use App\Models\LoaiTin;

class BaiViet extends Controller
{
    public function indexAction()
    {

    }

    public function getDanhSachBaiVietAction()
    {
        View::renderTemplate('BaiViet/danh_sach_bai_viet.html', ['dsBaiViet' => BaiVietModel::getAll()]);
    }

    public function getThemBaiViet()
    {
        View::renderTemplate('BaiViet/viet_bai.html', ['dsLoaiTin' => LoaiTin::getAll()]);
    }

    public function getSuaBaiViet()
    {
        $id = $this->routeParams['id'];
        View::renderTemplate('BaiViet/chinh_sua_bai_viet.html', ['baiViet' => BaiVietModel::findOne($id), 'dsLoaiTin' => LoaiTin::getAll()]);
    }
    public function postCapNhatBaiVietAction()
    {
        $id = $this->routeParams['mabaiviet'];
        $post = BaiVietModel::findOne($id);
        if ($post->updatePost($_POST))
            Flash::addMessage("Cập nhật thành công");
        View::renderTemplate('BaiViet/chinh_sua_bai_viet.html', ['baiViet' => BaiVietModel::findOne($id), 'dsLoaiTin' => LoaiTin::getAll()]);
    }

    public function postThemBaiViet()
    {
        $post = new BaiVietModel($_POST);
        if ($post->save()) {
            Flash::addMessage("Thêm thành công");
            $this->redirect('/admin/baiviet/getThemBaiViet');
        } else {
            Flash::addMessage("Thêm không công thành công", Flash::WARNING);
            foreach ($post->errors as $error) {
                Flash::addMessage($error, Flash::WARNING);
            }
            View::renderTemplate('BaiViet/viet_bai.html', ['dsLoaiTin' => LoaiTin::getAll(), 'post' => $post]);
        }
    }

    public function xemLichAction()
    {
        $dsSuKien = SuKien::getAll();
        View::renderTemplate('Lich/index.html', ['dsSuKien' => $dsSuKien, 'dsHoSo' => HoSo::getAll()]);
    }
    public function storeEvent() {
        $event = new SuKien($_POST);
        if ($event->save()) {
            Flash::addMessage("Thêm thành công");
            $this->redirect('/admin/lich-viec-toc');
        } else {
            Flash::addMessage("Thêm không công thành công", Flash::WARNING);
            foreach ($event->errors as $error) {
                Flash::addMessage($error, Flash::WARNING);
            }
            $dsSuKien = SuKien::getAll();
            View::renderTemplate('Lich/index.html', ['dsSuKien' => $dsSuKien]);
        }
    }
    public function deleteEvent() {
        $event = SuKien::find($_POST['maSuKien']);
        if ($event->delete()) {
            Flash::addMessage("Xóa thành công");
            $this->redirect('/admin/lich-viec-toc');
        } else {
            Flash::addMessage("Xóa không thành công", Flash::WARNING);
            foreach ($event->errors as $error) {
                Flash::addMessage($error, Flash::WARNING);
            }
            $dsSuKien = SuKien::getAll();
            View::renderTemplate('Lich/index.html', ['dsSuKien' => $dsSuKien]);
        }
    }
    public function updateEvent() {
        $event = SuKien::find($_POST['maSuKien']);
        if ($event->update($_POST)) {
            Flash::addMessage("Cập nhật thành công !");
            $this->redirect('/admin/lich-viec-toc');
        } else {
            Flash::addMessage("Cập nhật không thành công !", Flash::WARNING);
            foreach ($event->errors as $error) {
                Flash::addMessage($error, Flash::WARNING);
            }
            $dsSuKien = SuKien::getAll();
            View::renderTemplate('Lich/index.html', ['dsSuKien' => $dsSuKien]);
        }
    }
}