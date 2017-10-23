<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 24/09/2017
 * Time: 5:52 PM
 */

namespace App\Controllers;


use App\Models\User;
use Core\Controller;
use Core\View;

class Password extends Controller
{
    public function forgotAction()
    {
        View::renderTemplate('Password/forgot.html');
    }

    public function requestResetAction()
    {
        User::sendPasswordReset($_POST['email']);

        View::renderTemplate('Password/reset_requested.html');
    }

    public function resetAction()
    {
        $token = $this->routeParams['token'];
//        echo $token;
        $user = $this->getUserOrExit($token);
        $user = User::findByPasswordReset($token);
        View::renderTemplate('Password/reset.html', [
            'token' => $token
        ]);
//        var_dump($user);
//        if ($user){
//            View::renderTemplate('Password/reset.html', [
//                'token' => $token
//            ]);
//        }
//        else {
//            echo "Khong hop le";
//        }
    }

    public function resetPasswordAction()
    {
        $token = $_POST['token'];
        $user = $this->getUserOrExit($token);
        $user = User::findByPasswordReset($token);
//        if ($user){

        if ($user->resetPassword($_POST['password'])) {
            View::renderTemplate('Password/reset_success.html');
        } else {
            View::renderTemplate('Password/reset.html', [
                'token' => $token,
                'user' => $user
            ]);
        }
//        }
//        else {
//            echo "Khong hop le";
//        }
    }

    protected function getUserOrExit($token)
    {
        $user = User::findByPasswordReset($token);

        if ($user) {

            return $user;

        } else {

            View::renderTemplate('Password/token_expired.html');
            exit;

        }
    }
}