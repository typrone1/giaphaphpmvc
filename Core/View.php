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
            $function = new Twig_SimpleFunction('inGiaPhaDangCay', function ($nutGoc) {
                self::showGiaPha($nutGoc);
            });
            $function2 = new Twig_SimpleFunction('inGiaPhaDangDung', function ($nutGoc) {
                self::showGiaPha2($nutGoc);
            });
            $giaPhaNguoiDung = new Twig_SimpleFunction('giaPhaNguoiDung', function () {
                self::inGiaPhaNguoiDung();
            });
            $rutGonHTML = new Twig_SimpleFunction('rutGonHTML', function ($string) {
                return Html2Text::convert($string);
            });
            $twig = new \Twig_Environment($loader, array(
                'debug' => true,
            ));
            $twig->addExtension(new \Twig_Extension_Debug());
            $twig->addFunction($function);
            $twig->addFunction($function2);
            $twig->addFunction($giaPhaNguoiDung);
            $twig->addFunction($rutGonHTML);
//            $twig->addGlobal('session', $_SESSION);
            $twig->addGlobal('lastviewed', $_SESSION["lastviewed"]);
//            $twig->addGlobal('is_logged_in', Auth::isLoggedIn());
            $twig->addGlobal('current_user', Auth::getUser());
            $twig->addGlobal('flash_messages', Flash::getMessages());
            $twig->addExtension(new AppExtension());
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

    public static function showGiaPha($nutGoc)
    {
        $data = HoSo::getDuLieuGiaPha();
        self::inGiaPha($data, $nutGoc);
    }

    public static function showGiaPha2($nutGoc)
    {
        $data = HoSo::getDuLieuGiaPha();
        self::inGiaPhaDangDung($data, $nutGoc);
    }

    public static function inGiaPhaNguoiDung()
    {
        $data = HoSo::getDuLieuGiaPha();
        self::giaPhaNguoiDung($data, null, true);
    }

    static function giaPhaNguoiDung($data, $maHoSoBo = null, $init = false)
    {
        $flag = false;
        foreach ($data as $val) {
            if ($val['mahosobo'] == $maHoSoBo) {
                $flag = true;
                break;
            }
        }
        if ($flag) {
            if ($init == true) {
                echo '<ul id="treeMenu">';
            } else {
                echo '<ul>';
            }
        }
        foreach ($data as $val) {
            $parent = $val['mahosobo'];
            if ($parent == $maHoSoBo) {
                $gioiTinh = $val['gioitinh'] == 0 ? '♂' : '♀';
                echo '
                <li>
                    <input type="hidden" class="maHoSo" value="'.$val['mahoso'].'">
                    <a href="javascript:;" onclick="showInfo(this);return false;" target="_self" style="'.($val['ngaymat']?'color: grey':'color: red').'">
                        <span> Đ: ' . $val['doithu'] . ', C: ' . $val['conthu'] . ' - ' . $val['hoten'] . ' ' . $gioiTinh . '
                            <i style="color:red"></i>
                        </span>
                    </a>';
                $maHoSo = $val['mahoso'];
                self::giaPhaNguoiDung($data, $maHoSo);
            }
        }
        if ($flag) {
            echo "</li></ul>";
        }
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
            echo '<ul class="">';
        }
        foreach ($data as $val) {
            $parent = $val['mahosobo'];
            if ($parent == $mahsbo) {
                $date = !$val['ngaymat'] ? ('NS: ' . (date('d/m/Y',strtotime($val['ngaysinh'])))) : ('Ngày mất: ' . (date('d/m/Y',strtotime($val['ngaymat']))));
                echo '<li class="zoomTarget" data-targetsize="1" data-scalemode="both" data-nativeanimation="true"><div class="dropdown box-item ' . ($val['ngaymat'] ? 'die' : '') . ' zoomTarget" data-targetsize="0.30" data-duration="600"><a style="font-size: 1.2em; font-weight: bold" href="/admin/ho-so/' . $val['mahoso'] . '">' . $val['hoten'] . '- ('
                    . $val['hotenvo'] . ")" . '</a><br>Đời: <b>' . $val['doithu'] . '</b>, Con thứ: <b>' . $val['conthu'] . '</b><br><img src="/images/user.png" style="width: 40px; height: 30px"><br>' . $date . '<br><button class="mo-rong" href="javascript:function() { return false; }">-</button><div class="dropdown-content">
        <a href="#">Thêm con</a>
        <a href="#">Chỉnh sửa</a>
        <a href="#">Xóa</a>
    </div></div>';
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

                    $idName = isset($mahsbo) ? $mahsbo : $random_id = rand(0, 1000);;
                    if ($flag && $mahsbo != null) {
                        echo "<li>";
                    }
                    echo '
                    <div class="' . $temp . '">
                    <input type="checkbox" id="' . $idName . '" checked/>
                    <div class="dropdown">';
                    if ($flag2)
                        echo '<img src="/images/Arrow.png" class="arrow">';
                    echo '<label for="' . $idName . '" class="dropbtn">Đời thứ: ' . $val['doithu'] . ', Con thứ: ' . $val['conthu'] . " - " . $val['hoten'] . " - " . $val['hotenvo'] . '</label><div class="dropdown-content">
                        <a href="/admin/ho-so/' . $val['mahoso'] . '"><i class="fa fa-edit"></i> Xem chi tiết</a>
                        <a href="/admin/ho-so/' . $val['mahoso'] . '/deleteHoSo"><i class="fa fa-edit"></i> Xóa</a>
                        <a href="#" class="chinhSuaNhanh" data-toggle="modal" 
            data-target="#chinhSuaNhanh" data-id="' . $val['mahoso'] . '"><i class="fa fa-edit"></i> Chỉnh sửa nhanh</a>
                      </div></div>';

                } else {
                    echo '<li><div class="dropdown">
                    <a href="/admin/ho-so/' . $val['mahoso'] . '" class="dropbtn">Đời thứ: ' . $val['doithu'] . ', Con thứ: ' . $val['conthu'] . ' - ' . $val['hoten'] . " - " . $val['hotenvo'] . '</a>
                      <div class="dropdown-content">
                        <a href="/admin/ho-so/' . $val['mahoso'] . '"><i class="fa fa-edit"></i> Xem chi tiết</a>
                        <a href="/admin/ho-so/' . $val['mahoso'] . '/deleteHoSo"><i class="fa fa-edit"></i> Xóa</a>
                        <a href="#" class="chinhSuaNhanh" data-toggle="modal" 
            data-target="#chinhSuaNhanh" data-id="' . $val['mahoso'] . '"><i class="fa fa-edit"></i> Chỉnh sửa nhanh</a>
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