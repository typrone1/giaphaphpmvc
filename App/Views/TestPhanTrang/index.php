<script src="/js/jquery-3.2.1.js"></script>
<h1>Sign up</h1>
<?php
$ketnoi = ($GLOBALS["db"] = mysqli_connect("localhost", "root", ""));
if (!$ketnoi)
    echo "Kết nối thất bại";

mysqli_select_db($ketnoi, 'mvc');
mysqli_query($GLOBALS["db"], "set names utf8");

function phan_trang($tenCot, $tenBang, $dieuKien, $soLuongSP, $trang, $dieuKienTrang, $url)
{
    $spbatdau = $trang * $soLuongSP;

    $laySP = " SELECT " . $tenCot . " FROM " . $tenBang . " " . $dieuKien . " LIMIT " . $spbatdau . "," . $soLuongSP;
    $truyvanLaySP = mysqli_query($GLOBALS["db"], $laySP);

    $tongsoluongsp = mysqli_num_rows(mysqli_query($GLOBALS["db"], " SELECT " . $tenCot . " FROM " . $tenBang . " " . $dieuKien));
    $tongsotrang = $tongsoluongsp / $soLuongSP;

    $dsTrang = "";
    for ($i = 0; $i < $tongsotrang; $i++) {
        $sotrang = $i + 1;
        $dsTrang .= "<a class='divtrang_" . $i . "' href='/" . $url. "?trang=" . $i . $dieuKienTrang . "'>" . $sotrang . "</a> ";
    }

    echo "<script> 
                $(document).ready(function(){ 
                    $('.divtrang').html(\"" . $dsTrang . "\") 
                }); 
           </script>";

    return $truyvanLaySP;
}

?>

<div class="product">
    <div class="container">
        <div class="product-main">
            <!--  phan danh sach san pham -->

            <div class="col-md-9 p-left">
                <div class="clearfix"></div>
                <?php
                $trang=0;
                $trang=0;
                if(isset($_GET["trang"]))
                    $trang=$_GET["trang"];
                $laysp = phan_trang("*", "hoso", "", 5, $trang, "","test-phan-trang/index");
                $truyvan_laysp=$laysp;
                $i = 0;
                while ($cot = mysqli_fetch_array($truyvan_laysp)) {
                    $i++;
                    ?>
                    <div class="product-one">
                        <div class="col-md-4 product-left single-left">
                            <div class="p-one simpleCart_shelfItem">

                                <a href="/ho-so/<?php echo $cot["MaHoSo"]; ?>">
                                    <?php echo $cot["HoTen"]; ?>
                                </a>
                            </div>
                        </div>
                    </div>


                    <?php if ($i % 3 == 0) { ?>

                        <div class="clearfix"></div>

                        <?php
                    }
                }
                ?>
                <div class="divtrang"></div>
            </div>
        </div>
    </div>
</div>
