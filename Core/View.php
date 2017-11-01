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
use Twig_SimpleFunction;

class View
{
    public static function render($view, $args = [])
    {
        $file = "../App/Views/$view";
        extract($args, EXTR_SKIP);
        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }

    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;
        if ($twig === null) {
            $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig_Environment($loader);
//            Them tinh nang twig
            $function = new Twig_SimpleFunction('inGiaPhaDangCay', function () {
                self::showGiaPha();
            });
            $function2 = new Twig_SimpleFunction('inGiaPhaDangDung', function () {
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
                echo '<li><div class="box-item"><a href="/ho-so/' . $val['mahoso'] . '">'  . $val['mahoso'] . '– <i class="fa fa-male" aria-hidden="true"></i> ' . $val['hoten']
                    .'(<i class="fa fa-female" aria-hidden="true"></i>' . $val['hotenvo'] . ")" . '<br>Đời: <b>'.$val['doithu'].'</b>, Con thứ: <b>'.$val['conthu'].'</b><br><img src="/images/anh1.jpg" style="width: 40px; height: 30px"><br>Ngày sinh: '.$val['ngaysinh'].'<br>Ngày kỵ: '.$val['ngaymat'].'</a><br><button class="mo-rong" href="javascript:function() { return false; }">-</button></div>';
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

        // Kiểm tra xem có phải là nút gốc == null;
        foreach ($data as $val) {
            if ($val['mahosobo'] == $mahsbo) {
                $flag = true;
                break;
            }
        }

        if ($flag && $mahsbo != null) {
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
                if ($flag2 == true || $mahsbo == null) {
                    if ($mahsbo != null) {
                        $temp = "sub-item";
                    } else {
                        $temp = "item";
                    }

                    $idName = isset($mahsbo) ? $mahsbo : $random_id = rand(0,1000);;
                    if ($flag && $mahsbo != null) {
                        echo "<li>";
                    }
                    echo '
                    <div class="' . $temp . '">
                    <input type="checkbox" id="' . $idName . '" checked/>
                    <img src="/images/Arrow.png" class="arrow"><label for="' . $idName . '">' . $val['mahoso'] . " - " . $val['hoten'] . " - " . $val['hotenvo'] . '</label>';
                } else {
                    echo '<li><div class="dropdown">
                    <a href="#" class="dropbtn">' . $val['hoten'] . " - " . $val['hotenvo'] . '</a>
                      <div class="dropdown-content">
                        <a href="#"><i class="fa fa-edit"></i> Xem chi tiết</a>
                        <a href="#"><i class="fa fa-edit"></i> Xóa</a>
                        <a href="#"><i class="fa fa-edit"></i> Chỉnh sửa nhanh</a>
                      </div>
                    </div>';
                    if ($flag2 != true) {
                        echo "</li>";
                    }
                    if ($flag2 == true && $parent) {
                        echo "</div>";
                    }
                }
                if ($flag2 != true) {
                    if ($mahsbo == null) {
                        echo "</div>";
                    }
                }
                $mahoso = $val['mahoso'];
                self::inGiaPhaDangDung($data, $mahoso, $val['hoten']);
            }

        }
        if ($flag && $mahsbo != null) {
            echo "</li></ul>";
        }
    }
}