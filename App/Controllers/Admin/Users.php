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
        View::renderTemplate('ThanhVien/thong_tin_tai_khoan.html',['account' => $this->user]);
    }
    protected function before()
    {
        parent::before();
        $this->user = Auth::getUser();
    }

    public function updateProfileAction()
    {
        if ($this->user->updateProfile($_POST)) {

            Flash::addMessage('Cập nhật thành công');

            $this->redirect('/admin/thong-tin-tai-khoan');

        } else {
            View::renderTemplate('ThanhVien/thong_tin_tai_khoan.html', [
                'account' => $this->user
            ]);
        }
    }

}