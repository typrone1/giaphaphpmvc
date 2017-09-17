<?php

/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 16/09/2017
 * Time: 11:16 PM
 */
class Router
{
    protected $routes = [];
    protected $params = []; //Danh sách tham số từ route trùng khớp

    // Thêm route vào bảng routes
//    public function add($route, $params)
//    {
//        $this->routes[$route] = $params;
//    }

//Cách 2:
    public function add($route, $params = [])
    {
        // Ví dụ Query String = posts/edit
        // Chuyển dấu / thành \ {controller}/{action}
        $route = preg_replace('/\//','\\/', $route);
        // posts\edit
        // Chuyển đổi {controller} thành dạng name capture group
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
        // (posts)\edit => posts

        // Lấy tham số đầu vào {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        $route = '/^'. $route . '$/i';
        $this->routes[$route] = $params;
    }

    // Kiểm tra url trùng khớp với routes
    public function match($url)
    {

//        foreach ($this->routes as $route => $params) {
//            if ($url == $route) {
//                $this->params = $params;
//                return true;
//            }
//        }
//        return false;

//        $bieu_thuc_chinh_quy = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";
//        if (preg_match($bieu_thuc_chinh_quy, $url, $matches)){
//            $params = [];
//            foreach ($matches as $key => $match){
//                if (is_string($key)){
//                    $params[$key] = $match;
//                }
//            }
//            $this->params = $params;
//            return true;
//        }
//        return false;

        //Cách 2:

//
//        foreach ($this->routes as $route => $params){
//            if(preg_match($route, $url, $matches)){
//                foreach ($matches as $key => $match){
//                    if (is_string($key)){
//                        $params[$key] = $match;
//                    }
//                }
//                $this->params = $params;
//                return true;
//            }
//        }
//        return false;

        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                // Get named capture group values
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    public function dispatch($url){
        if ($this->match($url)){
            $controller = $this->params['controller'];
            $controller = $this->convertKieuTenClass($controller);
            if (class_exists($controller)){
                $controller_object = new $controller();
                $action = $this->params['action'];
                $action = $this->convertKieuLacDa($action);
                if (is_callable([$controller_object, $action])){
                    $controller_object->$action();
                } else {
                    echo "Method $action in ($controller) not found";

                }
            }
            else {
                echo "$controller not found";
            }
        }
        else {
            echo "No route match";
        }
    }

    protected function convertKieuTenClass($string){
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));

    }

    protected function convertKieuLacDa($string){
        return lcfirst($this->convertKieuTenClass($string));
    }
    public function getParams()
    {
        return $this->params;
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}