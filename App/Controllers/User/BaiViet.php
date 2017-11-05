<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 05/11/2017
 * Time: 3:31 PM
 */

namespace App\Controllers\User;


use Core\Controller;
use App\Models\BaiViet as BaiVietModel;
use Core\View;

class BaiViet extends Controller
{
    protected function xemChiTietBaiVietAction(){
        $maBaiViet = $this->routeParams['id'];
        $baiViet = BaiVietModel::findOne($maBaiViet);
        View::renderTemplate('User/BaiViet/chi_tiet_bai_viet.html', ['baiViet' => $baiViet]);
    }

}