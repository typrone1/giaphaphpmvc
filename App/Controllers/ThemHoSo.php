<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 05/10/2017
 * Time: 9:23 AM
 */

namespace App\Controllers;


use App\Models\HoSo;
use Core\Controller;
use Core\View;

class ThemHoSo extends Controller
{
    public function index(){
        View::renderTemplate('ThemHoSo/index.html');
    }

    public function createAction(){
        $hoSo = new HoSo($_POST);
        if ($hoSo->save()) {
            echo "Tạo thành công";
        }
        else {
            echo "Tạo thất bại";
        }
    }
}