<?php
require_once('AbstractCreateOutput.php');
/**
 * （学級）クラス定義情報生成部
 * (Grade) Class definition info
 */
class ClassDef extends AbstractCreateOutput
{
  public function createOutputCsv(InnerData $inner_data)
  {
    $class_def = $inner_data->class_def;
    $dataArr = [];
    foreach ($class_def as $key => $value) {
      $saveData = new SaveData_ClassDef();
      $saveData->setDataKbn($value->getDataKbn());
      $saveData->setPref($value->getPref());
      $saveData->setSchoolCode($value->getSchoolCode());
      $saveData->setYear($value->getYear());
      $saveData->setYmd($value->getYmd());
      $saveData->setGrade($value->getGrade());
      $saveData->setClassId($value->getClassId());
      $saveData->setClassName($value->getClassName());
      $saveData->setStudentNum($value->getStudentNum());
      $dataArr[] = $saveData;
    }
    $this->csv_json = new SaveData([], $dataArr, [], [], [], []);
  }
}