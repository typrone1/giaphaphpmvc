<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 20/09/2017
 * Time: 10:42 PM
 */
namespace Core;
use App\Auth;
use App\Flash;
abstract class Controller{
    public function __call($name, $arguments)
    {
        $method = $name . 'Action';
        // TODO: Implement __call() method.
        if (method_exists($this, $method)){
            if ($this->before() !== false){
                call_user_func_array([$this, $method],$arguments);
                $this->after();
            }
        }
        else {
            echo "Không tìm thấy";
            throw new \Exception("Method $method not found in controller " . get_class($this));
        }
    }

    protected $routeParams = [];
    public function __construct($routeParams)
    {
        $this->routeParams = $routeParams;
    }

    protected function before()
    {
//        echo "Before";
//        return false;
    }

    private function after()
    {
//        echo "After";
    }
    public function redirect($url){
        header('Location: http://'. $_SERVER['HTTP_HOST']. $url,true, 303);
        exit;

    }
    public function requireLogin(){
        if (!Auth::isLoggedIn()){
//            exit("Access denine");
            Flash::addMessage('Vui long login', Flash::INFO);
            Auth::rememberRequestedPage();
            $this->redirect('/login');
        }
    }
}