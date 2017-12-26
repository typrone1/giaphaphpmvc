<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 07/12/2017
 * Time: 1:22 PM
 */

namespace App\Controllers\User;


use App\Models\BaiViet;
use App\Models\HoSo;
use Core\Controller;
use Core\View;

class Home extends Controller
{
    public function index(){
        if(!isset($_SESSION["lastviewed"]))     {
            $_SESSION["lastviewed"] = array();
        }
        $arrayHoSo = [];
        foreach ($_SESSION["lastviewed"] as $item) {
            array_push($arrayHoSo, HoSo::find($item));
        }
//        var_dump($arrayHoSo);
//        die();
        View::renderTemplate('User/index.html', ['dsBaiViet' => BaiViet::getAll(), 'dsXemGanDay' => $arrayHoSo]);
    }
}