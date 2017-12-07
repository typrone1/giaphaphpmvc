<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 30/11/2017
 * Time: 4:46 PM
 */

namespace App\Controllers\Admin;


use App\Models\HoSo;
use Core\Controller;
use Core\View;

class PhaDo extends Controller
{
    public function indexAction(){
        View::renderTemplate('GiaPha/index.html');
    }
    public function xemPhaDoDangDungAction(){
        View::renderTemplate('GiaPha/gia_pha_dung.html');
        $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
    }
    public function xemPhaDoChiAction(){
        $chiThu = $this->routeParams['chi'];
        View::renderTemplate('GiaPha/pha_do_chi.html', ['hoSo' => HoSo::findByChi($chiThu)]);
    }
}