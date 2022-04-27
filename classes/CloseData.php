<?php 
require_once('AbstractCreateOutput.php');
require_once('models/InnerData.php');
require_once('models/SaveData.php');
/**
 * 閉鎖情報生成部
 * Closure information Generator
 */
class CloseData extends AbstractCreateOutput{
  public function createOutputCsv(InnerData $inner_data)
  {
    $this->csv_json = [];

    echo '--閉鎖情報JSON変換--' . '<br/>';

    foreach ($inner_data->close_data as $close_data) {
      /* 
      Step1. 
      If there is no data with the same key in $ this-> csv_json, create new SaveData_CloseData data and add it to $ this-> csv_json.
      initialize ... 
        symbol_flag to "0000000000000000"
        data_kbn to "1"
        "1:1 support" Column to set the value with the same name
      */

      // Step2. Set the bit of the corresponding symptom_flag to 1.

      // Step3. Update if symptom_temp is hotter

      // Step4. If the symptom is other, add symptom_etc


      /*
      The following is an example of the case where the symbol_flag of multiple data with the same key is as follows.
      record1: 100000000000000
      record2: 000000000000010
      record3: 010000000000010
      When such data is input, I want to output as below
      output: 110000000000010

      */
      
      print_r($close_data);

      if(empty($this->csv_json)){
        $symptom_arr = str_split($close_data->getSymptomFlag());
        $find_symptom_code_index = array_keys($symptom_arr, "1");
        $symptom_flag = "000000000000000";
        if($find_symptom_code_index !== false){
          foreach($find_symptom_code_index AS $key => $index){
            $symptom_flag = substr_replace($symptom_flag, "1", $index, 1);
          }
        }

        $save_data = new SaveData_CloseData();
        $save_data->setDataKbn(1);
        $save_data->setPref($close_data->getPref());
        $save_data->setSchoolCode($close_data->getSchoolCode());
        $save_data->setCloseDivision($close_data->getCloseDivision());
        $save_data->setReason($close_data->getReason());
        $save_data->setGrade($close_data->getGrade());
        $save_data->setClassId($close_data->getClassId());
        $save_data->setReportDate($close_data->getReportDate());
        $save_data->setPatientNum($close_data->getPatientNum());
        $save_data->setAbsenceNum($close_data->getAbsenceNum());
        $save_data->setPeriodStart($close_data->getPeriodStart());
        $save_data->setPeriodEnd($close_data->getPeriodEnd());
        $save_data->setSymptomFlag($symptom_flag);
        $save_data->setSymptomTemp($close_data->getSymptomTemp());
        $save_data->setSymptomEtc($close_data->getSymptomEtc());
        $save_data->setNote($close_data->getNote());

        $this->csv_json[] = $save_data;

      }else{
        $is_exist = false;
        foreach($this->csv_json as $obj){
          $pref = $obj->getPref();
          $school_code = $obj->getSchoolCode();
          $reason = $obj->getReason();
          $grade = $obj->getGrade();
          $class_id = $obj->getClassId();
          $start = $obj->getPeriodStart();
          $end = $obj->getPeriodEnd();

          //set value of symptom if meet the conditions
          if($pref == $close_data->getPref() && $school_code == $close_data->getSchoolCode() && $reason == $close_data->getReason() && $grade == $close_data->getGrade() && $class_id == $close_data->getClassId() &&
          $start == $close_data->getPeriodStart() && $end == $close_data->getPeriodEnd()){
            $is_exist = true;
            //set value of symptom_flag
            $symptom_arr = str_split($close_data->getSymptomFlag());
            $find_symptom_code_index = array_keys($symptom_arr, "1");
            $symptom_flag = $obj->getSymptomFlag();
            if($find_symptom_code_index !== false){
              foreach($find_symptom_code_index AS $key => $index){
                $symptom_flag = substr_replace($symptom_flag, "1", $index, 1);
              }
            }
            //check for number of patients
            if($close_data->getPatientNum() > 0){
              $obj->setPatientNum($obj->getPatientNum() + $close_data->getPatientNum());
            }
            //check for number of absent student
            if($close_data->getAbsenceNum() > 0){
              $obj->setAbsenceNum($obj->getAbsenceNum() + $close_data->getAbsenceNum());
            }

            $obj->setSymptomFlag($symptom_flag);
            //check for symptom temperature
            if((float)$close_data->getSymptomTemp() > $obj->getSymptomTemp()){
              $obj->setSymptomTemp($close_data->getSymptomTemp());
            }
            //check for other symptom
            if(!$close_data->getSymptomEtc() || $close_data->getSymptomEtc() != "" ){
              if($obj->getSymptomEtc() && $obj->getSymptomEtc() == "" ){
                $obj->setSymptomEtc($close_data->getSymptomEtc());
              }else{
                $obj->setSymptomEtc($obj->getSymptomEtc() .",". $close_data->getSymptomEtc());
              }
            }
            //check for notes
            if(!$close_data->getNote() || $close_data->getNote() != ""){
              if($obj->getNote() && $obj->getNote() == ""){
                $obj->setNote($close_data->getNote());
              }else{
                $obj->setNote($obj->getNote() . "," . $close_data->getNote());
              }
            }

            break;
          }
        }

        //if current data is not exist in arr then save new data
        if(!$is_exist){
          $symptom_arr = str_split($close_data->getSymptomFlag());
          $find_symptom_code_index = array_keys($symptom_arr, "1");
          $symptom_flag = "000000000000000";
          if($find_symptom_code_index !== false){
            foreach($find_symptom_code_index AS $key => $index){
              $symptom_flag = substr_replace($symptom_flag, "1", $index, 1);
            }
          }

          $save_data = new SaveData_CloseData();
          $save_data->setDataKbn(1);
          $save_data->setPref($close_data->getPref());
          $save_data->setSchoolCode($close_data->getSchoolCode());
          $save_data->setCloseDivision($close_data->getCloseDivision());
          $save_data->setReason($close_data->getReason());
          $save_data->setGrade($close_data->getGrade());
          $save_data->setClassId($close_data->getClassId());
          $save_data->setReportDate($close_data->getReportDate());
          $save_data->setPatientNum($close_data->getPatientNum());
          $save_data->setAbsenceNum($close_data->getAbsenceNum());
          $save_data->setPeriodStart($close_data->getPeriodStart());
          $save_data->setPeriodEnd($close_data->getPeriodEnd());
          $save_data->setSymptomFlag($symptom_flag);
          $save_data->setSymptomTemp($close_data->getSymptomTemp());
          $save_data->setSymptomEtc($close_data->getSymptomEtc());
          $save_data->setNote($close_data->getNote());

          $this->csv_json[] = $save_data;
        }


      }

    }

    $this->csv_json = new SaveData([],[],[],[],$this->csv_json,[]);

    return $this->csv_json;
  }
}
?>