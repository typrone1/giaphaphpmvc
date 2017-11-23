<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 05/10/2017
 * Time: 3:12 PM
 */

namespace App\Controllers;


use App\Models\HoSo;
use Core\Controller;
use Core\View;

class GiaPha extends Controller
{
    public function indexAction(){
        View::renderTemplate('GiaPha/index.html');
    }
    public function giaPhaDangDungAction(){
        View::renderTemplate('GiaPha/gia_pha_dung.html');
    }
    public function phaDoChiAction(){
        $chiThu = $this->routeParams['chi'];
        View::renderTemplate('GiaPha/pha_do_chi.html', ['hoSo' => HoSo::findByChi($chiThu)]);
    }
}