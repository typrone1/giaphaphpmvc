<?php

/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 16/09/2017
 * Time: 11:16 PM
 */
namespace Core;
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
//
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
//
//        Cách 2:
//
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
        $url = $this->removeQueryStringVariables($url);
        if ($this->match($url)){
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
//            $controller = "App\Controllers\\$controller";
            $controller = $this->getNamespace().$controller;
            if (class_exists($controller)){
                $controller_object = new $controller($this->params);
                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);
                if (is_callable([$controller_object, $action])){
                    $controller_object->$action();
                } else {
                    echo "Method $action in ($controller) not found";
                    throw new \Exception("Method $action in controller $controller cannot be called directly - remove the Action suffix to call this method");
                }
            }
            else {
                echo "$controller not found";
                throw new \Exception("Controller class $controller not found");
            }
        }
        else {
            throw new \Exception('No route matched.', 404);
        }
    }

    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }


    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }
    public function getParams()
    {
        return $this->params;
    }

    public function getRoutes()
    {
        return $this->routes;
    }
    protected function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }

        return $url;
    }

    protected function getNamespace()
    {
        $namespace = 'App\Controllers\\';

        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }
}