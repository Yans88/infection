<?php
require_once('models/InnerData.php');
require_once('models/SaveData.php');
require_once('models/CsvRecord.php');
/**
 * 保存項目処理
 * Processing of Saved items
 */
class CreateCSVRecords
{
  const file_json = "/savedata.json";

  public $outputJson;

  public function __construct(array $config)
  {
    $this->outputJson = $config['outputSave'];
  }
  
  /**
   * 過去データのJSONと今回作成したJSONを比較してCSVデータを作成する
   * Create CSV data by comparing the JSON of the past data with the JSON created this time.
   *
   * @param SaveData $save_json
   * @return array $csv_records Array of CsvRecord 
   */
  public function create(SaveData $save_json)
  {
    $results = [];
    $savedata_json = json_decode(@file_get_contents($this->outputJson . self::file_json), true);
    if (!$savedata_json) {
      $savedata = new SaveData([], [], [], [], [], []);
    } else {
      $absences = (isset($savedata_json['absence'])) ? $this->saveDataAbsence($savedata_json['absence']) : [];
      $classdefs = (isset($savedata_json['class_def'])) ? $this->saveDataClassDef($savedata_json['class_def']) : [];
      $disorderheads = (isset($savedata_json['disorder_head'])) ? $this->saveDataDisorderHead($savedata_json['disorder_head']) : [];
      $disorderditales = (isset($savedata_json['disorder_ditale'])) ? $this->saveDataDisorderDitale($savedata_json['disorder_ditale']) : [];
      $closedatas = (isset($savedata_json['close_data'])) ? $this->saveDataCloseData($savedata_json['close_data']) : [];
      $insts = (isset($savedata_json['inst'])) ? $this->saveDataInst($savedata_json['inst']) : [];
      $savedata = new SaveData($absences, $classdefs, $disorderheads, $disorderditales, $closedatas, $insts);
    };
    foreach ($save_json->absence as $absence) {
      $csv_absence = $this->csvRecordAbsence($absence);

      $checkKey = false;
      foreach ($savedata->absence as $savedata_absence) {
        if($this->comparePrimaryKey('absence', $savedata_absence, $absence)){
          if ($this->compareOldData('absence', $savedata_absence, $absence)) {
            $dup = $this->csvRecordAbsence($absence);
            $dup->data_kbn = "9";
            array_push($results, $dup);
            array_push($results, $csv_absence);
          }

          $checkKey = true;
        }                
      }

      if(!$checkKey){
        array_push($results, $csv_absence);
      }      
    }
    foreach ($save_json->class_def as $class_def) {
      $csv_class_def = $this->csvRecordClassDef($class_def);

      $checkKey = false;
      foreach ($savedata->class_def as $savedata_class_def) {
        if($this->comparePrimaryKey('class_def', $savedata_class_def, $class_def)){
          if ($this->compareOldData('class_def', $savedata_class_def, $class_def)) {
            $dup = $this->csvRecordClassDef($class_def);
            $dup->data_kbn = "9";
            array_push($results, $dup);
            array_push($results, $csv_class_def);
          }

          $checkKey = true;
        }                
      }

      if(!$checkKey){
        array_push($results, $csv_class_def);
      }
    }
    foreach ($save_json->disorder_head as $disorder_head) {
      $csv_disorder_head = $this->csvRecordDisorderHead($disorder_head);

      $checkKey = false;
      foreach ($savedata->disorder_head as $savedata_disorder_head) {
        if($this->comparePrimaryKey('disorder_head', $savedata_disorder_head, $disorder_head)){
          if ($this->compareOldData('disorder_head', $savedata_disorder_head, $disorder_head)) {
            $dup = $this->csvRecordDisorderHead($disorder_head);
            $dup->data_kbn = "9";
            array_push($results, $dup);
            array_push($results, $csv_disorder_head);
          }

          $checkKey = true;
        }                
      }

      if(!$checkKey){
        array_push($results, $csv_disorder_head);
      }
    }
    foreach ($save_json->disorder_ditale as $disorder_ditale) {
      $csv_disorder_ditale = $this->csvRecordDisorderDitale($disorder_ditale);

      $checkKey = false;
      foreach ($savedata->disorder_ditale as $savedata_disorder_ditale)  {
        if($this->comparePrimaryKey('disorder_ditale', $savedata_disorder_ditale, $disorder_ditale)){
          if ($this->compareOldData('disorder_ditale', $savedata_disorder_ditale, $disorder_ditale)) {
            $dup = $this->csvRecordDisorderDitale($disorder_ditale);
            $dup->data_kbn = "9";
            array_push($results, $dup);
            array_push($results, $csv_disorder_ditale);
          }

          $checkKey = true;
        }                
      }

      if(!$checkKey){
        array_push($results, $csv_disorder_ditale);
      }
    }
    foreach ($save_json->close_data as $close_data) {
      $csv_close_data = $this->csvRecordCloseData($close_data);

      $checkKey = false;
      foreach ($savedata->close_data as $savedata_close_data)  {
        if($this->comparePrimaryKey('close_data', $savedata_close_data, $close_data)){
          if ($this->compareOldData('close_data', $savedata_close_data, $close_data)) {
            $dup = $this->csvRecordCloseData($close_data);
            $dup->data_kbn = "9";
            array_push($results, $dup);
            array_push($results, $csv_close_data);
          }

          $checkKey = true;
        }                
      }

      if(!$checkKey){
        array_push($results, $csv_close_data);
      }
    }
    foreach ($save_json->inst as $inst) {
      $csv_inst = $this->csvRecordInst($inst);

      $checkKey = false;
      foreach ($savedata->inst as $savedata_inst)  {
        if($this->comparePrimaryKey('inst', $savedata_inst, $inst)){
          if ($this->compareOldData('inst', $savedata_inst, $inst)) {
            $dup = $this->csvRecordInst($inst);
            $dup->data_kbn = "9";
            array_push($results, $dup);
            array_push($results, $csv_inst);
          }

          $checkKey = true;
        }                
      }

      if(!$checkKey){
        array_push($results, $csv_inst);
      }
    }
    return $results;
  }
  /**
   * @param $key string
   * @param $saveData object
   * @param $csvRecord object
   * @return bool true or false.
   */
  function comparePrimaryKey($key, $saveData, $csvRecord)
  {
    switch ($key) {
      case 'absence':
        if ($saveData->pref == $csvRecord->pref && $saveData->school_code == $csvRecord->school_code && $saveData->grade == $csvRecord->grade && $saveData->class_id == $csvRecord->class_id && $saveData->symptom == $csvRecord->symptom && $saveData->report_date == $csvRecord->report_date) {
          return true;
        }
        break;
      case 'class_def':
        if ($saveData->pref == $csvRecord->pref && $saveData->school_code == $csvRecord->school_code && $saveData->year == $csvRecord->year && $saveData->ymd == $csvRecord->ymd && $saveData->grade == $csvRecord->grade && $saveData->class_id == $csvRecord->class_id) {
          return true;
        }
        break;
      case 'disorder_head':
        if ($saveData->pref == $csvRecord->pref && $saveData->report_no == $csvRecord->report_no) {
          return true;
        }
        break;
      case 'disorder_ditale':
        if ($saveData->report_no == $csvRecord->report_no && $saveData->grade == $csvRecord->grade && $saveData->class_id == $csvRecord->class_id) {
          return true;
        }
        break;
      case 'close_data':
        if ($saveData->pref == $csvRecord->pref && $saveData->school_code == $csvRecord->school_code && $saveData->reason == $csvRecord->reason && $saveData->grade == $csvRecord->grade && $saveData->class_id == $csvRecord->class_id
        && $saveData->period_start == $csvRecord->period_start && $saveData->period_end == $csvRecord->period_end) {
          return true;
        }
        break;
      case 'inst':
        if ($saveData->pref == $csvRecord->pref && $saveData->school_code == $csvRecord->school_code) {
          return true;
        }
        break;
      default:
        return false;
        break;
    }
  }

  /**
   * @param $key string
   * @param $saveData object
   * @param $csvRecord object
   * @return bool true or false.
   */
  function compareOldData($key, $saveData, $csvRecord)
  {
    switch ($key) {
      case 'absence':        
        if ($saveData->pref == $csvRecord->pref && $saveData->school_code == $csvRecord->school_code && $saveData->grade == $csvRecord->grade && $saveData->class_id == $csvRecord->class_id && $saveData->symptom == $csvRecord->symptom && $saveData->report_date == $csvRecord->report_date && $saveData->absence_num !== $csvRecord->absence_num) {
          return true;
        } else {
          return false;
        }
        break;
      case 'class_def':
        if (($saveData->pref == $csvRecord->pref && $saveData->school_code == $csvRecord->school_code && $saveData->year == $csvRecord->year && $saveData->ymd == $csvRecord->ymd && $saveData->grade == $csvRecord->grade && $saveData->class_id == $csvRecord->class_id)
          && ($saveData->class_name !== $csvRecord->class_name && $saveData->student_num !== $csvRecord->student_num)
        ) {
          return true;
        } else {
          return false;
        }
        break;
      case 'disorder_head':
        if (($saveData->pref == $csvRecord->pref && $saveData->report_no == $csvRecord->report_no) && ($saveData->school_code !== $csvRecord->school_code && $saveData->report_date !== $csvRecord->report_date
            && $saveData->reason !== $csvRecord->reason && $saveData->reason_etc !== $csvRecord->reason_etc && $saveData->term !== $csvRecord->term && $saveData->order_date !== $csvRecord->order_date
            && $saveData->end_date !== $csvRecord->end_date && $saveData->doctors_opinion !== $csvRecord->doctors_opinion && $saveData->measures !== $csvRecord->measures && $saveData->comment !== $csvRecord->comment)
        ) {
          return true;
        } else {
          return false;
        }
        break;
      case 'disorder_ditale':
        if ($saveData->report_no == $csvRecord->report_no && $saveData->grade == $csvRecord->grade && $saveData->class_id == $csvRecord->class_id && $saveData->disorder_num !== $csvRecord->disorder_num) {
          return true;
        } else {
          return false;
        }
        break;
      case 'close_data':
        if (($saveData->pref == $csvRecord->pref && $saveData->school_code == $csvRecord->school_code && $saveData->reason == $csvRecord->reason && $saveData->grade == $csvRecord->grade && $saveData->class_id == $csvRecord->class_id)
          && ($saveData->report_date !== $csvRecord->report_date && $saveData->patient_num !== $csvRecord->patient_num && $saveData->absence_num !== $csvRecord->absence_num && $saveData->period_start !== $csvRecord->period_start
            && $saveData->period_end !== $csvRecord->period_end && $saveData->symptom_flag !== $csvRecord->symptom_flag && $saveData->symptom_temp !== $csvRecord->symptom_temp && $saveData->symptom_etc !== $csvRecord->symptom_etc
            && $saveData->note !== $csvRecord->note)
        ) {
          return true;
        } else {
          return false;
        }
        break;
      case 'inst':
        if (($saveData->pref == $csvRecord->pref && $saveData->school_code == $csvRecord->school_code) && ($saveData->city !== $csvRecord->city && $saveData->division !== $csvRecord->division
            && $saveData->school_area !== $csvRecord->school_area && $saveData->facility_name !== $csvRecord->facility_name && $saveData->person_in_charge !== $csvRecord->person_in_charge && $saveData->tel !== $csvRecord->tel
            && $saveData->fax !== $csvRecord->fax && $saveData->address !== $csvRecord->address && $saveData->mail !== $csvRecord->mail && $saveData->director !== $csvRecord->director
            && $saveData->doctor_mail_1 !== $csvRecord->doctor_mail_1 && $saveData->doctor_mail_2 !== $csvRecord->doctor_mail_2 && $saveData->doctor_mail_3 !== $csvRecord->doctor_mail_3 && $saveData->lost_flag !== $csvRecord->lost_flag
            && $saveData->kbn !== $csvRecord->kbn)
        ) {
          return true;
        } else {
          return false;
        }
        break;
      default:
        return false;
        break;
    }
  }
  /**
   * @param $absences array
   * @return array of SaveData_Absence.
   */
  function saveDataAbsence($absences)
  {
    $arrAbsence = [];
    foreach ($absences as $value) {
      $sdAbsence = new SaveData_absence();
      $sdAbsence->data_kbn = $value['data_kbn'];
      $sdAbsence->school_code = $value['school_code'];
      $sdAbsence->pref = $value['pref'];
      $sdAbsence->grade = $value['grade'];
      $sdAbsence->class_id = $value['class_id'];
      $sdAbsence->symptom = $value['symptom'];
      $sdAbsence->report_date = $value['report_date'];
      $sdAbsence->absence_num = $value['absence_num'];
      array_push($arrAbsence, $sdAbsence);
    }
    return $arrAbsence;
  }
  /**
   * @param $classdefs array
   * @return array of SaveData_ClassDef.
   */
  function saveDataClassDef($classdefs)
  {
    $arrClassDef = [];
    foreach ($classdefs as $value) {
      $sdClassDef = new SaveData_ClassDef();
      $sdClassDef->data_kbn = $value['data_kbn'];
      $sdClassDef->pref = $value['pref'];
      $sdClassDef->school_code = $value['school_code'];
      $sdClassDef->year = $value['year'];
      $sdClassDef->ymd = $value['ymd'];
      $sdClassDef->grade = $value['grade'];
      $sdClassDef->class_id = $value['class_id'];
      $sdClassDef->class_name = $value['class_name'];
      $sdClassDef->student_num = $value['student_num'];
      array_push($arrClassDef, $sdClassDef);
    }
    return $arrClassDef;
  }
  /**
   * @param $disorder_heads array
   * @return array of SaveData_DisorderHead.
   */
  function saveDataDisorderHead($disorder_heads)
  {
    $arrDisorderHead = [];
    foreach ($disorder_heads as $value) {
      $sdDisorderHead = new SaveData_DisorderHead();
      $sdDisorderHead->data_kbn = $value['data_kbn'];
      $sdDisorderHead->pref = $value['pref'];
      $sdDisorderHead->report_no = $value['report_no'];
      $sdDisorderHead->school_code = $value['school_code'];
      $sdDisorderHead->report_date = $value['report_date'];
      $sdDisorderHead->reason = $value['reason'];
      $sdDisorderHead->reason_etc = $value['reason_etc'];
      $sdDisorderHead->term = $value['term'];
      $sdDisorderHead->order_date = $value['order_date'];
      $sdDisorderHead->end_date = $value['end_date'];
      $sdDisorderHead->doctors_opinion = $value['doctors_opinion'];
      $sdDisorderHead->measures = $value['measures'];
      $sdDisorderHead->comment = $value['comment'];
      array_push($arrDisorderHead, $sdDisorderHead);
    }
    return $arrDisorderHead;
  }
  /**
   * @param $disorder_ditales array
   * @return array of SaveData_DisorderDitale.
   */
  function saveDataDisorderDitale($disorder_ditales)
  {
    $arrDisorderDitale = [];
    foreach ($disorder_ditales as $value) {
      $sdDisorderDitale = new SaveData_DisorderDitale();
      $sdDisorderDitale->data_kbn = $value['data_kbn'];
      $sdDisorderDitale->report_no = $value['report_no'];
      $sdDisorderDitale->school_code = $value['school_code'];
      $sdDisorderDitale->grade = $value['grade'];
      $sdDisorderDitale->class_id = $value['class_id'];
      $sdDisorderDitale->disorder_num = $value['disorder_num'];
      array_push($arrDisorderDitale, $sdDisorderDitale);
    }
    return $arrDisorderDitale;
  }
  /**
   * @param $close_datas array
   * @return array of SaveData_CloseData.
   */
  function saveDataCloseData($close_datas)
  {
    $arrCloseData = [];
    foreach ($close_datas as $value) {
      $sdCloseData = new SaveData_CloseData();
      $sdCloseData->data_kbn = $value['data_kbn'];
      $sdCloseData->pref = $value['pref'];
      $sdCloseData->school_code = $value['school_code'];
      $sdCloseData->close_division = $value['close_division'];
      $sdCloseData->reason = $value['reason'];
      $sdCloseData->grade = $value['grade'];
      $sdCloseData->class_id = $value['class_id'];
      $sdCloseData->report_date = $value['report_date'];
      $sdCloseData->patient_num = $value['patient_num'];
      $sdCloseData->absence_num = $value['absence_num'];
      $sdCloseData->period_start = $value['period_start'];
      $sdCloseData->period_end = $value['period_end'];
      $sdCloseData->symptom_flag = $value['symptom_flag'];
      $sdCloseData->symptom_temp = $value['symptom_temp'];
      $sdCloseData->symptom_etc = $value['symptom_etc'];
      $sdCloseData->note = $value['note'];
      array_push($arrCloseData, $sdCloseData);
    }
    return $arrCloseData;
  }
  /**
   * @param $insts array
   * @return array of SaveData_Inst.
   */
  function saveDataInst($insts)
  {
    $arrInst = [];
    foreach ($insts as $value) {
      $sdInst = new SaveData_Inst();
      $sdInst->data_kbn = $value['data_kbn'];
      $sdInst->pref = $value['pref'];
      $sdInst->school_code = $value['school_code'];
      $sdInst->city = $value['city'];
      $sdInst->division = $value['division'];
      $sdInst->school_area = $value['school_area'];
      $sdInst->facility_name = $value['facility_name'];
      $sdInst->person_in_charge = $value['person_in_charge'];
      $sdInst->tel = $value['tel'];
      $sdInst->fax = $value['fax'];
      $sdInst->address = $value['address'];
      $sdInst->mail = $value['mail'];
      $sdInst->director = $value['director'];
      $sdInst->doctor_mail_1 = $value['doctor_mail_1'];
      $sdInst->doctor_mail_2 = $value['doctor_mail_2'];
      $sdInst->doctor_mail_3 = $value['doctor_mail_3'];
      $sdInst->lost_flag = $value['lost_flag'];
      $sdInst->kbn = $value['kbn'];
      array_push($arrInst, $sdInst);
    }
    return $arrInst;
  }
  /**
   * @param $absences array
   * @return object of CsvRecord_absence.
   */
  function csvRecordAbsence($absence)
  {
    $csv_absence = new CsvRecord_absence();
    $csv_absence->data_kbn = $absence->data_kbn;
    $csv_absence->school_code = $absence->school_code;
    $csv_absence->pref = $absence->pref;
    $csv_absence->grade = $absence->grade;
    $csv_absence->class_id = $absence->class_id;
    $csv_absence->symptom = $absence->symptom;
    $csv_absence->report_date = $absence->report_date;
    $csv_absence->absence_num = $absence->absence_num;
    return $csv_absence;
  }
  /**
   * @param $class_def array
   * @return object of CsvRecord_class_def.
   */
  function csvRecordClassDef($class_def)
  {
    $csv_class_def = new CsvRecord_class_def();
    $csv_class_def->data_kbn = $class_def->data_kbn;
    $csv_class_def->school_code = $class_def->school_code;
    $csv_class_def->pref = $class_def->pref;
    $csv_class_def->year = $class_def->year;
    $csv_class_def->ymd = $class_def->ymd;
    $csv_class_def->grade = $class_def->grade;
    $csv_class_def->class_id = $class_def->class_id;
    $csv_class_def->class_name = $class_def->class_name;
    $csv_class_def->student_num = $class_def->student_num;
    return $csv_class_def;
  }
  /**
   * @param $disorder_head array
   * @return object of CsvRecord_disorder_head.
   */
  function csvRecordDisorderHead($disorder_head)
  {
    $csv_disorder_head = new CsvRecord_disorder_head();
    $csv_disorder_head->data_kbn = $disorder_head->data_kbn;
    $csv_disorder_head->pref = $disorder_head->pref;
    $csv_disorder_head->report_no = $disorder_head->report_no;
    $csv_disorder_head->school_code = $disorder_head->school_code;
    $csv_disorder_head->report_date = $disorder_head->report_date;
    $csv_disorder_head->reason = $disorder_head->reason;
    $csv_disorder_head->reason_etc = $disorder_head->reason_etc;
    $csv_disorder_head->term = $disorder_head->term;
    $csv_disorder_head->order_date = $disorder_head->order_date;
    $csv_disorder_head->end_date = $disorder_head->end_date;
    $csv_disorder_head->doctors_opinion = $disorder_head->doctors_opinion;
    $csv_disorder_head->measures = $disorder_head->measures;
    $csv_disorder_head->comment = $disorder_head->comment;
    return $csv_disorder_head;
  }
  /**
   * @param $disorder_ditale array
   * @return object of CsvRecord_disorder_ditale.
   */
  function csvRecordDisorderDitale($disorder_ditale)
  {
    $csv_disorder_ditale = new CsvRecord_disorder_ditale();
    $csv_disorder_ditale->data_kbn = $disorder_ditale->data_kbn;
    $csv_disorder_ditale->report_no = $disorder_ditale->report_no;
    $csv_disorder_ditale->school_code = $disorder_ditale->school_code;
    $csv_disorder_ditale->grade = $disorder_ditale->grade;
    $csv_disorder_ditale->class_id = $disorder_ditale->class_id;
    $csv_disorder_ditale->disorder_num = $disorder_ditale->disorder_num;
    return $csv_disorder_ditale;
  }
  /**
   * @param $close_data array
   * @return object of CsvRecord_close_data.
   */
  function csvRecordCloseData($close_data)
  {
    $csv_close_data = new CsvRecord_close_data();
    $csv_close_data->data_kbn = $close_data->data_kbn;
    $csv_close_data->pref = $close_data->pref;
    $csv_close_data->school_code = $close_data->school_code;
    $csv_close_data->close_division = $close_data->close_division;
    $csv_close_data->reason = $close_data->reason;
    $csv_close_data->grade = $close_data->grade;
    $csv_close_data->class_id = $close_data->class_id;
    $csv_close_data->report_date = $close_data->report_date;
    $csv_close_data->patient_num = $close_data->patient_num;
    $csv_close_data->absence_num = $close_data->absence_num;
    $csv_close_data->period_start = $close_data->period_start;
    $csv_close_data->period_end = $close_data->period_end;
    $csv_close_data->symptom_flag = $close_data->symptom_flag;
    $csv_close_data->symptom_temp = $close_data->symptom_temp;
    $csv_close_data->symptom_etc = $close_data->symptom_etc;
    $csv_close_data->note = $close_data->note;
    return $csv_close_data;
  }
  /**
   * @param $inst array
   * @return object of CsvRecord_inst.
   */
  function csvRecordInst($inst)
  {
    $csv_inst = new CsvRecord_inst();
    $csv_inst->data_kbn = $inst->data_kbn;
    $csv_inst->pref = $inst->pref;
    $csv_inst->school_code = $inst->school_code;
    $csv_inst->city = $inst->city;
    $csv_inst->division = $inst->division;
    $csv_inst->school_area = $inst->school_area;
    $csv_inst->facility_name = $inst->facility_name;
    $csv_inst->person_in_charge = $inst->person_in_charge;
    $csv_inst->tel = $inst->tel;
    $csv_inst->fax = $inst->fax;
    $csv_inst->address = $inst->address;
    $csv_inst->mail = $inst->mail;
    $csv_inst->director = $inst->director;
    $csv_inst->doctor_mail_1 = $inst->doctor_mail_1;
    $csv_inst->doctor_mail_2 = $inst->doctor_mail_2;
    $csv_inst->doctor_mail_3 = $inst->doctor_mail_3;
    $csv_inst->lost_flag = $inst->lost_flag;
    $csv_inst->kbn = $inst->kbn;
    return $csv_inst;
  }
}