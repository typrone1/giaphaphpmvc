<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 05/10/2017
 * Time: 9:23 AM
 */

namespace App\Controllers;


use App\Flash;
use App\Models\HoSo;
use Core\Controller;
use Core\View;

class ThemHoSo extends Controller
{
    public function index(){
        $this->requireQuanTriVien();
        View::renderTemplate('ThemHoSo/index.html');
    }

    public function createAction(){
        $hoSo = new HoSo($_POST);
        if ($hoSo->save()) {
            Flash::addMessage('Tạo hồ sơ thành công');
            $this->redirect('/themhoso/index');
        }
        else {
            Flash::addMessage('Tạo hồ sơ không thành công, vui lòng thử lại sau !', Flash::WARNING);
            $this->redirect('/themhoso/index');
        }
    }
}