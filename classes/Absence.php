<?php 
require_once('AbstractCreateOutput.php');
require_once('models/InnerData.php');
require_once('models/SaveData.php');


/**
 * 欠席情報生成部
 * Absence Information Generator
 */
class Absence extends AbstractCreateOutput{


  public function createOutputCsv(InnerData $inner_data)
  {    
    $absence = $inner_data->absence;
    $arr = array();
    $absent_count = 0;

    foreach($absence as $value){
      $absent_count = $value->getAbsenceNum();

      if(empty($arr)){
        if($absent_count > 0){
          $save_data = new SaveData_Absence();
          $save_data->setDataKbn($value->getDataKbn());
          $save_data->setPref($value->getPref());
          $save_data->setSchoolCode($value->getSchoolCode());
          $save_data->setGrade($value->getGrade());
          $save_data->setClassId($value->getClassId());
          $save_data->setSymptom($value->getSymptom());
          $save_data->setReportDate($value->getReportDate());
          $save_data->setAbsenceNum($value->getAbsenceNum());
          //save to array for next process
          $arr[] = $save_data;
        }
      }else{
        $is_exist = false;
        foreach($arr AS $obj_key => $obj){
          $grade = $obj->getGrade();
          $class_id = $obj->getClassId();
          $symptom = $obj->getSymptom();
          $report_date = $obj->getReportDate();
          
          //Sum into a separate record for each symptom.
          if($grade == $value->getGrade() && $class_id == $value->getClassId() && $symptom == $value->getSymptom()){
            $is_exist = true;
            $absent_count = $obj->getAbsenceNum();
            $absent_count = $absent_count + $value->getAbsenceNum();
            //increase total absent student
            $obj->setAbsenceNum($absent_count);
            break;
          }
        }
        
        //if current data is not exist in arr then save new data
        if(!$is_exist && $absent_count > 0){
            $save_data = new SaveData_Absence();
            $save_data->setDataKbn($value->getDataKbn());
            $save_data->setPref($value->getPref());
            $save_data->setSchoolCode($value->getSchoolCode());
            $save_data->setGrade($value->getGrade());
            $save_data->setClassId($value->getClassId());
            $save_data->setSymptom($value->getSymptom());
            $save_data->setReportDate($value->getReportDate());
            $save_data->setAbsenceNum($value->getAbsenceNum());
            //save to array for next process
            $arr[] = $save_data;
        }
      }

    }

    $this->csv_json = new SaveData($arr,[],[],[],[],[]);

    return $this->csv_json;

  }
}
?>