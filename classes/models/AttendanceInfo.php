<?php

class AttendanceInfo{
    /*
        $school_cd
        $grade
        $hr_class
        $schregno
        $reason
        $reason_etc
        $order_date
        $end_date
        $remark1
        $remark2
        $remark3
    */

    public $school_cd;
    public $grade;
    public $hr_class;
    public $schregno;
    public $reason;
    public $reason_etc;
    public $order_date;
    public $end_date;
    public $remark1;
    public $remark2;
    public $remark3;

    public function __construct(){
        $this->school_cd = "";
        $this->grade = "";
        $this->hr_class = "";
        $this->schregno = "";
        $this->reason = "";
        $this->reason_etc = "";
        $this->order_date = "";
        $this->end_date = "";
        $this->remark1 = "";
        $this->remark2 = "";
        $this->remark3 = "";
    }

    public function setSchoolCd($school_cd){
        $this->school_cd = $school_cd;
    }

    public function getSchoolCd(){
        return $this->school_cd;
    }

    public function setGrade($grade){
        $this->grade = $grade;
    }

    public function getGrade(){
        return $this->grade;
    }

    public function setHrClass($hr_class){
        $this->hr_class = $hr_class;
    }

    public function getHrClass(){
        return $this->hr_class;
    }

    public function setSchregno($schregno){
        $this->schregno = $schregno;
    }

    public function getSchregno(){
        return $this->schregno;
    }

    public function setReason($reason){
        $this->reason = $reason;
    }

    public function getReason(){
        return $this->reason;
    }

    public function setReasonEtc($reason_etc){
        $this->reason_etc = $reason_etc;
    }

    public function getReasonEtc(){
        return $this->reason_etc;
    }

    public function setOrderDate($order_date){
        $this->order_date = $order_date;
    }

    public function getOrderDate(){
        return $this->order_date;
    }

    public function setEndDate($end_date){
        $this->end_date = $end_date;
    }

    public function getEndDate(){
        return $this->end_date;
    }

    public function setRemark1($remark1){
        $this->remark1 = $remark1;
    }

    public function getRemark1(){
        return $this->remark1;
    }

    public function setRemark2($remark2){
        $this->remark2 = $remark2;
    }

    public function getRemark2(){
        return $this->remark2;
    }

    public function setRemark3($remark3){
        $this->remark3 = $remark3;
    }

    public function getRemark3(){
        return $this->remark3;
    }



}



?>