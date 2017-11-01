<?php

namespace App\Controllers\User;
use Core\Controller;
use Core\View;
class Home extends Controller
{
    public function indexAction(){
        View::renderTemplate('User/index.html');
    }
}