<?php 
require_once('models/InnerData.php');
require_once('models/knjData.php');
/**
 * Convert to internal data
 * Undocumented class
 */
class ConvertInnerData{
  /**
   * 賢者から取得したデータを内部データに変換します
   * Converts the data obtained from the wise man into internal data
   *
   * @param KnjData $knjData
   * @return InnerData
   */
  public function convert(KnjData $knjData,$currentdatetime)  {     
      // $currentdatetime = date("YmdHis"); 

      $commons = $this->convertCommon($knjData);           
      $absences = $this->convertAbsences($knjData,$commons,$currentdatetime);
      $insts = $this->convertInst($knjData);
      $inner_items = $this->convertInnerItem($knjData,$currentdatetime);
      $classes = $this->convertClass($knjData,$currentdatetime,$commons,$inner_items);
      $disorder = $this->convertDisorder($knjData,$currentdatetime);
      $closes = $this->convertClose($knjData,$currentdatetime,$commons);
      $innerData = new InnerData($commons,$absences,$classes,$disorder->head,$disorder->detail,$closes,$insts,$inner_items);
      $innerData->setFilecode(substr($currentdatetime,0,12));

      return $innerData;
  }

  /**
   * Get ClassId
   *
   * @param array $commons
   * @param string $pref
   * @param string $school_code
   * @param string $grade
   * @param string $class_no
   * @return class_id
   */
  protected function getClassId($commons,$pref,$school_code,$grade,$class_no){
    foreach ($commons as $common) {
      if($common->pref == $pref && $common->school_code == $school_code && intval($common->grade) == intval($grade) && intval($common->class_no) == intval($class_no)){
        return $common->class_id;
      }
    }

    throw new Exception('HR-Class Not Found'.' '.$pref.' '.$school_code.' '.intval($grade).' '.intval($class_no) . '</br>');
  }

  /**
   * Get Pref
   *
   * @param array $knj_inst
   * @param string $school_code
   * @return void
   */
  protected function getPref($knj_insts,$school_code){
    foreach ($knj_insts as $inst)  {
      if($inst->school_code === $school_code){
        return $inst->pref;
      }
    }

    echo $school_code . "<br/>";

    throw new Exception('School Not Found:' . $school_code);
  }

  /**
   * Get ReportDate
   *
   * @param string $currentdatetime
   * @return string
   */
  protected function getReportDate($currentdatetime){
    return substr($currentdatetime,0,4) .  substr($currentdatetime,4,2) .  substr($currentdatetime,6,2) ;
  }

  /**
   * Convert Common
   *
   * @param KnjData $knjData
   * @return array
   */
  protected function convertCommon($knjData){
    $commons = [];
    $classidlist = [];

    foreach ($knjData->classes as $knj_class) {
      $common = new InnerData_Common();
      $common->pref = $this->getPref($knjData->insts, $knj_class->school_code);
      $common->school_code = $knj_class->school_code;
      $common->grade = $knj_class->grade;
      $common->class_name = $knj_class->hr_name;
      $common->class_no = $knj_class->hr_class;

      $schoolgrade = $common->school_code . "-" . $common->grade;

      if (isset($classidlist[$schoolgrade])) {
        $classidlist[$schoolgrade] += 1;
      }
      else{
        $classidlist[$schoolgrade] = 1;
      }

      $common->class_id = $classidlist[$schoolgrade];
      $commons[] = $common;
    }

    return $commons;
  }

  /**
   * Convert Absence
   *
   * @param KnjData $knjData
   * @param array $commons
   * @param string $currentdatetime
   * @return array
   */
  protected function convertAbsences($knjData,$commons,$currentdatetime){
    $absences = [];

    foreach ($knjData->inner_items as $knj_inneritem) {
      try{
        $absence = new InnerData_Absence();
        $absence->data_kbn = 1;
        $absence->pref = $knjData->insts[0]->pref;
        $absence->school_code = $knjData->insts[0]->school_code;
        $absence->grade = $knj_inneritem->grade;
        $absence->class_id = $this->getClassId($commons,$absence->pref,$absence->school_code,$knj_inneritem->grade,$knj_inneritem->hr_class);
        $absence->symptom = $knj_inneritem->symptom;
        $absence->report_date = str_replace("-","",$knj_inneritem->attenddate);

        if($absence->symptom == '' && $knj_inneritem->input_flg == '0'){
          $absence->absence_num = 0; 
        }
        else{
          $absence->absence_num = 1;
        }

        if($absence->report_date === $this->getReportDate($currentdatetime)){
          $absences[] = $absence;
        }                
      }
      catch (Exception $e) {
        $dateNow = date('d-m-Y_His');
        error_log(serialize($e->getMessage()), 3, "error_log_" . $dateNow);
        echo $e->getMessage() . "\n";;
      }
    }

    echo('----変換後のinneritem----');
    print_r($absences);

    return $absences;
  }

  /**
   * Convert Inst
   *
   * @param KnjData $knjData
   * @return array
   */
  protected function convertInst($knjData){
    $insts = [];

    foreach ($knjData->insts as $knj_inst) {
      $inst = new InnerData_Inst();
      $inst->data_kbn = 1;
      $inst->pref = $knj_inst->pref;
      $inst->school_code = $knj_inst->school_code;
      $inst->city = $knj_inst->city;
      $inst->division = $knj_inst->division;
      $inst->school_area = $knj_inst->school_area;
      $inst->facility_name = $knj_inst->facility_name;
      $inst->person_in_charge = $knj_inst->person_in_charge;
      $inst->tel = $knj_inst->tel;
      $inst->fax = $knj_inst->fax;
      $inst->address = $knj_inst->address;
      $inst->mail = $knj_inst->mail;
      $inst->director = $knj_inst->director;
      $inst->doctor_mail_1 = $knj_inst->doctor_mail_1;
      $inst->doctor_mail_2 = $knj_inst->doctor_mail_2;
      $inst->doctor_mail_3 = $knj_inst->doctor_mail_3;
      $inst->lost_flag = $knj_inst->lost_flg;
      $inst->kbn = $knj_inst->kbn;

      $insts[] = $inst;
    }

    return $insts;
  }

  /**
   * Convert InnerItem
   *
   * @param KnjData $knjData
   * @param string $currentdatetime
   * @return array
   */
  protected function convertInnerItem($knjData,$currentdatetime){
    $inner_items = [];

    foreach ($knjData->inner_items as $knj_inneritem) {
      $inner_item = new InnerData_InnerItem();
      $inner_item->year = $knj_inneritem->year;
      $inner_item->schregno = $knj_inneritem->schregno;
      $inner_item->grade =  $knj_inneritem->grade;;
      $inner_item->class_id = $knj_inneritem->class_id;
      $inner_item->report_date = $this->getReportDate($currentdatetime);
      $inner_item->symptom = $knj_inneritem->symptom;
      $inner_item->symptom_temp = $knj_inneritem->symptom_temp;

      if($knj_inneritem->input_flg == 1){
        $inner_item->symptom_etc = $knj_inneritem->symptom_etc;
      }
      
      $inner_item->end_date = $knj_inneritem->ent_date;
      $inner_item->exc_date =  $knj_inneritem->exc_date;
      
      $inner_item->class_num_add = 0;

      if( strtotime(substr($currentdatetime,0,8)) >= strtotime($inner_item->end_date)){
        // 転入
        $inner_item->class_num_add += 1;
      }
      else if( strtotime(substr($currentdatetime,0,8)) >= strtotime($inner_item->exc_date)){
        // 転出
        $inner_item->class_num_add -= 1;
      }

      $inner_items[] = $inner_item;

      return $inner_items;
    }
  }

  /**
   * Convert Class
   *
   * @param KnjData $knjData
   * @param string $currentdatetime
   * @param array $commons
   * @param array $inner_items
   * @return array
   */
  protected function convertClass($knjData,$currentdatetime,$commons,$inner_items){
    $classes = [];

    foreach ($knjData->classes as $knj_class) {
      $class = new InnerData_ClassDef();
      $class->data_kbn = 1;
      $class->pref = $this->getPref($knjData->insts, $knj_class->school_code);
      $class->school_code = $knj_class->school_code;
      $class->year = $knj_class->year;
      $class->ymd = substr($currentdatetime,0,4) . '/' . substr($currentdatetime,4,2) . "/" . substr($currentdatetime,6,2);
      $class->grade = $knj_class->grade;

      $class->class_id = $this->getClassId($commons,$class->pref,$knj_class->school_code,$knj_class->grade,$knj_class->hr_class);
      $class->class_name = $knj_class->hr_name;
      $class->student_num = $knj_class->total_sum;

      foreach ($inner_items as $inneritem) {
        if($class->pref == $inneritem->pref && $class->school_code == $inneritem->school_code && $class->grade == $inneritem->grade && $class->class_id == $inneritem->class_id){
          $class->student_num += $inneritem->class_num_add;
        }
      }

      $classes[] = $class;
    }

    return $classes;
  }

  /**
   * Convert Disorder
   *
   * @param KnjData $knjData
   * @param string $currentdatetime
   * @return stdClass
   */
  protected function convertDisorder($knjData,$currentdatetime){
    $disorderheads = [];
      $disorderdetails = [];
      $reportNo = 0;

      foreach ($knjData->disorders as $knj_disorder) {
        $disorder = new InnerData_DisorderHead();
        $exists = false;
        foreach ($disorderdetails as $inner_details) {
          if($inner_details->school_code == $knj_disorder->school_cd && $inner_details->grade == $knj_disorder->grade && $inner_details->class_id == $knj_disorder->class_id){
            $disorder->report_no = $inner_details->report_no;
            $disorder->disorder_num += 1;
            $exists = true;
            break;
          }
        }

        if(!$exists){
          $reportNo++;
          $detail = new InnerData_DisorderDitale();
          $detail->data_kbn = 1;
          $detail->report_no = $reportNo;
          $detail->school_code = $knj_disorder->school_cd;
          $detail->grade = $knj_disorder->grade;
          $detail->class_id = $knj_disorder->class_id;
          $detail->disorder_num = 1;
          $disorderdetails[] = $detail;
        }

        $disorder->data_kbn = 1;
        $disorder->pref = $this->getPref($knjData->insts,$knj_disorder->school_cd); 
        $disorder->school_code = $knj_disorder->school_cd;
        $disorder->report_date = $this->getReportDate($currentdatetime);
        $disorder->reason = $knj_disorder->reason;
        $disorder->reason_etc = $knj_disorder->reason_etc;
        $disorder->term = "";
        $disorder->order_date = $knj_disorder->order_date;
        $disorder->end_date = $knj_disorder->end_date;
        $disorder->doctors_opinion = $knj_disorder->remark1;
        $disorder->measures = $knj_disorder->remark2;
        $disorder->comment = $knj_disorder->remark3;
        $disorderheads[] =  $disorder;
      }

      $ret = new stdClass();
      $ret->head = $disorderheads;
      $ret->detail = $disorderdetails;

      return $ret;
  }

  protected function convertClose($knjData,$currentdatetime,$commons){
    $closes = [];

    foreach ($knjData->closes as $knj_close) {
      try{
        $close = new InnerData_CloseData();

        $close->data_kbn = 1;
        $close->pref = $this->getPref($knjData->insts, $knj_close->school_code);
        $close->school_code = $knj_close->school_code;
        $close->close_division = 3;

        if($knj_close->grade == '99' && $knj_close->hr_class === '999'){
          $close->close_division = 1;
        }
        else if($knj_close->hr_class === '999'){
          $close->close_division = 2;
        }

        $close->reason = $knj_close->deseasecd;
        $close->grade = $knj_close->grade;

        if($close->close_division === 3){
          $close->class_id = $this->getClassId($commons,$close->pref,$close->school_code,$close->grade,$knj_close->hr_class);
        }

        $close->report_date = $this->getReportDate($currentdatetime);
        $close->patient_num = $knj_close->patient_num;
        $close->absence_num = $knj_close->absence_num;
        $close->period_start = $knj_close->period_start;
        $close->period_end = $knj_close->period_end;
        

        $symptom_flag = "";

        for ($i=1; $i <= 12; $i++) { 
          $name = "symptom_flag" . $i;
          if($knj_close->$name == "1"){
            $symptom_flag .= "1";
          }
          else{
            $symptom_flag .= "0";
          }
        }

        if($knj_close->symptom_etc == "1"){
          $symptom_flag .= "1";
        }
        else{
          $symptom_flag .= "0";
        } 

        $symptom_flag .= "0000";

        $close->symptom_flag = $symptom_flag;

        $close->symptom_temp = $knj_close->symptom_temp;
        $close->symptom_etc = $knj_close->symptom_etc;
        $close->note = $knj_close->note;

        $closes[] = $close;
      }
      catch (Exception $e) {
        $dateNow = date('d-m-Y_His');
        error_log(serialize($e->getMessage()), 3, "error_log_" . $dateNow);
        echo $e->getMessage() . "\n";;
      }
    }

    return $closes ;
  }

}
?>