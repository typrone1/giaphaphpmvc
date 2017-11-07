<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 07/11/2017
 * Time: 12:44 PM
 */

namespace App\Controllers\User;


use Core\Controller;
use Core\View;

class LoaiTin extends Controller
{
    static $url = '';
    public function indexAction()
    {
        $maLoaiTin = $this->routeParams['id'];
        $trang = 0;
        if (isset($_GET["trang"]))
            $trang = $_GET["trang"];
        $laysp = static::phan_trang("*", "baiviet", "WHERE MaLoaiTin = $maLoaiTin", 2, $trang, "", "/user/LoaiTin/index/".$maLoaiTin);
        $truyvan_laysp = $laysp;
        $dsBaiViet = mysqli_fetch_all($truyvan_laysp, MYSQLI_ASSOC);
        /*Không phân trang*/
//        $dsBaiViet = \App\Models\LoaiTin::getAllPostByCategory($maLoaiTin);
        View::renderTemplate('User/LoaiTin/index.html', ['dsBaiViet' => $dsBaiViet, 'urlPagination' => self::$url]);
    }

    static function phan_trang($tenCot, $tenBang, $dieuKien, $soLuongSP, $trang, $dieuKienTrang, $url)
    {
        $ketnoi = mysqli_connect("localhost", "root", "");
        if (!$ketnoi)
            echo "Kết nối thất bại";
        mysqli_select_db($ketnoi, 'mvc');
        mysqli_query($ketnoi, "set names utf8");
        $spbatdau = $trang * $soLuongSP;

        $laySP = " SELECT " . $tenCot . " FROM " . $tenBang . " " . $dieuKien . " LIMIT " . $spbatdau . "," . $soLuongSP;
        $truyvanLaySP = mysqli_query($ketnoi, $laySP);

        $tongsoluongsp = mysqli_num_rows(mysqli_query($ketnoi, " SELECT " . $tenCot . " FROM " . $tenBang . " " . $dieuKien));
        $tongsotrang = $tongsoluongsp / $soLuongSP;

        $dsTrang = "";
        for ($i = 0; $i < $tongsotrang; $i++) {
            $sotrang = $i + 1;
            $dsTrang .= "<a class='divtrang_" . $i . "' href='" . $url . "?trang=" . $i . $dieuKienTrang . "'>" . $sotrang . "</a> ";
        }

        self::$url = $dsTrang;
        $ketnoi->close();
        return $truyvanLaySP;
    }
}