<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 30/11/2017
 * Time: 4:44 PM
 */

namespace App\Controllers\Admin;


use App\Auth;
use Core\Controller;
use Core\View;

class Dashboard extends Controller
{
    public function indexAction(){
//        View::render('Home/index.php', ['name' => 'Ty']);
//        View::renderTemplate('Home/index.html',['name'=>'Ty',
//        'colours' => ['Red', 'Blue', 'Green']
//        ]);
//        Mail::send('typrone1@gmail.com','ty','pro','hello');
        $this->requireLogin();
        View::renderTemplate('Home/index.html',[
            'user' => Auth::getUser()
        ]);
    }
}