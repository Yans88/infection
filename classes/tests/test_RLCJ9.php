<?php
require_once('../ClassDef.php');
require_once('../models/InnerData.php');

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

  $save_data = new ClassDef();
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