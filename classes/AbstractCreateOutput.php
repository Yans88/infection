<?php 

require_once('models/InnerData.php');
require_once('models/SaveData.php');

// 生成部の抽象クラス
// Abstract class of generator
abstract class AbstractCreateOutput
{
  /**
   * 保存用JSON
   *
   * @var SaveData
   */
  public $csv_json;

  /**
   * 内部データを変換してJSONデータを生成する
   * Convert internal data to generate JSON and CSV data
   *
   * @param InnerData $inner_data 
   * @return void
   */
  abstract protected function createOutputCsv(InnerData $inner_data);
}

?>