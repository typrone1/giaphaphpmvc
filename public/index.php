<?php
session_start();
ob_start();
ini_set('session.cookie_lifetime',864000); // 10 days

require_once '../Classes/PHPExcel.php';
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
$router->add('', ['namespace' => 'User', 'controller' => 'Home', 'action' => 'index']);
$router->add('pha-do-dung', ['controller' => 'PhaDo', 'action' => 'index', 'namespace' => 'User']);
$router->add('pha-do-cay', ['controller' => 'PhaDo', 'action' => 'xemPhaDoCay', 'namespace' => 'User']);
$router->add('login', ['controller' => 'Login', 'action' => 'new']);
$router->add('signup/create', ['controller' => 'Signup', 'action' => 'create']);
$router->add('login/', ['controller' => 'Login', 'action' => 'new']);
$router->add('logout', ['controller' => 'Login', 'action' => 'destroy']);
$router->add('password/reset/{token:[\da-f]+}', ['controller' => 'Password', 'action' => 'reset']);
$router->add('admin/ho-so-ngoai-toc/{mahoso:[\da-f]+}', ['namespace' => 'Admin', 'controller' => 'HoSoNgoaiToc', 'action' => 'editHoSoNgoaiToc']);
$router->add('admin/ho-so/{mahoso:[\da-f]+}/them-con', ['controller' => 'HoSo', 'action' => 'themCon', 'namespace' => 'Admin']);
$router->add('admin/pha-do/pha-do-dang-dung', ['namespace' => 'Admin', 'controller' => 'PhaDo', 'action' => 'xemPhaDoDangDung']);
$router->add('admin/tra-cuu-cach-xung-ho', ['namespace' => 'Admin', 'controller' => 'HoSo', 'action' => 'traCuuXungHo']);
$router->add('admin/get-tra-cuu-cach-xung-ho', ['namespace' => 'Admin', 'controller' => 'HoSo', 'action' => 'getTraCuuXungHo']);
$router->add('admin/thanh-vien/danh-sach', ['namespace' => 'Admin', 'controller' => 'ThanhVien', 'action' => 'index']);
$router->add('admin/thanh-vien/cap-quyen', ['namespace' => 'Admin', 'controller' => 'ThanhVien', 'action' => 'capQuyen']);
$router->add('admin/bai-viet/them-bai-viet', ['namespace' => 'Admin', 'controller' => 'BaiViet', 'action' => 'getThemBaiViet']);
$router->add('admin/bai-viet/danh-sach', ['namespace' => 'Admin', 'controller' => 'BaiViet', 'action' => 'getDanhSachBaiViet']);
$router->add('admin/loai-tin', ['namespace' => 'Admin', 'controller' => 'LoaiTin', 'action' => 'index']);
$router->add('admin/thong-tin-tai-khoan', ['namespace' => 'Admin', 'controller' => 'Users', 'action' => 'index']);
$router->add('admin/lich-viec-toc', ['controller' => 'BaiViet', 'action' => 'xemLich', 'namespace' => 'Admin']);
$router->add('admin/ho-so/{mahoso:[\da-f]+}', ['controller' => 'HoSo', 'action' => 'getChiTietHoSo', 'namespace' => 'Admin']);
$router->add('admin/ho-so/them-ho-so', ['controller' => 'HoSo', 'action' => 'themHoSo', 'namespace' => 'Admin']);
$router->add('admin/ho-so/danh-sach', ['controller' => 'HoSo', 'action' => 'index', 'namespace' => 'Admin']);
$router->add('admin/sao-luu/in-file-excel', ['controller' => 'SaoLuuDuLieu', 'action' => 'index', 'namespace' => 'Admin']);
$router->add('admin/sao-luu/post-in-file-excel', ['controller' => 'SaoLuuDuLieu', 'action' => 'postInFileAction', 'namespace' => 'Admin']);
$router->add('admin/pha-do/{chi:\d+}', ['controller' => 'PhaDo', 'action' => 'xemPhaDoChi', 'namespace' => 'Admin']);
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('admin/thanh-vien/{id:\d+}/chinh-sua', ['namespace' => 'Admin', 'controller' => 'ThanhVien', 'action' => 'chinhSua']);
$router->add('admin', ['namespace' => 'Admin', 'controller' => 'Dashboard', 'action' => 'index' ]);
$router->add('admin/ho-so-ngoai-toc/list/{mahoso:[\da-f]+}', ['controller' => 'HoSoNgoaiToc', 'action' => 'getListVoByID', 'namespace' => 'Admin']);
$router->add('admin/ho-so-ngoai-toc/{id:\d+}/them-vo-chong', ['controller' => 'HoSoNgoaiToc', 'action' => 'themVoChong', 'namespace' => 'Admin']);
$router->add('admin/cai-dat', ['namespace' => 'Admin', 'controller' => 'CaiDat', 'action' => 'index']);
$router->add('tim-kiem', ['namespace' => 'User', 'controller' => 'TimKiem', 'action' => 'index']);
$router->add('tra-cuu-xung-ho/add/{mahoso:[\da-f]+}', ['namespace' => 'User', 'controller' => 'TraCuuXungHo', 'action' => 'add']);
$router->add('tra-cuu-xung-ho/delete/{mahoso:[\da-f]+}', ['namespace' => 'User', 'controller' => 'TraCuuXungHo', 'action' => 'delete']);
$router->add('ket-qua-tim-kiem', ['namespace' => 'User', 'controller' => 'TimKiem', 'action' => 'search']);
$router->add('admin/ho-so/{mahoso:[\da-f]+}/cap-nhat', ['namespace' => 'Admin', 'controller' => 'HoSo', 'action' => 'capNhatHoSo']);
$router->add('admin/bai-viet/{mabaiviet:[\da-f]+}/cap-nhat', ['namespace' => 'Admin', 'controller' => 'BaiViet', 'action' => 'postCapNhatBaiViet']);
$router->add('admin/ho-so-ngoai-toc/{mahoso:[\da-f]+}/cap-nhat', ['namespace' => 'Admin', 'controller' => 'HoSoNgoaiToc', 'action' => 'capNhatHoSoNgoaiToc']);
$router->add('admin/ho-so/{mahoso:[\da-f]+}/sua-anh', ['namespace' => 'Admin', 'controller' => 'HoSo', 'action' => 'capNhatAnhHoSo']);
$router->add('{controller}/{action}');
$router->add('api/{controller}/{action}', ['namespace' => 'API']);
$router->add('{controller}/{id:\d+}/{action}');
$router->add('user/{controller}/{action}/{id:\d+}', ['namespace' => 'User']);
$router->add('user/{controller}/{action}', ['namespace' => 'User']);
$router->add('admin/{controller}/{id:\d+}/{action}', ['namespace' => 'Admin']);
$router->add('bai-viet/{id:\d+}', ['namespace' => 'User', 'controller' => 'BaiViet', 'action' => 'xemChiTietBaiViet' ]);
$router->dispatch($_SERVER['QUERY_STRING']);