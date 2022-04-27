<?php
class RelayServerCsv
{
  const corporate_code = "5010001105916";

  public $outputCsv;
  protected $currentdatetime;

  public function __construct(array $config,$currentdatetime)
  {
    $this->outputCsv = $config['outputCsv'];
    $this->currentdatetime = $currentdatetime;
  }

  /**
   * CSVファイルを出力する
   * Output CSV file
   *
   * @param Array $csv_records Array of CsvRecord
   * @return void
   */

  public function outputCsv(array $csv_records)
  {
    $date = $this->currentdatetime . substr(explode(".", microtime(true))[1], 0, 3);
    $mergedData = [];
    $outputCsv = $this->outputCsv;
    foreach ($csv_records as $key => $value) {
      $header = [];
      switch (true) {
        case $value instanceof CsvRecord_absence:
          $filename = self::corporate_code . "_" . $value->school_code . "_" . 'absence' . "_" . $date . ".csv";
          $header = ['data_kbn', 'pref', 'school_code', 'grade', 'class_id', 'symptom', 'report_date', 'absence_num'];
          if (!isset($mergedData[$filename])) {
            $mergedData[$filename] = [];
            array_unshift($mergedData[$filename], $header);
            array_push($mergedData[$filename], [$value->data_kbn, $value->pref, $value->school_code, $value->grade, $value->class_id, $value->symptom, $value->report_date, $value->absence_num]);
          } else {
            array_push($mergedData[$filename], [$value->data_kbn, $value->pref, $value->school_code, $value->grade, $value->class_id, $value->symptom, $value->report_date, $value->absence_num]);
          }
          break;
        case $value instanceof CsvRecord_class_def:
          $filename = self::corporate_code . "_" . $value->school_code . "_" . 'class_def' . "_" . $date . ".csv";
          $header = ['data_kbn', 'pref', 'school_code', 'year', 'ymd', 'grade', 'class_id', 'class_name', 'student_num'];
          if (!isset($mergedData[$filename])) {
            $mergedData[$filename] = [];
            array_unshift($mergedData[$filename], $header);
            array_push($mergedData[$filename], [$value->data_kbn, $value->pref, $value->school_code, $value->year, $value->ymd, $value->grade, $value->class_id, $value->class_name, $value->student_num]);
          } else {
            array_push($mergedData[$filename], [$value->data_kbn, $value->pref, $value->school_code, $value->year, $value->ymd, $value->grade, $value->class_id, $value->class_name, $value->student_num]);
          }
          break;
        case $value instanceof CsvRecord_close_data:
          $filename = self::corporate_code . "_" . $value->school_code . "_" . 'close_data' . "_" . $date . ".csv";
          $header = ['data_kbn', 'pref', 'school_code', 'close_division', 'reason', 'grade', 'class_id', 'report_date', 'patient_num', 'absence_num', 'period_start', 'period_end', 'symptom_flag', 'symptom_temp', 'symptom_etc', 'note'];
          if (!isset($mergedData[$filename])) {
            $mergedData[$filename] = [];
            array_unshift($mergedData[$filename], $header);
            array_push($mergedData[$filename], [$value->data_kbn, $value->pref, $value->school_code, $value->close_division, $value->reason, $value->grade, $value->class_id, $value->report_date, $value->patient_num, $value->absence_num, $value->period_start, $value->period_end, $value->symptom_flag, $value->symptom_temp, $value->symptom_etc, $value->note]);
          } else {
            array_push($mergedData[$filename], [$value->data_kbn, $value->pref, $value->school_code, $value->close_division, $value->reason, $value->grade, $value->class_id, $value->report_date, $value->patient_num, $value->absence_num, $value->period_start, $value->period_end, $value->symptom_flag, $value->symptom_temp, $value->symptom_etc, $value->note]);
          }
          break;
        case $value instanceof CsvRecord_disorder_head:
          $filename = self::corporate_code . "_" . $value->school_code . "_" . 'disorder_head' . "_" . $date . ".csv";
          $header = ['data_kbn', 'pref', 'report_no', 'school_code', 'report_date', 'reason', 'reason_etc', 'term', 'order_date', 'end_date', 'doctors_opinion', 'measures', 'comment'];
          if (!isset($mergedData[$filename])) {
            $mergedData[$filename] = [];
            array_unshift($mergedData[$filename], $header);
            array_push($mergedData[$filename], [$value->data_kbn, $value->pref, $value->report_no, $value->school_code, $value->report_date, $value->reason, $value->reason_etc, $value->term, $value->order_date, $value->end_date, $value->doctors_opinion, $value->measures, $value->comment]);
          } else {
            array_push($mergedData[$filename], [$value->data_kbn, $value->pref, $value->report_no, $value->school_code, $value->report_date, $value->reason, $value->reason_etc, $value->term, $value->order_date, $value->end_date, $value->doctors_opinion, $value->measures, $value->comment]);
          }
          break;
        case $value instanceof CsvRecord_disorder_ditale:
          $filename = self::corporate_code . "_" . $value->school_code . "_" . 'disorder_ditale' . "_" . $date . ".csv";
          $header = ['data_kbn', 'report_no', 'school_code', 'grade', 'class_id', 'disorder_num'];
          if (!isset($mergedData[$filename])) {
            $mergedData[$filename] = [];
            array_unshift($mergedData[$filename], $header);
            array_push($mergedData[$filename], [$value->data_kbn, $value->report_no, $value->school_code, $value->grade, $value->class_id, $value->disorder_num]);
          } else {
            array_push($mergedData[$filename], [$value->data_kbn, $value->report_no, $value->school_code, $value->grade, $value->class_id, $value->disorder_num]);
          }
          break;
        case $value instanceof CsvRecord_inst:
          $filename = self::corporate_code . "_" . $value->school_code . "_" . 'inst' . "_" . $date . ".csv";
          $header = ['data_kbn', 'pref', 'school_code', 'city', 'division', 'school_area', 'facility_name', 'person_in_charge', 'tel', 'fax', 'address', 'mail', 'director', 'doctor_mail_1', 'doctor_mail_2', 'doctor_mail_3', 'lost_flg', 'kbn'];
          if (!isset($mergedData[$filename])) {
            $mergedData[$filename] = [];
            array_unshift($mergedData[$filename], $header);
            array_push($mergedData[$filename], [$value->data_kbn, $value->pref, $value->school_code, $value->city, $value->division, $value->school_area, $value->facility_name, $value->person_in_charge, $value->tel, $value->fax, $value->address, $value->mail, $value->director, $value->doctor_mail_1, $value->doctor_mail_2, $value->doctor_mail_3, $value->lost_flag, $value->kbn]);
          } else {
            array_push($mergedData[$filename], [$value->data_kbn, $value->pref, $value->school_code, $value->city, $value->division, $value->school_area, $value->facility_name, $value->person_in_charge, $value->tel, $value->fax, $value->address, $value->mail, $value->director, $value->doctor_mail_1, $value->doctor_mail_2, $value->doctor_mail_3, $value->lost_flag, $value->kbn]);
          }
          break;
        default:
          throw new Exception('Invalid file type');
          break;
      }
    }
    foreach ($mergedData as $key => $value) {
      $file_name = $outputCsv . '/' . $key;
      $this->generateCsv($file_name, $value);
    }
  }
  /**
   * @param $value array
   * @return string array values enclosed in quotes every time.
   */
  function encodeFunc($value)
  {
    $value = str_replace('\\"', '"', $value);
    $value = str_replace('"', '\"', $value);
    return '"' . $value . '"';
  }
  /**
   * @param $filename string
   * @param $csv_records array
   * @return string generate csv file.
   */
  function generateCsv($filename, $csv_records)
  {
    $fp = fopen($filename, 'w');
    foreach ($csv_records as $row) {
      fputs($fp, implode(",", array_map([$this, 'encodeFunc'], $row)) . "\r\n");
    }
    fclose($fp);
  }
}