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
    public function add($route, $params)
    {
        $this->routes[$route] = $params;
    }

    // Kiểm tra url trùng khớp với routes
    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if ($url == $route) {
                $this->params = $params;
                return true;
            }
        }
        return false;
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