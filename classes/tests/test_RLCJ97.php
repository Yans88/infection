<?php
require_once('../Inst.php');
require_once('../models/InnerData.php');

try {
  // 各処理の呼び出しと例外発生時のロギングを行います
  // Processing call and logging when an exception occurs
  echo 'Start' . "\n";

  $record1_inst = new InnerData_Inst();
  $record1_inst->data_kbn = "1";
  $record1_inst->pref = "20";
  $record1_inst->school_code = "E120220100026";
  $record1_inst->city = '';
  $record1_inst->division = "3";
  $record1_inst->facility_name = "industry";
  $record1_inst->person_in_charge = '';
  $record1_inst->tel = '';
  $record1_inst->fax = '';
  $record1_inst->address = 'Lorem Ipsum is simply dummy text of the printing and typesetting';
  $record1_inst->mail = 'mail_me@mail.com';
  $record1_inst->director = 0;
  $record1_inst->doctor_mail_1 = 'doctor_mail_1@mail.com';
  $record1_inst->doctor_mail_2 = 'doctor_mail_2@mail.com';
  $record1_inst->doctor_mail_3 = 'doctor_mail_3@mail.com';
  $record1_inst->lost_flag = 0;
  $record1_inst->kbn = 0;

  $record2_inst = new InnerData_Inst();
  $record2_inst->data_kbn = "1";
  $record2_inst->pref = "20";
  $record2_inst->school_code = "E120220100025";
  $record2_inst->city = '';
  $record2_inst->division = "2";
  $record2_inst->facility_name = "Industry";
  $record2_inst->person_in_charge = '';
  $record2_inst->tel = '';
  $record2_inst->fax = '';
  $record2_inst->address = 'Lorem Ipsum is simply dummy';
  $record2_inst->mail = 'me_mail@mail.com';
  $record2_inst->director = 0;
  $record2_inst->doctor_mail_1 = 'doctormail_1@mail.com';
  $record2_inst->doctor_mail_2 = 'doctormail_2@mail.com';
  $record2_inst->doctor_mail_3 = 'doctormail_3@mail.com';
  $record2_inst->lost_flag = 0;
  $record2_inst->kbn = 0;

  $records_inst = [$record1_inst, $record2_inst];

  $innerdata = new InnerData([], [], [], [], [], [], $records_inst, []);

  $save_data = new Inst();
  $save_data->createOutputCsv($innerdata);

  //print_r($save_data);

  //$savejson = new SaveJSON();
  //$savejson->save($savedata);
  //print_r($savedata);

  echo 'End' . "\n";
} catch (Exception $e) {
  // ロギングは例外をキャッチし、その内容をファイルに出力してください
  // Logging should catch the exception and output its contents to a file
  echo $e->getMessage() . "\n";;
}