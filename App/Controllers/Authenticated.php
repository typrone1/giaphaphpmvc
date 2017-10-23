<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 23/09/2017
 * Time: 8:40 PM
 */

namespace App\Controllers;


use Core\Controller;

abstract class Authenticated extends Controller
{
    protected function before(){
        $this->requireLogin();
    }
}