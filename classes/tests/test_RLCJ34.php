<?php
require_once('../LoadInst.php');


try {
  // 各処理の呼び出しと例外発生時のロギングを行います
  // Processing call and logging when an exception occurs
  echo 'Start' . "\n";

  $save_data = new LoadInst();
  $save_data->loadData();

  echo 'End' . "\n";
} catch (Exception $e) {
  // ロギングは例外をキャッチし、その内容をファイルに出力してください
  // Logging should catch the exception and output its contents to a file
  echo $e->getMessage() . "\n";;
}