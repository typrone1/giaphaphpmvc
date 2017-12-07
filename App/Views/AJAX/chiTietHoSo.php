<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 30/11/2017
 * Time: 11:17 PM
 */
echo '<div class="wrapper">
            <div class="twoOfThree">
                
                <h2 style="text-align: center">Đời thứ: ' . $hoSo->DoiThu . '</h2>
                <p style="text-align: center">Con thứ: ' . $hoSo->ConThu . '</p>
                <h3>' . $hoSo->HoTen . '</h3>
                <p>Họ tên bố: '. $hoSoBo->HoTen .'</p>
                <p>Họ tên mẹ: '. (isset($hoSoMe->HoTen)?$hoSoMe->HoTen:'') .'</p>
                
                <p>Ngày, tháng, năm sinh: ' . ($hoSo->NgaySinh!='0000-00-00'?date('d/m/Y',strtotime($hoSo->NgaySinh)):null). '</p>
                <p>Giới tính: ' . $hoSo->GioiTinh . '</p>
                <p>Quê quán: ' . $hoSo->QueQuan . '</p>
                <p>Địa chỉ: ' . $hoSo->DiaChi . '</p>
                <p>Ngày, tháng, năm tử: </p>
                <div style="margin-left: 1em">
                    <p>Ngày mất (ÂL): ' . ($hoSo->NgayMat!='0000-00-00'?date('d/m/Y',strtotime($hoSo->NgayMat)):null) . '</p>
                    <p>Nơi an táng: ' . $hoSo->NoiAnTang . '</p>
                </div>
            </div>
            <div class="oneOfThree">
                <p>Hình ảnh</p>
                <div style="width: 100%">
                    <img src="/images/user.png" alt="" style="max-width: 100%">
                    <br>
                    <div id="status">
                        <button onclick="addTraCuuXungHo(' . $hoSo->MaHoSo . ')" style="width: 100%; border-radius: 5px;"> <i class="fa fa-search"></i> Tra cách xưng hô</button>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
        <br>
        <hr>
        <div class="wrapper">
            <div class="twoOfThree">
                <h4>Danh sách con</h4>';
        $counter = 1;
        foreach ($dsCon as $con) {
            echo '<input type="hidden" class="maHoSo" value="'.$con->MaHoSo.'">';
            echo '<a href="javascript:;" onclick="showInfo(this);return false;" target="_self">';
            echo $con->HoTen .' (Con thứ: '.$con->ConThu. ')</a><br>';
            $counter++;
        }
        $counter = 0;
        echo '
                    </div>
        
                    <div class="oneOfThree" >
                    <h4> Danh sách vợ </h4>
                    ';
        foreach ($dsVo as $vo) {
            echo '<div >
                    <img src ="/images/user.png" alt = "" style = "width: 20%;" >
                    <p>Họ tên: ' . $vo->HoTen . '</p>
                    <p>NS: ' . ($vo->NgaySinh!='0000-00-00'?date('d/m/Y',strtotime($vo->NgaySinh)):null) . '</p>
                    <p>Quê quán: ' . $vo->QueQuan . '</p>
                    <p>Ngày mất: '.($vo->NgayMat!='0000-00-00'?date('d/m/Y',strtotime($vo->NgayMat)):null).'</p>
                </div><br>';
            $counter++;
        }

        echo '
            </div>
        </div>
        <button> Bổ sung thông tin </button>
        <h3 style="text-align: center">Sơ đồ gia đình</h3>
        <br><br>
        ';