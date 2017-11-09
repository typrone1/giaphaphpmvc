<?php
session_start();
ob_start();
ini_set('session.cookie_lifetime',864000); // 10 days

// Da co Autoload
//include 'app/Database/Query/SqlClauses.php';
//include 'app/Database/Query/BaseSqlBuilder.php';
//include 'app/Database/Query/MySqlBuilder.php';
//include 'app/Database/MySqlConnection.php';

use App\Database\MySqlConnection;
use App\Database\Query\MySqlBuilder;

/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 16/09/2017
 * Time: 11:05 PM
 */
//echo $_SERVER['QUERY_STRING'];
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

require_once dirname(__DIR__).'/vendor/autoload.php';
//require_once dirname(__DIR__).'/vendor/twig/twig/lib/Twig/Autoloader.php';
//Twig_Autoloader::register();

//require '../App/Controllers/Posts.php';
//require '../Core/Router.php';
$router = new Core\Router();

//echo get_class($router);
//
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('login', ['controller' => 'Login', 'action' => 'new']);
$router->add('login/', ['controller' => 'Login', 'action' => 'new']);
$router->add('logout', ['controller' => 'Login', 'action' => 'destroy']);
$router->add('xem-lich', ['controller' => 'BaiViet', 'action' => 'XemLich', 'namespace' => 'Admin']);
$router->add('password/reset/{token:[\da-f]+}', ['controller' => 'Password', 'action' => 'reset']);
//    $router->add('posts',['controller' => 'Posts', 'action' => 'index']);
//    $router->add('posts/new',['controller' => 'Posts', 'action' => 'new']);
$router->add('signup/activate/{token:[\da-f]+}', ['controller' => 'Signup', 'action' => 'activate']);
$router->add('ho-so/{mahoso:[\da-f]+}', ['controller' => 'ChiTietHoSo', 'action' => 'getChiTietHoSo']);
$router->add('ho-so-ngoai-toc/{mahoso:[\da-f]+}', ['namespace' => 'Admin', 'controller' => 'HoSoNgoaiToc', 'action' => 'editHoSoNgoaiToc']);
$router->add('ho-so/{mahoso:[\da-f]+}/them-con', ['controller' => 'HoSo', 'action' => 'themCon', 'namespace' => 'Admin']);
$router->add('ho-so/{mahoso:[\da-f]+}/edit', ['controller' => 'ChiTietHoSo', 'action' => 'edit']);
$router->add('danh-sach-ho-so', ['controller' => 'TestPhanTrang', 'action' => 'index']);
$router->add('pha-do-dung', ['controller' => 'PhaDo', 'action' => 'index', 'namespace' => 'User']);
$router->add('pha-do-cay', ['controller' => 'PhaDo', 'action' => 'phaDoCay', 'namespace' => 'User']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
//$router->add('admin/{action}/{controller}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('user/{controller}/{action}/{id:\d+}', ['namespace' => 'User']);
$router->add('user/{controller}/{action}', ['namespace' => 'User']);
$router->add('admin/{controller}/{id:\d+}/{action}', ['namespace' => 'Admin']);

$router->add('bai-viet/{id:\d+}', ['namespace' => 'User', 'controller' => 'BaiViet', 'action' => 'xemChiTietBaiViet' ]);
$router->dispatch($_SERVER['QUERY_STRING']);
////Test request match URL
//
//$url = $_SERVER['QUERY_STRING'];

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
//$connection = new MySqlConnection([
//    'dbname' => 'mvc',
//    'hostname' => '127.0.0.1',
//    'username' => 'root',
//    'password' => '',
//]);
//
//// create a new mysql instance.
//$builder = new MySqlBuilder($connection);
//
//// test an example.
//$user = $builder
//    ->select('mahoso', 'hoten')
//    ->where('mahoso', 1)
//    ->from('hoso')
//    ->first();
//
//print_r($user->hoten);
//
//// get a compiled select.
//$sql = $builder->select('id', 'fullname')
//    ->from('users')
//    ->where('id', '=', 3)
//    ->getCompiledSelectStatement();
//
//print_r($sql);