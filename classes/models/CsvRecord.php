<?php
/**
 * 出力するCSVの１レコードを表すモデルの抽象クラス
 * An abstract class of the model that represents one record of CSV to be output
 */ 
class CsvRecord{
  /*
    保存項目処理シートの下部の表、右端にある各CSVのレコード定義を参照してください
    Please refer to the record definition of each CSV on the right end of the table at the bottom of 「Processing of Saved items」 sheet.
    Sheet「Processing of Saved items」
  */

  /**
   * data_kbn
   *
   * @var data_kbn
   */
  public $data_kbn;

  /**
   * school_code
   *
   * @var school_code
   */
  public $school_code;

  public function __construct($data_kbn,$school_code){
    $this->data_kbn = $data_kbn;
    $this->school_code = $school_code;
  }

}

class CsvRecord_absence extends CsvRecord{
  /*
  data_kbn
  pref
  school_code
  grade
  class_id
  symptom
  report_date
  absence_num
  */
  /**
   * Prefecture Id
   *
   * @var int
   */
  public $pref; 

  /**
   * School Year
   *
   * @var string
   */
  public $grade;

  /**
   * Class Id
   *
   * @var int
   */
  public $class_id;

  /**
   * Symptom
   *
   * @var int
   */
  public $symptom;

  /**
   * Report Date
   *
   * @var string
   */
  public $report_date;

  /**
   * Absence Number
   *
   * @var int
   */
  public $absence_num;

  public function __construct(){
    $this->pref = 0;
    $this->grade = '';
    $this->class_id = 0;
    $this->symptom = 0;
    $this->report_date = '';
    $this->absence_num = 0;
  }

  public function setPref($pref){
    $this->pref = $pref;
  }

  public function getPref() {
    return $this->pref;
  }

  public function setGrade($grade){
    $this->grade = $grade;
  }

  public function getGrade() {
    return $this->grade;
  }

  public function setClassId($class_id){
    $this->class_id = $class_id;
  }

  public function getClassId() {
    return $this->class_id;
  }

  public function setSymptom($symptom){
    $this->symptom = $symptom;
  }

  public function getSymptom() {
    return $this->symptom;
  }

  public function setReportDate($report_date){
    $this->report_date = $report_date;
  }

  public function getReportDate() {
    return $this->report_date;
  }

  public function setAbsenceNum($absence_num){
    $this->absence_num = $absence_num;
  }

  public function getAbsenceNum() {
    return $this->absence_num;
  }
}

class CsvRecord_close_data extends CsvRecord{
  /*
  data_kbn
  pref
  school_code
  close_division
  reason
  grade
  class_id
  report_date
  patient_num
  absence_num
  period_start
  period_end
  symptom_flag
  symptom_temp
  symptom_etc
  note
  */

  /**
   * Prefecture Id
   *
   * @var int
   */
  public $pref;

  /**
   * Closure classification
   *
   * @var int
   */
  public $close_division;

  /**
   * Reason for closure
   *
   * @var int
   */
  public $reason;

  /**
   * School Year
   *
   * @var string
   */
  public $grade;

  /**
   * Class Id
   *
   * @var int
   */
  public $class_id;

  /**
   * Report Date
   *
   * @var string
   */
  public $report_date;

  /**
   * Number of patients
   *
   * @var int
   */
  public $patient_num;

  /**
   * Number of absent students
   *
   * @var int
   */
  public $absence_num;

  /**
   * Start date & time of closure
   *
   * @var string
   */
  public $period_start;
  
  /**
   * End date & time of closure
   *
   * @var string
   */
  public $period_end;
  
  /**
   * Symptom
   *
   * @var string
   */
  public $symptom_flag; 

  /**
   * Fever Temparature
   *
   * @var float
   */
  public $symptom_temp;
  
  /**
   * Other symptom
   *
   * @var string
   */
  public $symptom_etc;
  
  /**
   * Notes
   *
   * @var string
   */
  public $note; 

  public function __construct(){
    $this->pref = 0;
    $this->school_code = '';
    $this->reason = 0;
    $this->grade = '';
    $this->class_id = 0;
    $this->report_date = '';
    $this->patient_num = 0;
    $this->absence_num = 0;
    $this->period_start = '';
    $this->period_end = '';
    $this->symptom_flag = '';
    $this->symptom_temp = 0.00;
    $this->symptom_etc = '';
    $this->note = '';
  }

  public function setPref($pref){
    $this->pref = $pref;
  }

  public function getPref() {
    return $this->pref;
  }

  public function setCloseDivision($close_division){
    $this->close_division = $close_division;
  }

  public function getCloseDivision() {
    return $this->close_division;
  }

  public function setReason($reason){
    $this->reason = $reason;
  }

  public function getReason() {
    return $this->reason;
  }

  public function setGrade($grade){
    $this->grade = $grade;
  }

  public function getGrade() {
    return $this->grade;
  }

  public function setClassId($class_id){
    $this->class_id = $class_id;
  }

  public function getClassId() {
    return $this->class_id;
  }

  public function setReportDate($report_date){
    $this->report_date = $report_date;
  }

  public function getReportDate() {
    return $this->report_date;
  }

  public function setPatientNum($patient_num){
    $this->patient_num = $patient_num;
  }

  public function getPatientNum() {
    return $this->patient_num;
  }

  public function setAbsenceNum($absence_num){
    $this->absence_num = $absence_num;
  }

  public function getAbsenceNum() {
    return $this->absence_num;
  }

  public function setPeriodStart($period_start){
    $this->period_start = $period_start;
  }

  public function getPeriodStart(){
    return $this->period_start;
  }

  public function setPeriodEnd($period_end){
    $this->period_end = $period_end;
  }

  public function getPeriodEnd() {
    return $this->period_end;
  }

  public function setSymptomFlag($symptom_flag){
    $this->symptom_flag = $symptom_flag;
  }

  public function getSymptomFlag() {
    return $this->symptom_flag;
  }

  public function setSymptomTemp(float $symptom_temp){
    $this->symptom_temp = $symptom_temp;
  }

  public function getSymptomTemp() {
    return $this->symptom_temp;
  }

  public function setSymptomEtc($symptom_etc){
    $this->symptom_etc = $symptom_etc;
  }

  public function getSymptomEtc() {
    return $this->symptom_etc;
  }

  public function setNote($note){
    $this->note = $note;
  }

  public function getNote() {
    return $this->note;
  }
}

class CsvRecord_disorder_ditale extends CsvRecord{
  /*
  data_kbn
  report_no
  school_code
  grade
  class_id
  disorder_num
  */
  /**
   * Report No
   *
   * @var int
   */
  public $report_no; 

  /**
   * School Year
   *
   * @var string
   */
  public $grade;

  /**
   * Class Id
   *
   * @var int
   */
  public $class_id;

  /**
   * Number of Attendance Stopped students
   *
   * @var int
   */
  public $disorder_num;

  public function __construct(){
    $this->report_no = 0;
    $this->grade = '';
    $this->class_id = 0;
    $this->disorder_num = 0;
  }

  public function setReportNo($report_no){
    $this->report_no = $report_no;
  }

  public function getReportNo() {
    return $this->report_no;
  }

  public function setGrade($grade){
    $this->grade = $grade;
  }

  public function getGrade() {
    return $this->grade;
  }

  public function setClassId($class_id){
    $this->class_id = $class_id;
  }

  public function getClassId() {
    return $this->class_id;
  }

  public function setDisorderNum($disorder_num){
    $this->disorder = $disorder_num;
  }

  public function getDisorderNum() {
    return $this->disorder_num;
  }
}

class CsvRecord_disorder_head extends CsvRecord{
  /*
  data_kbn
  pref
  report_no
  school_code
  report_date
  reason
  reason_etc
  term
  order_date
  end_date
  doctors_opinion
  measures
  comment
  */

  /**
   * Prefecture Id
   *
   * @var int
   */
  public $pref;
  
  /**
   * Report No
   *
   * @var int
   */
  public $report_no;

  /**
   * School Code
   *
   * @var string
   */
  public $school_code;

  /**
   * Date of Application
   *
   * @var string
   */
  public $report_date;

  /**
   * Reason for suspension
   *
   * @var int
   */
  public $reason;

  /**
   * Other Reason For suspension
   *
   * @var string
   */
  public $reason_etc;

  /**
   * Time Period(free entry)
   *
   * @var string
   */
  public $term;

  /**
   * Suspension Order Date
   *
   * @var string
   */
  public $order_date;

  /**
   * Suspension End Date
   *
   * @var string
   */
  public $end_date;

  /**
   * School Doctor's Comment
   *
   * @var string
   */
  public $doctors_opinion;

  /**
   * Future Action
   *
   * @var string
   */
  public $measures;

  /**
   * Other
   *
   * @var string
   */
  public $comment;

  public function __construct(){
    $this->pref = 0;
    $this->report_no = 0;
    $this->report_date = '';
    $this->reason = 0;
    $this->reason_etc = '';
    $this->term = '';
    $this->order_date = '';
    $this->end_date = '';
    $this->doctors_opinion = '';
    $this->measures = '';
    $this->comment = 0;
  }

  public function setPref($pref){
    $this->pref = $pref;
  }

  public function getPref() {
    return $this->pref;
  }

  public function setReportNo($report_no){
    $this->report_no = $report_no;
  }

  public function getReportNo() {
    return $this->report_no;
  }

  public function setReportDate($report_date){
    $this->report_date = $report_date;
  }

  public function getReportDate() {
    return $this->report_date;
  }

  public function setReason($reason){
    $this->reason = $reason;
  }

  public function getReason() {
    return $this->reason;
  }

  public function setReasonEtc($reason_etc){
    $this->reason_etc = $reason_etc;
  }

  public function getReasonEtc() {
    return $this->reason_etc;
  }

  public function setTerm($term){
    $this->term = $term;
  }

  public function getTerm() {
    return $this->term;
  }

  public function setOrderDate($order_date){
    $this->order_date = $order_date;
  }

  public function getOrderDate() {
    return $this->order_date;
  }

  public function setEndDate($end_date){
    $this->end_date = $end_date;
  }

  public function getEndDate() {
    return $this->end_date;
  }

  public function setDoctorsOpinion($doctors_opinion){
    $this->doctors_opinion = $doctors_opinion;
  }

  public function getDoctorsOpinion() {
    return $this->doctors_opinion;
  }

  public function setMeasures($measures){
    $this->measures = $measures;
  }

  public function getMeasures() {
    return $this->measures;
  }

  public function setComment($comment){
    $this->comment = $comment;
  }

  public function getComment() {
    return $this->comment;
  }
}

class CsvRecord_class_def extends CsvRecord{
  /*
  data_kbn
  pref
  school_code
  year
  ymd
  grade
  class_id
  class_name
  student_num
  */

  /**
   * Prefecture Id
   *
   * @var int
   */
  public $pref; 

  /**
   * School Year
   *
   * @var string
   */
  public $year;

  /**
   * Date of Application
   *
   * @var string
   */
  public $ymd;

  /**
   * School Year
   *
   * @var string
   */
  public $grade;

  /**
   * Class Id
   *
   * @var int
   */
  public $class_id;

  /**
   * Class Name
   *
   * @var string
   */
  public $class_name;

  /**
   * Student Number
   *
   * @var int
   */
  public $student_num;

  public function __construct(){
    $this->pref = 0;
    $this->year = '';
    $this->ymd = '';
    $this->grade = '';
    $this->class_id = 0;
    $this->class_name = '';
    $this->student_num = 0;
  }

  public function setPref($pref){
    $this->pref = $pref;
  }

  public function getPref() {
    return $this->pref;
  }

  public function setYear($year){
    $this->year = $year;
  }

  public function getYear() {
    return $this->year;
  }

  public function setYmd($ymd){
    $this->ymd = $ymd;
  }

  public function getYmd() {
    return $this->ymd;
  }

  public function setGrade($grade){
    $this->grade = $grade;
  }

  public function getGrade() {
    return $this->grade;
  }

  public function setClassId($class_id){
    $this->class_id = $class_id;
  }

  public function getClassId() {
    return $this->class_id;
  }

  public function setClassName($class_name){
    $this->class_name = $class_name;
  }

  public function getClassName() {
    return $this->class_name;
  }

  public function setStudentNum($student_num){
    $this->student_num = $student_num;
  }

  public function getStudentNum() {
    return $this->student_num;
  }
}

class CsvRecord_inst extends CsvRecord{
  /*
  data_kbn
  pref
  school_code
  city
  division
  school_area
  facility_name
  person_in_charge
  tel
  fax
  address
  mail
  director
  doctor_mail_1
  doctor_mail_2
  doctor_mail_3
  lost_flg
  kbn
  */
  /**
   * Prefecture Id
   *
   * @var int
   */
  public $pref;

  /**
   * City
   *
   * @var int
   */
  public $city;

  /**
   * Facility Information
   *
   * @var string
   */
  public $division;

  /**
   * Junior high school district
   *
   * @var string
   */
  public $school_area;

  /**
   * Facility Name
   *
   * @var string
   */
  public $facility_name;

  /**
   * Input Person
   *
   * @var string
   */
  public $person_in_charge;

  /**
   * Phone no
   *
   * @var string
   */
  public $tel;

  /**
   * Fax
   *
   * @var string
   */
  public $fax;

  /**
   * Facility Address
   *
   * @var string
   */
  public $address;

  /**
   * Contact E-mail Address
   *
   * @var string
   */
  public $mail;

  /**
   * Princial's Name
   *
   * @var string
   */
  public $director;

  /**
   * Email address of related person
   *
   * @var string
   */
  public $doctor_mail_1;

  /**
   * Email address of related person
   *
   * @var string
   */
  public $doctor_mail_2;

  /**
   * Email address of related person
   *
   * @var string
   */
  public $doctor_mail_3;

  /**
   * School Closure Flag
   *
   * @var int
   */
  public $lost_flag;

  /**
   * Jurisdiction classification
   *
   * @var int
   */
  public $kbn;

  public function __construct(){
    $this->pref = 0;
    $this->city = '';
    $this->division = '';
    $this->school_area = '';
    $this->facility_name = '';
    $this->person_in_charge = '';
    $this->tel = '';
    $this->fax = '';
    $this->address = '';
    $this->mail = '';
    $this->director = '';
    $this->doctor_mail_1 = '';
    $this->doctor_mail_2 = '';
    $this->doctor_mail_3 = '';
    $this->lost_flag = '';
    $this->kbn = 0;
  }

  public function setPref($pref){
    $this->pref = $pref;
  }

  public function getPref() {
    return $this->pref;
  }

  public function setCity($city){
    $this->city = $city;
  }

  public function getCity() {
    return $this->city;
  }

  public function setDivision($division){
    $this->division = $division;
  }

  public function getDivision() {
    return $this->division;
  }

  public function setSchoolArea($school_area){
    $this->school_area = $school_area;
  }

  public function getSchoolArea() {
    return $this->school_area;
  }

  public function setFacilityName($facility_name){
    $this->facility_name = $facility_name;
  }

  public function getFacilityName() {
    return $this->facility_name;
  }

  public function setPersonInCharge($person_in_charge){
    $this->person_in_charge = $person_in_charge;
  }

  public function getPersonInCharge() {
    return $this->person_in_charge;
  }

  public function setTel($tel){
    $this->tel = $tel;
  }

  public function getTel() {
    return $this->tel;
  }

  public function setFax($fax){
    $this->fax = $fax;
  }

  public function getFax() {
    return $this->fax;
  }

  public function setAddress($address){
    $this->address = $address;
  }

  public function getAddress() {
    return $this->address;
  }

  public function setMail($mail){
    $this->mail = $mail;
  }

  public function getMail() {
    return $this->mail;
  }

  public function setDirector($director){
    $this->director = $director;
  }

  public function getDirector() {
    return $this->director;
  }

  public function setDoctorMail1($doctor_mail_1){
    $this->director_mail_1 = $doctor_mail_1;
  }

  public function getDoctorMail1() {
    return $this->doctor_mail_1;
  }

  public function setDoctorMail2($doctor_mail_2){
    $this->director_mail_2 = $doctor_mail_2;
  }

  public function getDoctorMail2() {
    return $this->doctor_mail_2;
  }

  public function setDoctorMail3($doctor_mail_3){
    $this->director_mail_3 = $doctor_mail_3;
  }

  public function getDoctorMail3() {
    return $this->doctor_mail_3;
  }

  public function setLostFlag($lost_flag){
    $this->lost_flag = $lost_flag;
  }

  public function getLostFlag() {
    return $this->lost_flag;
  }

  public function setKbn($kbn){
    $this->kbn = $kbn;
  }

  public function getKbn() {
    return $this->kbn;
  }
}
