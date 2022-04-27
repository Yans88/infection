<?php
require_once('../DisorderDitale.php');
require_once('../models/InnerData.php');

try {
  // 各処理の呼び出しと例外発生時のロギングを行います
  // Processing call and logging when an exception occurs
  echo 'Start' . "\n";

  $myDate = date('Y/m/d');
  $startDate = date('Y/m/d', strtotime('3 week'));

  $record1_disordrHead = new InnerData_DisorderHead();
  $record1_disordrHead->data_kbn = "1";
  $record1_disordrHead->pref = "20";
  $record1_disordrHead->report_no = "2";
  $record1_disordrHead->school_code = "E120220100026";
  $record1_disordrHead->report_date = $myDate;
  $record1_disordrHead->reason = "5";
  $record1_disordrHead->reason_etc = "Lorem Ipsum is simply dummy text of the printing and typesetting industry";
  $record1_disordrHead->term = '';
  $record1_disordrHead->order_date = $startDate;
  $record1_disordrHead->end_date = $myDate;
  $record1_disordrHead->doctors_opinion = '';
  $record1_disordrHead->measures = '';
  $record1_disordrHead->comment = 0;

  $record2_disordrHead = new InnerData_DisorderHead();
  $record2_disordrHead->data_kbn = "1";
  $record2_disordrHead->pref = "20";
  $record2_disordrHead->report_no = "3";
  $record2_disordrHead->school_code = "E120220100026";
  $record2_disordrHead->report_date = $myDate;
  $record2_disordrHead->reason = "5";
  $record2_disordrHead->reason_etc = "Lorem Ipsum is simply dummy text of the printing and typesetting industry";
  $record2_disordrHead->term = '';
  $record2_disordrHead->order_date = $startDate;
  $record2_disordrHead->end_date = $myDate;
  $record2_disordrHead->doctors_opinion = '';
  $record2_disordrHead->measures = '';
  $record2_disordrHead->comment = 0;

  $record1_disorderDetail = new InnerData_DisorderDitale();
  $record1_disorderDetail->data_kbn = "1";
  $record1_disorderDetail->report_no = "7";
  $record1_disorderDetail->school_code = "E120220100026";
  $record1_disorderDetail->grade = "715";
  $record1_disorderDetail->class_id = "1";
  $record1_disorderDetail->disorder_num = "3";

  $record2_disorderDetail = new InnerData_DisorderDitale();
  $record2_disorderDetail->data_kbn = "1";
  $record2_disorderDetail->report_no = "7";
  $record2_disorderDetail->school_code = "E120220100026";
  $record2_disorderDetail->grade = "715";
  $record2_disorderDetail->class_id = "1";
  $record2_disorderDetail->disorder_num = "4";

  $record3_disorderDetail = new InnerData_DisorderDitale();
  $record3_disorderDetail->data_kbn = "1";
  $record3_disorderDetail->report_no = "7";
  $record3_disorderDetail->school_code = "E120220100025";
  $record3_disorderDetail->grade = "715";
  $record3_disorderDetail->class_id = "1";
  $record3_disorderDetail->disorder_num = "3";

  $record4_disorderDetail = new InnerData_DisorderDitale();
  $record4_disorderDetail->data_kbn = "1";
  $record4_disorderDetail->report_no = "7";
  $record4_disorderDetail->school_code = "E120220100025";
  $record4_disorderDetail->grade = "715";
  $record4_disorderDetail->class_id = "1";
  $record4_disorderDetail->disorder_num = "3";


  $records_disordrHead = [$record1_disordrHead, $record2_disordrHead];
  $records_disorderDetails = [$record1_disorderDetail, $record2_disorderDetail, $record3_disorderDetail, $record4_disorderDetail];

  $innerdata = new InnerData([], [], [], $records_disordrHead, $records_disorderDetails, [], [], []);

  $save_data = new DisorderDitale();
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