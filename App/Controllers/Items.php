<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 23/09/2017
 * Time: 1:01 PM
 */
namespace App\Controllers;

use App\Auth;
use Core\Controller;
use Core\View;

class Items extends Authenticated {
    public function indexAction(){

        View::renderTemplate('Items/index.html');
    }
}