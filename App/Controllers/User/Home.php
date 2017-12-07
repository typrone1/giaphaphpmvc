<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 07/12/2017
 * Time: 1:22 PM
 */

namespace App\Controllers\User;


use App\Models\BaiViet;
use Core\Controller;
use Core\View;

class Home extends Controller
{
    public function index(){
        View::renderTemplate('User/index.html', ['dsBaiViet' => BaiViet::getAll()]);
    }
}