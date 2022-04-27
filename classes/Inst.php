<?php
require_once('AbstractCreateOutput.php');
require_once('models/InnerData.php');
require_once('models/SaveData.php');
/**
 * 施設情報生成部
 * Facilities info generation sec.
 */
class Inst extends AbstractCreateOutput
{
  public function createOutputCsv(InnerData $inner_data)
  {
    $inst = $inner_data->inst;
    $dataArr = [];
    foreach ($inst as $key => $value) {
      $saveData = new SaveData_Inst();
      $saveData->setDataKbn($value->getDataKbn());
      $saveData->setPref($value->getPref());
      $saveData->setSchoolCode($value->getSchoolCode());
      $saveData->setCity($value->getCity());
      $saveData->setDivision($value->getDivision());
      $saveData->setSchoolArea($value->getSchoolArea());
      $saveData->setFacilityName($value->getFacilityName());
      $saveData->setPersonInCharge($value->getPersonInCharge());
      $saveData->setTel($value->getTel());
      $saveData->setFax($value->getFax());
      $saveData->setAddress($value->getAddress());
      $saveData->setMail($value->getMail());
      $saveData->setDirector($value->getDirector());
      $saveData->setDoctorMail1($value->getDoctorMail1());
      $saveData->setDoctorMail2($value->getDoctorMail2());
      $saveData->setDoctorMail3($value->getDoctorMail3());
      $saveData->setLostFlag($value->getLostFlag());
      $saveData->setKbn($value->getKbn());
      $dataArr[] = $saveData;
    }
    $this->csv_json = new SaveData([], [], [], [], [], $dataArr);
  }
}