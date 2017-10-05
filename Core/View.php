<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 20/09/2017
 * Time: 11:24 PM
 */
namespace Core;

use App\Auth;
use App\Flash;
use App\Models\HoSo;
use Twig\TwigFunction;

class View
{
    public static function render($view, $args = [])
    {
        $file = "../App/Views/$view";
        extract($args, EXTR_SKIP);
        if (is_readable($file)) {
            require $file;
        } else {
            echo "$file not found";
        }
    }

    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;
        if ($twig === null) {
            $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig_Environment($loader);
//            Them tinh nang twig
            $function = new TwigFunction('inGiaPhaDangCay', function () {
                self::showGiaPha();
            });
            $function2 = new TwigFunction('inGiaPhaDangDung', function () {
                self::showGiaPha2();
            });
            $twig->addFunction($function);
            $twig->addFunction($function2);
//            $twig->addGlobal('session', $_SESSION);
//            $twig->addGlobal('is_logged_in', Auth::isLoggedIn());
            $twig->addGlobal('current_user', Auth::getUser());
            $twig->addGlobal('flash_messages', Flash::getMessages());

        }
        echo $twig->render($template, $args);
    }

    public static function getTemplate($template, $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new \Twig_Loader_Filesystem(dirname(__DIR__) . '/App/Views');
            $twig = new \Twig_Environment($loader);
            $twig->addGlobal('current_user', \App\Auth::getUser());
            $twig->addGlobal('flash_messages', \App\Flash::getMessages());
        }

        return $twig->render($template, $args);
    }

    public static function showGiaPha()
    {
        $data = HoSo::getDuLieuGiaPha();
        self::inGiaPha($data, null);
    }

    public static function showGiaPha2()
    {
        $data = HoSo::getDuLieuGiaPha();
        self::inGiaPhaDangDung($data, null);
    }

    static function inGiaPha($data, $mahsbo = null)
    {
        $flag = false;
        foreach ($data as $val) {
            if ($val['mahosobo'] == $mahsbo) {
                $flag = true;
                break;
            }
        }
        if ($flag) {
            echo "<ul>";
        }
        foreach ($data as $val) {
            $parent = $val['mahosobo'];
            if ($parent == $mahsbo) {
                echo '<li><a class="hop-chua" href="ho-so/' . $val['mahoso'] . '" data-toggle="modal" 
                data-target="#hopThongTin" data-id="' . $val['mahoso'] . '">' . $val['mahoso'] . '–' . $val['hoten']
                    . " (" . $val['hotenvo'] . ")" . '</a>';
                $mahoso = $val['mahoso'];
                self::inGiaPha($data, $mahoso);
            }
        }
        if ($flag) {
            echo "</li></ul>";
        }
    }

    static function inGiaPhaDangDung($data, $mahsbo = null, $hoten = '')
    {
        $flag = false;
        foreach ($data as $val) {
            if ($val['mahosobo'] == $mahsbo) {
                $flag = true;
                break;
            }
        }

        if ($flag) {
            echo "<ul>";
        }
        foreach ($data as $val) {
            $parent = $val['mahosobo'];
            if ($parent == $mahsbo) {
                $flag2 = false;
                foreach ($data as $val2) {

                    if ($val['mahoso'] == $val2['mahosobo']) {
                        $flag2 = true;
                        break;
                    }

                }
                if ($flag2 == true) {
                    if ($mahsbo != null) {
                        $temp = "sub-item";
                    } else {
                        $temp = "item";
                    }

                    $idName = isset($mahsbo) ? $mahsbo : 'root';
                    echo '<li>
                    <div class="' . $temp . '">
                    <input type="checkbox" id="' . $idName . '" checked/>
                    <img src="/images/Arrow.png" class="arrow"><label for="' . $idName . '">' . $val['hoten'] . " - " . $val['hotenvo'] . '</label>';
                } else {
                    echo '<li><a href="#">' . $val['hoten'] . " - " . $val['hotenvo'] . '</a></li>';
                }
                $mahoso = $val['mahoso'];
                self::inGiaPhaDangDung($data, $mahoso, $val['hoten']);
            }

        }
        if ($flag) {
            echo "</li></ul>";
        }
    }
}