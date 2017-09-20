<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 20/09/2017
 * Time: 10:42 PM
 */
namespace Core;
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
        }
    }

    protected $routeParams = [];
    public function __construct($routeParams)
    {
        $this->routeParams = $routeParams;
    }

    private function before()
    {
        echo "Before";
//        return false;
    }

    private function after()
    {
        echo "After";
    }
}