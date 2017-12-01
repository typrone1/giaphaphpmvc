<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 23/11/2017
 * Time: 7:41 PM
 */
namespace App\Controllers\Admin;
use Core\View;
class CaiDat extends \Core\Controller {
    function indexAction(){
        View::renderTemplate('CaiDat/index.html');
    }
}