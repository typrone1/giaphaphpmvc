<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 22/09/2017
 * Time: 3:46 PM
 */
namespace App\Controllers;
use App\Models\User;
use Core\Controller;
use Core\View;

class Signup extends Controller
{
    public function newAction(){
        View::renderTemplate('Signup/new.html');
    }

    public function createAction(){
        $user = new User($_POST);
        if ($user->save()) {

//            $user->sendActivationEmail();
            $this->redirect('/signup/success');

//            header('Location: http://'. $_SERVER['HTTP_HOST']. '/signup/success',true, 303);
//            exit;
//            Cái này bị lỗi double POST
//            View::renderTemplate('Signup/success.html');
//            echo "Chuyển hướng thành công";

//            Tìm hiểu code 303 là code ...
        } else {
            View::renderTemplate('Signup/new.html', ['user' => $user]);
//            var_dump($user->errors);
        }
    }
    public function successAction(){
        View::renderTemplate('Signup/success.html');
    }
    public function activateAction()
    {
        User::activate($this->routeParams['token']);

        $this->redirect('/signup/activated');
    }

    /**
     * Show the activation success page
     *
     * @return void
     */
    public function activatedAction()
    {
        View::renderTemplate('Signup/activated.html');
    }
}