<?php
date_default_timezone_set('Asia/Tokyo');
require_once('../ClassTotal.php');
require_once('../SaveJSON.php');
require_once('../ClassDef.php');
require_once('../models/InnerData.php');

$config = parse_ini_file('../../config.ini');

try {
  // 各処理の呼び出しと例外発生時のロギングを行います
  // Processing call and logging when an exception occurs
  echo 'Start' . "\n";

  $record1_classDef = new InnerData_ClassDef();
  $record1_classDef->data_kbn = "1";
  $record1_classDef->pref = "20";
  $record1_classDef->school_code = "E120220100026";
  $record1_classDef->year = '2022';
  $record1_classDef->ymd = "";
  $record1_classDef->grade = "";
  $record1_classDef->class_id = 0;
  $record1_classDef->class_name = '';
  $record1_classDef->student_num = 1;

  $record2_classDef = new InnerData_ClassDef();
  $record2_classDef->data_kbn = "1";
  $record2_classDef->pref = "20";
  $record2_classDef->school_code = "E120220100025";
  $record2_classDef->year = '2021';
  $record2_classDef->ymd = "";
  $record2_classDef->grade = "";
  $record2_classDef->class_id = 0;
  $record2_classDef->class_name = '';
  $record2_classDef->student_num = 2;

  $records_classDef = [$record1_classDef, $record2_classDef];

  $innerdata = new InnerData([], [], $records_classDef, [], [], [], [], []);

  $total = new ClassTotal();
  $savedata = $total->total($innerdata);

  $savedata->common = array('pref' => 'Pref', 'school_code' => 'School Code', 'grade' => 'GRADE', 'class_id' => 'ID Class');
  $savedata->absence = array('pref' => 'Pref', 'school_code' => 'School Code', 'grade' => 'GRADE', 'class_id' => 'ID Class', 'sympton' => 'Data Symptom');
  $savedata->class_def = array('pref' => 'Pref', 'school_code' => 'School Code', 'grade' => 'GRADE', 'class_id' => 'ID Class', 'class_name' => 'Data Class Name');
  $savedata->disorder_head = array('school_code' => 'School Code', 'class_id' => 'ID Class', 'pref' => 'Pref');
  $savedata->disorder_ditlie = array('school_code' => 'School Code', 'grade' => 'GRADE', 'class_id' => 'ID Class', 'report_no' => 'Report Number');
  $savedata->close_data = array('pref' => 'Pref', 'school_code' => 'School Code', 'grade' => 'GRADE', 'class_id' => 'ID Class');
  $savedata->inst = array('pref' => 'Pref', 'school_code' => 'School Code');

  $savejson = new SaveJSON($config);
  $savejson->save($savedata);

  echo 'End' . "\n";
} catch (Exception $e) {
  // ロギングは例外をキャッチし、その内容をファイルに出力してください
  // Logging should catch the exception and output its contents to a file
  echo $e->getMessage() . "\n";;
}