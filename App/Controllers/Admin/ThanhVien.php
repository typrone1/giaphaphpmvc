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
        View::renderTemplate('ThanhVien/cap_quyen.html');
    }
    public function chinhSuaAction(){
        View::renderTemplate('ThanhVien/chinh_sua_thong_tin.html',['account' => $this->user]);
    }

    public function updateProfileAction()
    {
        if ($this->user->updateProfile($_POST)) {

            Flash::addMessage('Changes saved');

            $this->redirect('/admin/thanhvien/chinhsua');

        } else {
            View::renderTemplate('ThanhVien/chinh_sua_thong_tin.html', [
                'account' => $this->user
            ]);

        }
    }
}