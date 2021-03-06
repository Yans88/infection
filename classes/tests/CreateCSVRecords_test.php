<?php
require_once('../CreateCSVRecords.php');
require_once('../models/SaveData.php');

try {
  $orderDate = date('Y/m/d', strtotime('3 week'));
  $endDate = date('Y/m/d');

  $sdAbsence1 = new SaveData_absence();
  $sdAbsence1->data_kbn = "1";
  $sdAbsence1->school_code = "E120220100025";
  $sdAbsence1->pref = "13";
  $sdAbsence1->grade = "715";
  $sdAbsence1->class_id = "1";
  $sdAbsence1->symptom = "1000000000000000";
  $sdAbsence1->report_date = "2022/02/20";
  $sdAbsence1->absence_num = "3";
  $sdAbsence2 = new SaveData_absence();
  $sdAbsence2->data_kbn = "1";
  $sdAbsence2->school_code = "E120220100025";
  $sdAbsence2->pref = "13";
  $sdAbsence2->grade = "715";
  $sdAbsence2->class_id = "2";
  $sdAbsence2->symptom = "1000000000000000";
  $sdAbsence2->report_date = "2022/02/20";
  $sdAbsence2->absence_num = "2";
  $sdAbsence3 = new SaveData_absence();
  $sdAbsence3->data_kbn = "1";
  $sdAbsence3->school_code = "E120220100025";
  $sdAbsence3->pref = "13";
  $sdAbsence3->grade = "715";
  $sdAbsence3->class_id = "2";
  $sdAbsence3->symptom = "1000000000000000";
  $sdAbsence3->report_date = "2022/02/20";
  $sdAbsence3->absence_num = "1";

  $sdClassDef1 = new SaveData_ClassDef();
  $sdClassDef1->data_kbn = "1";
  $sdClassDef1->pref = "13";
  $sdClassDef1->school_code = "E120220100025";
  $sdClassDef1->year = "2022";
  $sdClassDef1->ymd = "20220222";
  $sdClassDef1->grade = "711";
  $sdClassDef1->class_id = "1";
  $sdClassDef1->class_name = "小2年1組";
  $sdClassDef1->student_num = "1";
  $sdClassDef2 = new SaveData_ClassDef();
  $sdClassDef2->data_kbn = "1";
  $sdClassDef2->pref = "13";
  $sdClassDef2->school_code = "E120220100025";
  $sdClassDef2->year = "2022";
  $sdClassDef2->ymd = "20220222";
  $sdClassDef2->grade = "711";
  $sdClassDef2->class_id = "2";
  $sdClassDef2->class_name = "小2年1組";
  $sdClassDef2->student_num = "3";
  $sdClassDef3 = new SaveData_ClassDef();
  $sdClassDef3->data_kbn = "1";
  $sdClassDef3->pref = "13";
  $sdClassDef3->school_code = "E120220100025";
  $sdClassDef3->year = "2022";
  $sdClassDef3->ymd = "20220222";
  $sdClassDef3->grade = "711";
  $sdClassDef3->class_id = "2";
  $sdClassDef3->class_name = "小2年1組";
  $sdClassDef3->student_num = "4";

  $sdDisorderHead1 = new SaveData_DisorderHead();
  $sdDisorderHead1->data_kbn = "1";
  $sdDisorderHead1->pref = "13";
  $sdDisorderHead1->report_no = "1";
  $sdDisorderHead1->school_code = "E120220100025";
  $sdDisorderHead1->report_date = "20211004";
  $sdDisorderHead1->reason = "5";
  $sdDisorderHead1->reason_etc = "Lorem Ipsum";
  $sdDisorderHead1->term = 'Lorem Ipsum term';
  $sdDisorderHead1->order_date = $orderDate;
  $sdDisorderHead1->end_date = $endDate;
  $sdDisorderHead1->doctors_opinion = "need rest";
  $sdDisorderHead1->measures = "centimeter";
  $sdDisorderHead1->comment = 0;
  $sdDisorderHead2 = new SaveData_DisorderHead();
  $sdDisorderHead2->data_kbn = "1";
  $sdDisorderHead2->pref = "13";
  $sdDisorderHead2->report_no = "2";
  $sdDisorderHead2->school_code = "E120220100025";
  $sdDisorderHead2->report_date = "20211004";
  $sdDisorderHead2->reason = "5";
  $sdDisorderHead2->reason_etc = "Lorem Ipsum";
  $sdDisorderHead2->term = 'Lorem Ipsum term';
  $sdDisorderHead2->order_date = $orderDate;
  $sdDisorderHead2->end_date = $endDate;
  $sdDisorderHead2->doctors_opinion = "need rest";
  $sdDisorderHead2->measures = "centimeter";
  $sdDisorderHead2->comment = 0;
  $sdDisorderHead3 = new SaveData_DisorderHead();
  $sdDisorderHead3->data_kbn = "1";
  $sdDisorderHead3->pref = "13";
  $sdDisorderHead3->report_no = "1";
  $sdDisorderHead3->school_code = "E120220100025";
  $sdDisorderHead3->report_date = "20211004";
  $sdDisorderHead3->reason = "5";
  $sdDisorderHead3->reason_etc = "Lorem Ipsum";
  $sdDisorderHead3->term = 'Lorem Ipsum term';
  $sdDisorderHead3->order_date = $orderDate;
  $sdDisorderHead3->end_date = $endDate;
  $sdDisorderHead3->doctors_opinion = "need sleep";
  $sdDisorderHead3->measures = "centimeter";
  $sdDisorderHead3->comment = 0;

  $sdDisorderDitale1 = new SaveData_DisorderDitale();
  $sdDisorderDitale1->data_kbn = "1";
  $sdDisorderDitale1->report_no = "1";
  $sdDisorderDitale1->school_code = "E120220100025";
  $sdDisorderDitale1->grade = "711";
  $sdDisorderDitale1->class_id = "1";
  $sdDisorderDitale1->disorder_num = 11;
  $sdDisorderDitale2 = new SaveData_DisorderDitale();
  $sdDisorderDitale2->data_kbn = "1";
  $sdDisorderDitale2->report_no = "2";
  $sdDisorderDitale2->school_code = "E120220100025";
  $sdDisorderDitale2->grade = "711";
  $sdDisorderDitale2->class_id = "2";
  $sdDisorderDitale2->disorder_num = 0;
  $sdDisorderDitale3 = new SaveData_DisorderDitale();
  $sdDisorderDitale3->data_kbn = "1";
  $sdDisorderDitale3->report_no = "2";
  $sdDisorderDitale3->school_code = "E120220100025";
  $sdDisorderDitale3->grade = "711";
  $sdDisorderDitale3->class_id = "2";
  $sdDisorderDitale3->disorder_num = 4;

  $sdCloseData1 = new SaveData_CloseData();
  $sdCloseData1->data_kbn = "1";
  $sdCloseData1->pref = "13";
  $sdCloseData1->school_code = "E120220100025";
  $sdCloseData1->close_division = 0;
  $sdCloseData1->reason = "5";
  $sdCloseData1->grade = "711";
  $sdCloseData1->class_id = "1";
  $sdCloseData1->report_date = $orderDate;
  $sdCloseData1->patient_num = 0;
  $sdCloseData1->absence_num = 0;
  $sdCloseData1->period_start = "20220222";
  $sdCloseData1->period_end = "20220223";
  $sdCloseData1->symptom_flag = "danger";
  $sdCloseData1->symptom_temp = 35.00;
  $sdCloseData1->symptom_etc = "Fever";
  $sdCloseData1->note = "Rest";
  $sdCloseData2 = new SaveData_CloseData();
  $sdCloseData2->data_kbn = "1";
  $sdCloseData2->pref = "13";
  $sdCloseData2->school_code = "E120220100025";
  $sdCloseData2->close_division = 0;
  $sdCloseData2->reason = "5";
  $sdCloseData2->grade = "711";
  $sdCloseData2->class_id = "2";
  $sdCloseData2->report_date = $orderDate;
  $sdCloseData2->patient_num = 0;
  $sdCloseData2->absence_num = 0;
  $sdCloseData2->period_start = "20220222";
  $sdCloseData2->period_end = "20220223";
  $sdCloseData2->symptom_flag = "danger";
  $sdCloseData2->symptom_temp = 35.00;
  $sdCloseData2->symptom_etc = "Fever";
  $sdCloseData2->note = "Rest";
  $sdCloseData3 = new SaveData_CloseData();
  $sdCloseData3->data_kbn = "1";
  $sdCloseData3->pref = "13";
  $sdCloseData3->school_code = "E120220100025";
  $sdCloseData3->close_division = 0;
  $sdCloseData3->reason = "5";
  $sdCloseData3->grade = "711";
  $sdCloseData3->class_id = "1";
  $sdCloseData3->report_date = $orderDate;
  $sdCloseData3->patient_num = 0;
  $sdCloseData3->absence_num = 0;
  $sdCloseData3->period_start = "20220222";
  $sdCloseData3->period_end = "20220223";
  $sdCloseData3->symptom_flag = "danger";
  $sdCloseData3->symptom_temp = 32.00;
  $sdCloseData3->symptom_etc = "Fever";
  $sdCloseData3->note = "Rest";

  $sdInst1 = new SaveData_Inst();
  $sdInst1->data_kbn = "1";
  $sdInst1->pref = "13";
  $sdInst1->school_code = "E120220100025";
  $sdInst1->city = "Tokyo";
  $sdInst1->division = "Student";
  $sdInst1->school_area = "Tokyo";
  $sdInst1->facility_name = "School";
  $sdInst1->person_in_charge = "Tekiro";
  $sdInst1->tel = "02345";
  $sdInst1->fax = "5000";
  $sdInst1->address = "Tokyo Street";
  $sdInst1->mail = "mail@google.com";
  $sdInst1->director = "Nakai";
  $sdInst1->doctor_mail_1 = "doctor1@mail.com";
  $sdInst1->doctor_mail_2 = "doctor2@mail.com";
  $sdInst1->doctor_mail_3 = "doctor3@mail.com";
  $sdInst1->lost_flag = "Nowhere";
  $sdInst1->kbn = 1;
  $sdInst2 = new SaveData_Inst();
  $sdInst2->data_kbn = "1";
  $sdInst2->pref = "13";
  $sdInst2->school_code = "E120220100026";
  $sdInst2->city = "Tokyo";
  $sdInst2->division = "Student";
  $sdInst2->school_area = "Tokyo";
  $sdInst2->facility_name = "School";
  $sdInst2->person_in_charge = "Tekiro";
  $sdInst2->tel = "02345";
  $sdInst2->fax = "5000";
  $sdInst2->address = "Tokyo Street";
  $sdInst2->mail = "mail@google.com";
  $sdInst2->director = "Nakai";
  $sdInst2->doctor_mail_1 = "doctor1@mail.com";
  $sdInst2->doctor_mail_2 = "doctor2@mail.com";
  $sdInst2->doctor_mail_3 = "doctor3@mail.com";
  $sdInst2->lost_flag = "Nowhere";
  $sdInst2->kbn = 1;
  $sdInst3 = new SaveData_Inst();
  $sdInst3->data_kbn = "1";
  $sdInst3->pref = "13";
  $sdInst3->school_code = "E120220100025";
  $sdInst3->city = "Tokyo";
  $sdInst3->division = "Student";
  $sdInst3->school_area = "Tokyo";
  $sdInst3->facility_name = "School";
  $sdInst3->person_in_charge = "Tekiro";
  $sdInst3->tel = "02345";
  $sdInst3->fax = "5000";
  $sdInst3->address = "Tokyo Street";
  $sdInst3->mail = "mail@google.com";
  $sdInst3->director = "Takumi";
  $sdInst3->doctor_mail_1 = "doctor1@mail.com";
  $sdInst3->doctor_mail_2 = "doctor2@mail.com";
  $sdInst3->doctor_mail_3 = "doctor3@mail.com";
  $sdInst3->lost_flag = "Nowhere";
  $sdInst3->kbn = 1;

  $saveData = new SaveData([$sdAbsence3], [$sdClassDef3], [$sdDisorderHead3], [$sdDisorderDitale3], [$sdCloseData3], [$sdInst3]);
  $saveJson = new SaveData([$sdAbsence1, $sdAbsence2], [$sdClassDef1, $sdClassDef2], [$sdDisorderHead1, $sdDisorderHead2], [$sdDisorderDitale1, $sdDisorderDitale2], [$sdCloseData1, $sdCloseData2], [$sdInst1, $sdInst2]);
  // create save_data.json
  $fp = fopen('savedata.json', 'w');
  fwrite($fp, json_encode($saveData));
  fclose($fp);

  $save = new CreateCSVRecords();
  $csv = $save->create($saveJson);
  print_r(json_encode($csv));
} catch (Exception $e) {
  echo $e->getMessage() . "\n";
}
