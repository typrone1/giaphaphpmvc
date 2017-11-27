<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 24/11/2017
 * Time: 11:09 PM
 */

namespace App\Controllers\Admin;


use App\Models\HoSo;
use App\Models\HoSoNgoaiToc;
use Core\Controller;
use Core\View;

class SaoLuuDuLieu extends Controller
{
    static $copySheet;
    function index(){
        View::renderTemplate('SaoLuuDuLieu/index.html');
    }
    public function postXuatFileAction(){
        $mysqli = mysqli_connect('localhost', 'root', '', 'giaphadb');
        $mysqli->set_charset('utf8');
        if (mysqli_connect_error()) {
            echo 'Connect failed '. mysqli_connect_error();
            exit();
        }
        if(isset($_POST['btnExport'])){
            $objExcel = new \PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('1');
            self::$copySheet = $sheet;
            $rowCount = 1;


            $sheet->setCellValue('A'.$rowCount,'Thế thứ');
            $sheet->setCellValue('B'.$rowCount,'Họ tên');
            $sheet->setCellValue('C'.$rowCount,'Con cái');
            $sheet->setCellValue('D'.$rowCount,'Quê quán');
            $sheet->setCellValue('E'.$rowCount,'Ngày sinh');
            $sheet->setCellValue('F'.$rowCount,'Ngày mất');
            $sheet->setCellValue('G'.$rowCount,'Giới tính');
            $sheet->setCellValue('H'.$rowCount,'Ghi chú');
            $sheet->getColumnDimension("A")->setAutoSize(true);
            $sheet->getColumnDimension("B")->setAutoSize(true);
            $sheet->getColumnDimension("C")->setAutoSize(true);
            $sheet->getColumnDimension("D")->setAutoSize(true);
            $sheet->getColumnDimension("E")->setAutoSize(true);
            $sheet->getColumnDimension("F")->setAutoSize(true);
            $sheet->getColumnDimension("G")->setAutoSize(true);
            $sheet->getColumnDimension("H")->setAutoSize(true);
            $sheet->getStyle('A1:H1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff00');
            $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A1:H1')->getFont()->setBold(true);
//            $result = $mysqli->query("SELECT * FROM HoSo");
//            while($row = mysqli_fetch_array($result)){
//                $rowCount++;
//                $sheet->setCellValue('A'.$rowCount,$row['DoiThu']);
//                $sheet->setCellValue('B'.$rowCount,$row['HoTen']);
//                $sheet->setCellValue('C'.$rowCount,$row['ConThu']);
//                $sheet->setCellValue('D'.$rowCount,$row['QueQuan']);
//                $sheet->setCellValue('E'.$rowCount,$row['NgaySinh']);
//                $sheet->setCellValue('F'.$rowCount,$row['NgayMat']);
//                $sheet->setCellValue('G'.$rowCount,$row['GioiTinh']);
//                $sheet->setCellValue('H'.$rowCount, null);
//            }
            $data = HoSo::getDuLieuGiaPha();
            $dsHoSoNgoaiToc = HoSoNgoaiToc::getAll();
            $rowCount = self::xuatFileExcel($data, $dsHoSoNgoaiToc);

//            $sheet->setCellValue('B'.($rowCount+1), "=SUM(B2:D$rowCount)/COUNT(B2:D$rowCount)");
//            $sheet->setCellValue('C'.($rowCount+1), "=SUM(D2:D$rowCount)/COUNT(C2:D$rowCount)");
//            $sheet->setCellValue('D'.($rowCount+1), "=SUM(D2:D$rowCount)/COUNT(D2:D$rowCount)");
//            $sheet->setCellValue('A'.($rowCount+1), "Điểm trung bình: ");

//            $sheet->getStyle('A'.($rowCount+1))->getFont()->setBold(true);
            $styleArray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => \PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            $sheet->getStyle('A1:'.'H'.($rowCount+1))->applyFromArray($styleArray);

            $objWriter = new \PHPExcel_Writer_Excel2007($objExcel);
            $filename = 'export.xlsx';
            $objWriter->save($filename);

            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
            header('Content-Length: ' . filesize($filename));
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: no-cache');
            readfile($filename);
            return;

        }

    }
    function xuatFileExcel($data, $dsHoSoNgoaiToc){

        $curDoiThu = 1;
        $curConThu = 1;
        $maHoSoBo = null;
        $rowCount = 1;
        $hasNextGeneration = false;
        $hasPrint = false;
        foreach ($data as $value) {
            if (!$hasNextGeneration && !$hasPrint) {
                self::$copySheet->setCellValue('A' . ++$rowCount, 'Đời thứ: ' . $curDoiThu);
                self::$copySheet->getStyle('A'.($rowCount))->getFont()->setBold(true);
                $hasPrint = true;
            }
            $hasChildren = false;
            if ($value['doithu'] == $curDoiThu) {
                $rowCount++;
                self::$copySheet->setCellValue('A'.$rowCount,$value['doithu'].'.'.$value['conthu']);
                self::$copySheet->setCellValue('B'.$rowCount,$value['hoten']);
                self::$copySheet->setCellValue('D'.$rowCount,$value['quequan']);
                self::$copySheet->setCellValue('E'.$rowCount,$value['ngaysinh']);
                self::$copySheet->setCellValue('F'.$rowCount,$value['ngaymat']);

                $maHoSoBo = $value['mahoso'];

                /* Tim con max */
                $maxConThu = 0;
                foreach ($data as $element) {
                    if (($element['conthu'] > $maxConThu) && ($element['doithu'] == $curDoiThu)) {
                        $maxConThu = $element['conthu'];
                    }
                }
                /* End */
                foreach ($dsHoSoNgoaiToc as $hsNT) {
                    if ($hsNT['MaHoSo'] == $value['mahoso']) {
                        $rowCount++;
                        self::$copySheet->setCellValue('B'.$rowCount,'Vợ: '.$hsNT['HoTen']);
                        self::$copySheet->setCellValue('D'.$rowCount,$hsNT['QueQuan']);
                        self::$copySheet->setCellValue('E'.$rowCount,$hsNT['NgaySinh']);
                        self::$copySheet->setCellValue('F'.$rowCount,$hsNT['NgayMat']);
                    }

                    $maHoSoMe = $hsNT['MaHoSoNT'];
                    foreach ($data as $valChild) {
                        if ($valChild['doithu'] == $curDoiThu+1 && $valChild['mahosobo'] == $maHoSoBo) {
                            $hasChildren = true;
                        }
                        if ($valChild['doithu'] == $curDoiThu+1 && $valChild['mahosobo'] == $maHoSoBo && $maHoSoMe == $valChild['mahosome']) {
                            $rowCount++;
                            self::$copySheet->setCellValue('A'.$rowCount,$valChild['doithu'].'.'.$valChild['conthu']);
                            self::$copySheet->setCellValue('C'.$rowCount,$valChild['hoten']);
                            self::$copySheet->setCellValue('D'.$rowCount,$valChild['quequan']);
                            self::$copySheet->setCellValue('E'.$rowCount,$valChild['ngaysinh']);
                            self::$copySheet->setCellValue('F'.$rowCount,$valChild['ngaymat']);
                            if ($maxConThu == $value['conthu']) {
                                $hasNextGeneration = true;
                            }
                        }
                    }
                }
                if ($hasChildren == true) {
                    $rowCount++;
                    self::$copySheet->setCellValue('B'.$rowCount,'Vợ:');
                }
                foreach ($data as $valChild) {
                    if ($valChild['doithu'] == $curDoiThu+1 && $valChild['mahosobo'] == $maHoSoBo && $valChild['mahosome'] == null) {
                        $rowCount++;
                        self::$copySheet->setCellValue('A'.$rowCount,$valChild['doithu'].'.'.$valChild['conthu']);
                        self::$copySheet->setCellValue('C'.$rowCount,$valChild['hoten']);
                        self::$copySheet->setCellValue('D'.$rowCount,$valChild['quequan']);
                        self::$copySheet->setCellValue('E'.$rowCount,$valChild['ngaysinh']);
                        self::$copySheet->setCellValue('F'.$rowCount,$valChild['ngaymat']);
                        if ($maxConThu == $value['conthu']) {
                            $hasNextGeneration = true;
                        }
                    }
                }
            }
            if ($hasNextGeneration) {
                $hasNextGeneration = false;
                $curDoiThu++;
                $hasPrint = false;
            }

        }
        return $rowCount;

//        if ($hasChildren) {
//            if ($init == true) {
//                $rowCount++;
//                self::$copySheet->setCellValue('A'.$rowCount,'Đời thứ: '. $lastVal['doithu']);
//                self::xuatFileExcel($data, $lastVal['mahoso'], true, $rowCount);
//            } else {
//                $rowCount++;
//                self::$copySheet->setCellValue('A'.$rowCount,$lastVal['doithu'].'.'.$lastVal['conthu']);
//                self::$copySheet->setCellValue('B'.$rowCount,$lastVal['hoten']);
//                self::$copySheet->setCellValue('D'.$rowCount,$lastVal['quequan']);
//                self::$copySheet->setCellValue('E'.$rowCount,$lastVal['ngaysinh']);
//                self::$copySheet->setCellValue('F'.$rowCount,$lastVal['ngaymat']);
//                self::$copySheet->setCellValue('H'.$rowCount,'');
//                self::xuatFileExcel($data, $lastVal['mahoso'], false, $rowCount);
//            }
//        }
//        foreach ($data as $val) {
//            $rowCount++;
//            $parent = $val['mahosobo'];
//            if ($parent == $maHoSoBo) {
//                $gioiTinh = $val['gioitinh'] == 0 ? 'Nữ' : 'Nam';
//                self::$copySheet->setCellValue('A'.$rowCount,$val['doithu'].'.'.$val['conthu']);
//                self::$copySheet->setCellValue('C'.$rowCount,$val['hoten']);
//                self::$copySheet->setCellValue('D'.$rowCount,$val['quequan']);
//                self::$copySheet->setCellValue('E'.$rowCount,$val['ngaysinh']);
//                self::$copySheet->setCellValue('F'.$rowCount,$val['ngaymat']);
//                self::$copySheet->setCellValue('G'.$rowCount,$gioiTinh);
//                self::$copySheet->setCellValue('H'.$rowCount,'');
//                $maHoSo = $val['mahoso'];
//                self::xuatFileExcel($data, $maHoSo, false, $rowCount);
//            }
//        }
//        if ($hasChildren) {
//            $rowCount++;
//            self::xuatFileExcel($data, $lastVal['mahoso'], false, $rowCount);
//        }

    }
}