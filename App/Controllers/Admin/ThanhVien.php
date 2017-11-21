<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 21/10/2017
 * Time: 10:43 PM
 */

namespace App\Controllers\Admin;


use App\Auth;
use App\Controllers\Authenticated;
use App\Flash;
use App\Models\HoSo;
use App\Models\User;
use Core\Controller;
use Core\View;

class ThanhVien extends Authenticated
{
    protected function before()
    {
        parent::before();
        $this->user = Auth::getUser();
    }
    public function indexAction(){
        View::renderTemplate('ThanhVien/danh_sach.html', ['users' => User::getAll()]);
    }
    public function capQuyenAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            User::findByID($_POST['mathanhvien'])->capNhatHoSoQuanLy($_POST['mahoso']);
        }
        View::renderTemplate('ThanhVien/cap_quyen.html', ['users' => User::getAll(), 'dsHoSo' => HoSo::getAll()]);
    }
    public function chinhSuaAction(){
        View::renderTemplate('ThanhVien/chinh_sua_thanh_vien.html',['account' => User::findByID($this->routeParams['id'])]);
    }

    public function updateProfileAction()
    {
        if (User::findByID($_POST['id'])->updateProfile($_POST)) {

            Flash::addMessage('Cập nhật thành công');

            $this->redirect('/admin/thanhvien/'.$_POST['id'].'/chinhsua');

        } else {
            View::renderTemplate('ThanhVien/chinh_sua_thanh_vien.html',['account' => User::findByID($_POST['id'])]);
        }
    }
}