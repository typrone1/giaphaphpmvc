<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 05/10/2017
 * Time: 3:12 PM
 */

namespace App\Controllers;


use Core\Controller;
use Core\View;

class GiaPha extends Controller
{
    public function indexAction(){
        View::renderTemplate('GiaPha/index.html');
    }
}