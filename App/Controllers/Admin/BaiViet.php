<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 26/10/2017
 * Time: 4:14 PM
 */

namespace App\Controllers\Admin;


use Core\Controller;
use Core\View;
use App\Models\BaiViet as BaiVietModel;
use App\Models\LoaiTin;
class BaiViet extends Controller
{
    public function indexAction(){

    }

    public function getDanhSachBaiVietAction(){
        View::renderTemplate('BaiViet/danh_sach_bai_viet.html', ['dsBaiViet' => BaiVietModel::getAll()]);
    }

    public function getThemBaiViet(){
        View::renderTemplate('BaiViet/viet_bai.html',['dsLoaiTin' => LoaiTin::getAll()]);
    }
    public function getSuaBaiViet(){
        View::renderTemplate('BaiViet/chinh_sua_bai_viet.html',['baiViet' => BaiVietModel::findOne(1),'dsLoaiTin' => LoaiTin::getAll()]);
    }
    public function postThemBaiViet(){
        $post = new BaiVietModel($_POST);
        if ($post->save()){
            echo "Them thanh cong";
        }
    }
}