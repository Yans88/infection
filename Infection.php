<?php
date_default_timezone_set('Asia/Tokyo');
require_once('./classes/GetKNJ.php');
require_once('./classes/ConvertInnerData.php');
require_once('./classes/ClassTotal.php');
require_once('./classes/SaveJSON.php');
require_once('./classes/CreateCSVRecords.php');
require_once('./classes/RelayServerCsv.php');

$config = parse_ini_file('config.ini');

try {

  $currentdatetime = date("YmdHis"); 

  if(isset($_GET["date"])){
    $currentdatetime = $_GET["date"];
  }

  // 各処理の呼び出しと例外発生時のロギングを行います
  // Processing call and logging when an exception occurs
  echo 'Start ' . $currentdatetime . "\n";

  $knj = new GetKNJ($config);
  $knjdata = $knj->readKNJdb();

  $converter = new ConvertInnerData();
  $innerdata = $converter->convert($knjdata,$currentdatetime);

  $total = new ClassTotal($currentdatetime);
  $savedata = $total->total($innerdata);

  $csvcreater = new CreateCSVRecords($config);
  $csvdata = $csvcreater->create($savedata);

  $outputer = new RelayServerCsv($config,$currentdatetime);
  $outputer->outputCsv($csvdata);

  $savejson = new SaveJSON($config);
  $savejson->save($savedata);

  echo 'End' . "\n";
} catch (Exception $e) {
  // ロギングは例外をキャッチし、その内容をファイルに出力してください
  // Logging should catch the exception and output its contents to a file
  $dateNow = date('d-m-Y_His');
  error_log(serialize($e->getMessage()), 3, "error_log_" . $dateNow);
  echo $e->getMessage() . "\n";;
}