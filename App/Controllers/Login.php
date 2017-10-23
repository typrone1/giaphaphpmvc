<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 22/09/2017
 * Time: 11:24 PM
 */
namespace App\Controllers;

use App\Auth;
use App\Flash;
use App\Models\User;
use Core\Controller;
use Core\View;

class Login extends Controller
{
    public function newAction()
    {
        View::renderTemplate('Login/new.html');
    }

    public function createAction()
    {
//        echo($_REQUEST['email'] . ', ' . $_REQUEST['password']);
//        $user =User::findByEmail($_POST['email']);
//        var_dump($user);
        $remember_me = isset($_POST['remember_me']);
        $user = User::authenticate($_POST['email'], $_POST['password']);
        if ($user) {
            Flash::addMessage('Login success');
            Auth::login($user, $remember_me);

//            session_regenerate_id(true);
//            $_SESSION['user_id'] = $user->id;
//            echo $_SESSION['user_id'];
//            die();
//            $this->redirect('/');

            $this->redirect(Auth::getReturnToPage());
        } else {
            Flash::addMessage('Login that bai, vui long thu lai', Flash::WARNING);
            View::renderTemplate('Login/new.html', [
                'email' => $_POST['email'],
                'remember_me' => $remember_me
            ]);
        }
    }
    public function destroyAction()
    {
        Auth::logout();
        $this->redirect('/login/show-logout-message');
//        // Unset all of the session variables
//        $_SESSION = [];
//
//        // Delete the session cookie
//        if (ini_get('session.use_cookies')) {
//            $params = session_get_cookie_params();
//
//            setcookie(
//                session_name(),
//                '',
//                time() - 42000,
//                $params['path'],
//                $params['domain'],
//                $params['secure'],
//                $params['httponly']
//            );
//        }
//
//        // Finally destroy the session
//        session_destroy();


    }
    // Do ham logout da huy session nen flash message cung bi huy luon nen phai lap ham moi
    public function showLogoutMessageAction(){
        Flash::addMessage('Logout success');
        $this->redirect('/');
    }

}