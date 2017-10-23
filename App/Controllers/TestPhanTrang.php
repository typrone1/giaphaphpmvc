<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 18/10/2017
 * Time: 5:48 PM
 */

namespace App\Controllers;


use Core\Controller;
use Core\View;

class TestPhanTrang extends Controller
{
    public function indexAction(){
        View::render('TestPhanTrang/index.php');
    }
}