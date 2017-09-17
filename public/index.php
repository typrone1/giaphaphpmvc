<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 16/09/2017
 * Time: 11:05 PM
 */
echo $_SERVER['QUERY_STRING'];
require '../App/Controllers/Posts.php';
require '../Core/Router.php';
$router = new Router();

//echo get_class($router);
//
//    $router->add('',['controller' => 'Home', 'action' => 'index']);
//    $router->add('posts',['controller' => 'Posts', 'action' => 'index']);
//    $router->add('posts/new',['controller' => 'Posts', 'action' => 'new']);

$router->add('{controller}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);
//$router->add('admin/{action}/{controller}');
//$router->add('{controller}/{id:\d+}/{action}');
//Test request match URL

$url = $_SERVER['QUERY_STRING'];

//if ($router->match($url)){
//    echo "<pre>";
//    var_dump($router->getParams());
//    echo "</pre>";
//}
//else {
//    echo "Không tìm thấy kết quả trùng khớp";
//}



//Hiển thị routing table

//echo '<pre>';
//echo htmlspecialchars(print_r($router->getRoutes()), true);
//echo '</pre>';
//
//
//echo '<pre>';
//echo htmlspecialchars(print_r($router->getParams()), true);
//echo '</pre>';
