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

class PhaDo extends Controller
{
    protected function indexAction(){
        View::renderTemplate('user/phado/pha_do_dung.html');
    }
    protected function phaDoCayAction(){
        View::renderTemplate('user/phado/pha_do_cay.html');
    }

}