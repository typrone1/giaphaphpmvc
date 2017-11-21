<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 20/09/2017
 * Time: 11:11 PM
 */
namespace App\Controllers\Admin;
use App\Auth;
use App\Controllers\Authenticated;
use App\Flash;
use Core\Controller;
use Core\View;

class Users extends Authenticated {
    public function indexAction(){
        echo "Index";
    }
    protected function before()
    {
        parent::before();
        $this->user = Auth::getUser();
    }

    public function chinhSuaAction(){
        View::renderTemplate('ThanhVien/chinh_sua_thong_tin.html',['account' => $this->user]);
    }

    public function updateProfileAction()
    {
        if ($this->user->updateProfile($_POST)) {

            Flash::addMessage('Cập nhật thành công');

            $this->redirect('/admin/users/chinhsua');

        } else {
            View::renderTemplate('ThanhVien/chinh_sua_thong_tin.html', [
                'account' => $this->user
            ]);
        }
    }
}