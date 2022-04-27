<?php
require_once('models/SaveData.php');
/**
 * 保存用JSON作成
 * Create JSON for saving
 */
class SaveJSON
{

  public $outputJson;

  public function __construct(array $config)
  {
    $this->outputJson = $config['outputSave'];
  }

  /**
   * 保存用JSON作成
   * Create JSON for saving
   *
   * @param SaveData $save_json 
   * @return void
   */
  public function save(SaveData $save_json)
  {
    // 共通機能シートの「保存用JSON作成」の内容を実装し、JSONファイルを出力します
    // Implement the contents of "Create JSON for saving" in the common function sheet and output the JSON file.	
    $outputJson = $this->outputJson;
    $data_arr['filecode'] = '';
    $data_arr['common'] = isset($save_json->common) && !empty($save_json->common) ? $save_json->common : (object)array();
    $data_arr['absence'] = isset($save_json->absence) && !empty($save_json->absence) ? $save_json->absence : (object)array();
    $data_arr['class_def'] = isset($save_json->class_def) && !empty($save_json->class_def) ? $save_json->class_def : (object)array();
    $data_arr['disorder_head'] = isset($save_json->disorder_head) && !empty($save_json->disorder_head) ? $save_json->disorder_head : (object)array();
    $data_arr['disorder_ditale'] = isset($save_json->disorder_ditale) && !empty($save_json->disorder_ditale) ? $save_json->disorder_ditale : (object)array();
    $data_arr['close_data'] = isset($save_json->close_data) && !empty($save_json->close_data) ? $save_json->close_data : (object)array();
    $data_arr['inst'] = isset($save_json->inst) && !empty($save_json->inst) ? $save_json->inst : (object)array();
    $res = json_encode($data_arr, JSON_PRETTY_PRINT);
    file_put_contents($outputJson . '/savedata.json', $res);
    $this->backupJson($res);
  }

  function backupJson($res = array())
  {
    //Copy savedata.json and output it to the directory created in 1. The file name is the current time (HIMMSS.json)
    $dateNow = date('Ymd');
    $timeNow = date("His");
    $outputJson = $this->outputJson . '/' . $dateNow;
    if (!file_exists($outputJson)) {
      mkdir($outputJson, 0777);
    }
    file_put_contents($outputJson . '/' . $timeNow . '.json', $res);

    //Delete directories older than 30 days from the current date
    $dateExpired = date('Ymd', strtotime('-30 days'));
    $outputDelete = $this->outputJson . '/' . $dateExpired;
    if (file_exists($outputDelete)) {
      $files = glob($outputDelete . '/*');
      foreach ($files as $file) {
        if (is_file($file)) {
          unlink($file);
        }
      }
      rmdir($outputDelete);
    }
  }
}