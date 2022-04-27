<?php
require_once('models/Setting_Inst.php');
class LoadInst
{
    const file_json = "/inst.json";

    public function loadData()
    {
        $arr = [];
        $getdata_json = json_decode(@file_get_contents(dirname(__DIR__) . self::file_json), true);
        $inst = (isset($getdata_json['inst'])) ? $getdata_json['inst'] : '';
        if (!empty($inst)) {
            foreach ($inst as $val) {
                $model = new Setting_Inst();
                $model->setPref((int)$val['pref']);
                $model->setSchoolCode($val['school_code']);
                $model->setCity($val['city']);
                $model->setDivision($val['division']);
                $model->setSchoolArea($val['school_area']);
                $model->setFacilityName($val['facility_name']);
                $model->setPersonInCharge($val['person_in_charge']);
                $model->setTel($val['tel']);
                $model->setFax($val['fax']);
                $model->setAddress($val['address']);
                $model->setMail($val['mail']);
                $model->setDirector($val['director']);
                $model->setDoctorMail1($val['doctor_mail_1']);
                $model->setDoctorMail2($val['doctor_mail_2']);
                $model->setDoctorMail3($val['doctor_mail_3']);
                $model->setLostFlag((int)$val['lost_flg']);
                $model->setKbn((int)$val['kbn']);
                array_push($arr, $model);
            }
        }
        //print_r($arr);
        return $arr;
    }
}