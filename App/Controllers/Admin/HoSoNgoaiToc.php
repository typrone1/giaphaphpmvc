<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 26/10/2017
 * Time: 2:54 PM
 */

namespace App\Controllers\Admin;


use Core\Controller;
use Core\View;
use App\Models\HoSoNgoaiToc as HoSoNgoaiTocModel;
class HoSoNgoaiToc extends Controller
{
    public function themVoChongAction(){
        View::renderTemplate('HoSoNgoaiToc/them_ho_so.html',['mahoso' => $this->routeParams['id']]);
    }

    public function postThemHoSoNTAction(){
        $hsnt = new HoSoNgoaiTocModel($_POST);
        if ($hsnt->save()) {
            $this->redirect('/ho-so/'.$hsnt->maHoSo);
        }
        else {
            echo "Tạo thất bại";
        }
    }
}