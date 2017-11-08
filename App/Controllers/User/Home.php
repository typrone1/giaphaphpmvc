<?php

namespace App\Controllers\User;
use App\Auth;
use App\Controllers\Authenticated;
use App\Models\BaiViet;
use Core\Controller;
use Core\View;
class Home extends Controller
{
    public function indexAction(){
        View::renderTemplate('User/index.html', ['dsBaiViet' => BaiViet::getAll()]);
    }
}