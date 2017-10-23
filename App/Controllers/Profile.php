<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 24/09/2017
 * Time: 10:51 PM
 */

namespace App\Controllers;
use App\Flash;
use Core\View;
use Core\Controller;
use App\Auth;
class Profile extends Authenticated {
    protected function before() {
        parent::before();
        $this->user = Auth::getUser();
    }
    public function showAction(){
        View::renderTemplate('Profile/show.html',['user'=> Auth::getUser()]);
    }
    public function editAction(){
        View::renderTemplate('Profile/edit.html',['user'=> Auth::getUser()]);
    }
    public function updateAction(){
//        $user = Auth::getUser();
        if ($this->user->updateProfile($_POST)){
            Flash::addMessage('Thông tin vừa được cập nhật');
            $this->redirect('/profile/show');
        } else {
            View::renderTemplate('Profile/edit.html',['user'=> $this->user]);
        }
    }
}