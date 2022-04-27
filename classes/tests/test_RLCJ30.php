<?php
require_once('../ClassTotal.php');
require_once('../models/InnerData.php');
//require_once('../SaveJSON.php');
try {
  // 各処理の呼び出しと例外発生時のロギングを行います
  // Processing call and logging when an exception occurs
  echo 'Start' . "\n";

  $myDate = date('Y/m/d');
  $startDate = date('Y/m/d', strtotime('3 week'));

  $record_closeData = new InnerData_CloseData();
  $record_closeData->data_kbn = "1";
  $record_closeData->pref = "20";
  $record_closeData->school_code = "E120220100025";
  $record_closeData->close_division = "1";
  $record_closeData->reason = "20";
  $record_closeData->grade = "715";
  $record_closeData->class_id = "2";
  $record_closeData->report_date = $myDate;
  $record_closeData->patient_num = 0;
  $record_closeData->absence_num = "8";
  $record_closeData->period_start = $myDate;
  $record_closeData->period_end = '';
  $record_closeData->symptom_flag = '';
  $record_closeData->symptom_temp = "35.7";
  $record_closeData->symptom_etc = '';
  $record_closeData->note = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry';

  $record1_abs = new InnerData_Absence();
  $record1_abs->data_kbn = "1";
  $record1_abs->school_code = "E120220100025";
  $record1_abs->pref = "20";
  $record1_abs->grade = "715";
  $record1_abs->class_id = "1";
  $record1_abs->symptom = "1099";
  $record1_abs->report_date = $myDate;
  $record1_abs->absence_num = "3";

  $record2_abs = new InnerData_Absence();
  $record2_abs->data_kbn = "1";
  $record2_abs->school_code = "E120220100026";
  $record2_abs->pref = "20";
  $record2_abs->grade = "715";
  $record2_abs->class_id = "1";
  $record2_abs->symptom = "1099";
  $record2_abs->report_date = $myDate;
  $record2_abs->absence_num = "4";

  $record3_abs = new InnerData_Absence();
  $record3_abs->data_kbn = "1";
  $record3_abs->school_code = "E120220100027";
  $record3_abs->pref = "20";
  $record3_abs->grade = "715";
  $record3_abs->class_id = "1";
  $record3_abs->symptom = "1099";
  $record3_abs->report_date = $myDate;
  $record3_abs->absence_num = "1";

  $record4_abs = new InnerData_Absence();
  $record4_abs->data_kbn = "1";
  $record4_abs->school_code = "E120220100028";
  $record4_abs->pref = "20";
  $record4_abs->grade = "716";
  $record4_abs->class_id = "1";
  $record4_abs->symptom = "1099";
  $record4_abs->report_date = $myDate;
  $record4_abs->absence_num = "2";

  $records_closeData = [$record_closeData];
  $records_absen = [$record1_abs, $record2_abs, $record3_abs, $record4_abs];

  $innerdata = new InnerData([], $records_absen, [], [], [], $records_closeData, [], []);

  $total = new ClassTotal();
  $savedata = $total->total($innerdata);

  //$savejson = new SaveJSON();
  //$savejson->save($savedata);
  //print_r($savedata);

  echo 'End' . "\n";
} catch (Exception $e) {
  // ロギングは例外をキャッチし、その内容をファイルに出力してください
  // Logging should catch the exception and output its contents to a file
  echo $e->getMessage() . "\n";;
}
