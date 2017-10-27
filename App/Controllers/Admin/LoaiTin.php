<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 26/10/2017
 * Time: 11:04 PM
 */

namespace App\Controllers\Admin;


use Core\Controller;
use Core\View;

class LoaiTin extends Controller
{
    public function indexAction(){
        View::renderTemplate('LoaiTin/index.html', ['dsLoaiTin' => \App\Models\LoaiTin::getAll()]);
    }
    public function postThemLoaiTin(){
        $loaiTin = new \App\Models\LoaiTin($_POST);
        if ($loaiTin->save()){
            echo "Them thanh cong";
        }
        else {
            echo "Them that bai";
        }
    }
}