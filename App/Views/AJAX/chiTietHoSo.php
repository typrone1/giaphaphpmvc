<?php

/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 30/11/2017
 * Time: 11:17 PM
 */
echo '<div class="wrapper">
            <div class="twoOfThree">
                <h3>' . $hoSo->HoTen . '</h3>
                <p>Họ tên bố:</p>
                <p>Họ tên mẹ:</p>
                <p>Con thứ: ' . $hoSo->ConThu . '</p>
                <p>Đời thứ: ' . $hoSo->DoiThu . '</p>
                <p>Ngày sinh: ' . $hoSo->NgaySinh . '</p>
                <p>Giới tính: ' . $hoSo->GioiTinh . '</p>
                <p>Quê quán: ' . $hoSo->QueQuan . '</p>
                <p>Địa chỉ: ' . $hoSo->DiaChi . '</p>
            </div>
            <div class="oneOfThree">
                <p>Hình ảnh</p>
                <img src="/images/user.png" alt="">
            </div>
        </div>
        <hr>
        <div class="wrapper">
            <div class="twoOfThree">
                <h4>Danh sách con</h4>';
$counter = 1;
foreach ($dsCon as $con) {
    echo '<p>' . $con->HoTen . '</p >';
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
            <p>NS: ' . $vo->NgaySinh . '</p>
            <p>Quê quán: ' . $vo->QueQuan . '</p>
            <p>Ngày mất: ' . $vo->NgayMat . '</p>
        </div><br>';
    $counter++;
}

echo '
    </div>
        </div>
        <button> Bổ sung thông tin </button>
';