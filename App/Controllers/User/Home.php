<?php

namespace App\Controllers\User;
use App\Auth;
use App\Controllers\Authenticated;
use Core\Controller;
use Core\View;
class Home extends Authenticated
{
    protected function before()
    {
        parent::yeuCauQuanTriVien();
        $this->user = Auth::getUser();
    }
    public function indexAction(){
        View::renderTemplate('User/index.html');
    }
}