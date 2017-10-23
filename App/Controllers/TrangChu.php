<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 05/10/2017
 * Time: 9:00 AM
 */

namespace App\Controllers;
use App\Models\HoSo;
use Core\Controller;
use Core\View;

class TrangChu extends Controller
{
    public function indexAction(){
        View::renderTemplate('TrangChu/index.html',[
            'dsHoSo' => HoSo::getAll()
        ]);
    }
}