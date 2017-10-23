<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 19/09/2017
 * Time: 12:05 AM
 */
namespace App\Controllers;
use App\Auth;
use App\Mail;
use Core\View;

use Core\Controller;

class Home extends Controller
{
    public function indexAction(){
//        View::render('Home/index.php', ['name' => 'Ty']);
//        View::renderTemplate('Home/index.html',['name'=>'Ty',
//        'colours' => ['Red', 'Blue', 'Green']
//        ]);
//        Mail::send('typrone1@gmail.com','ty','pro','hello');
        View::renderTemplate('Home/index.html',[
            'user' => Auth::getUser()
        ]);
    }
}