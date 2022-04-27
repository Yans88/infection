<?php
require_once('../RelayServerCsv.php');
require_once('../models/CsvRecord.php');
$config = parse_ini_file('../../config.ini');
try {
  $record1 = new CsvRecord_absence();
  $record1->data_kbn = "1";
  $record1->school_code = "E120220100025";
  $record1->pref = "20";
  $record1->grade = "715";
  $record1->class_id = "1";
  $record1->symptom = "1099";
  $record1->report_date = "20211004";
  $record1->absence_num = "3";

  $record2 = new CsvRecord_absence();
  $record2->data_kbn = "1";
  $record2->school_code = "E120220100025";
  $record2->pref = "20";
  $record2->grade = "715";
  $record2->class_id = "1";
  $record2->symptom = "1099";
  $record2->report_date = "20211005";
  $record2->absence_num = "4";

  $record3 = new CsvRecord_absence();
  $record3->data_kbn = "1";
  $record3->school_code = "E120220100026";
  $record3->pref = "20";
  $record3->grade = "715";
  $record3->class_id = "1";
  $record3->symptom = "1099";
  $record3->report_date = "20211004";
  $record3->absence_num = "1";

  $record4 = new CsvRecord_class_def();
  $record4->data_kbn = "1";
  $record4->school_code = "E120220100025";
  $record4->pref = "20";
  $record4->year = "2021";
  $record4->ymd = "202110401";
  $record4->grade = "711";
  $record4->class_id = "1";
  $record4->class_name = "小1年1組";
  $record4->student_num = "2";

  $record5 = new CsvRecord_class_def();
  $record5->data_kbn = "1";
  $record5->school_code = "E120220100026";
  $record5->pref = "20";
  $record5->year = "2021";
  $record5->ymd = "202110401";
  $record5->grade = "711";
  $record5->class_id = "2";
  $record5->class_name = "小2年1組";
  $record5->student_num = "3";

  $records = [$record1, $record2, $record3, $record4, $record5];

  $outputer = new RelayServerCsv($config);
  $outputer->outputCsv($records);

  /*
  When this is executed, 4 files will be output.
  CSV1. 5010001105916_E120220100025_absence_20220216110312345.csv
  CSV2. 5010001105916_E120220100026_absence_20220216110312345.csv
  CSV3. 5010001105916_E120220100025_class_def_20220216110312345.csv
  CSV4. 5010001105916_E120220100026_class_def_20220216110312345.csv

  CSV1 contains the data for $ record1 and $ record2

  "data_kbn","pref","school_code","grade","class_id","symptom","report_date","absence_num"
  "1","20","E120220100025","715","1","1099","20211004","3"
  "1","20","E120220100025","715","1","1099","20211005","4"

  CSV2 contains the data for $ record3

  "data_kbn","pref","school_code","grade","class_id","symptom","report_date","absence_num"
  "1","20","E120220100026","715","1","1099","20211004","1"

  CSV3 contains the data for $ record4

  "data_kbn","pref","school_code","year","ymd","grade","class_id","class_name","student_num"
  "1","20","E120220100025","2021","20210401","711","1","小1年1組","2"

  CSV4 contains the data for $ record5

  "data_kbn","pref","school_code","year","ymd","grade","class_id","class_name","student_num"
  "1","20","E120220100026","2021","20210401","711","1","小2年1組","3"

  -------

  The file type can be determined by the instas of which class, so the code below can be used to determine it.

  foreach ($csv_records as $row) {
    if($row instanceof CsvRecord_absence){
      // file type is "absence"
    }
    else if($row instanceof CsvRecord_class_def ){

    }
    // The other 4 types of files are judged in the same way.
  }

  */
} catch (Exception $e) {
  echo $e->getMessage() . "\n";;
}