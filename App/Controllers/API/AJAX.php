<?php

/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 30/11/2017
 * Time: 11:14 PM
 */
namespace App\Controllers\API;
use App\Models\HoSo;
use App\Models\HoSoNgoaiToc;
use Core\Controller;
use Core\View;

class AJAX extends Controller
{
    public function indexAction(){
        $hoSo = HoSo::find($_GET['maHoSo']);
        $dsVo = HoSoNgoaiToc::findByChong($hoSo->MaHoSo);
        $dsCon = HoSo::findAllByParent($hoSo->MaHoSo);
        View::render('AJAX/chiTietHoSo.php', ['hoSo' => $hoSo, 'dsVo' => $dsVo, 'dsCon' => $dsCon]);
    }
}