<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 03/12/2017
 * Time: 2:47 PM
 */

namespace App\Models;


class TraCuuXungHo
{
    public $dsDoiTuong = null;
    public $lastID = null;
    public $firstID = null;
    function __construct($oldSession)
    {
        if($oldSession){
            $this->dsDoiTuong = $oldSession->dsDoiTuong;
            $this->lastID = $oldSession->lastID;
            $this->firstID = $oldSession->firstID;
        }
    }
    public function add($hoSo, $maHoSo){
        if($this->dsDoiTuong){
            if(array_key_exists($maHoSo, $this->dsDoiTuong)){
//                $hoSo = $this->dsDoiTuong[$maHoSo];
            }
            else {
                if (!isset($this->firstID)) {
                    $this->dsDoiTuong[$maHoSo] = $hoSo;
                    $this->firstID = $maHoSo;
                } else {
                    unset($this->dsDoiTuong[$this->lastID]);
                    if (isset($this->lastID)) {
                        unset($this->dsDoiTuong[$this->lastID]);
                        $this->dsDoiTuong[$maHoSo] = $hoSo;
                        $this->lastID = $maHoSo;
                    } else if (!isset($this->lastID)){
                        $this->dsDoiTuong[$maHoSo] = $hoSo;
                        $this->lastID = $maHoSo;
                    }
                }
            }
        } else {
            $this->dsDoiTuong[$maHoSo] = $hoSo;
            $this->firstID = $maHoSo;
        }

    }
    public function delete($maHoSo){
        if(array_key_exists($maHoSo, $this->dsDoiTuong)){
            if ($this->lastID == $maHoSo) {
                $this->lastID = null;
            } else {
                $this->firstID = null;

            }
            unset($this->dsDoiTuong[$maHoSo]);

        }

    }
}