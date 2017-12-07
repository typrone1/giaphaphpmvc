<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 02/12/2017
 * Time: 12:25 PM
 */
namespace App\Controllers\User;

use App\Models\HoSo;
use Core\Controller;
use Core\View;

class TimKiem extends Controller
{
    protected function indexAction(){
        View::renderTemplate('user/timkiem/search_page.html');
    }
    public function searchAction()
    {
        $key = isset($_GET['keywords']) ? $_GET['keywords'] : '';
        View::renderTemplate('user/timkiem/search_page.html', [
            'dsHoSo' => HoSo::getSearch($key)
        ]);

    }
}