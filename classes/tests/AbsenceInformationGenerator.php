<?php 
require_once('../Absence.php');
require_once('../models/InnerData.php');

try{

    //Record with symptom 1
    $record1 = new InnerData_Absence();
    $record1->data_kbn = "1";
    $record1->school_code = "E120220100025";
    $record1->pref = "20";
    $record1->grade = "715";
    $record1->class_id = "1";
    $record1->symptom = "1099";
    $record1->report_date = "20211004";
    $record1->absence_num = "3";

    $record2 = new InnerData_Absence();
    $record2->data_kbn = "1";
    $record2->school_code = "E120220100025";
    $record2->pref = "20";
    $record2->grade = "715";
    $record2->class_id = "1";
    $record2->symptom = "1099";
    $record2->report_date = "20211005";
    $record2->absence_num = "4";

    $record3 = new InnerData_Absence();
    $record3->data_kbn = "1";
    $record3->school_code = "E120220100026";
    $record3->pref = "20";
    $record3->grade = "715";
    $record3->class_id = "1";
    $record3->symptom = "1099";
    $record3->report_date = "20211004";
    $record3->absence_num = "1";

    //Record with symptom 2
    $record1_symptom2 = new InnerData_Absence();
    $record1_symptom2->data_kbn = "1";
    $record1_symptom2->school_code = "E120220100025";
    $record1_symptom2->pref = "20";
    $record1_symptom2->grade = "715";
    $record1_symptom2->class_id = "1";
    $record1_symptom2->symptom = "10100";
    $record1_symptom2->report_date = "20211004";
    $record1_symptom2->absence_num = "5";

    $record2_symptom2 = new InnerData_Absence();
    $record2_symptom2->data_kbn = "1";
    $record2_symptom2->school_code = "E120220100025";
    $record2_symptom2->pref = "20";
    $record2_symptom2->grade = "715";
    $record2_symptom2->class_id = "1";
    $record2_symptom2->symptom = "10100";
    $record2_symptom2->report_date = "20211005";
    $record2_symptom2->absence_num = "1";

    $record3_symptom2 = new InnerData_Absence();
    $record3_symptom2->data_kbn = "1";
    $record3_symptom2->school_code = "E120220100026";
    $record3_symptom2->pref = "20";
    $record3_symptom2->grade = "715";
    $record3_symptom2->class_id = "1";
    $record3_symptom2->symptom = "10100";
    $record3_symptom2->report_date = "20211004";
    $record3_symptom2->absence_num = "10";

    //Record with symptom 3
    $record1_symptom3 = new InnerData_Absence();
    $record1_symptom3->data_kbn = "1";
    $record1_symptom3->school_code = "E120220100025";
    $record1_symptom3->pref = "20";
    $record1_symptom3->grade = "715";
    $record1_symptom3->class_id = "1";
    $record1_symptom3->symptom = "10088";
    $record1_symptom3->report_date = "20211004";
    $record1_symptom3->absence_num = "1";

    $record2_symptom3 = new InnerData_Absence();
    $record2_symptom3->data_kbn = "1";
    $record2_symptom3->school_code = "E120220100025";
    $record2_symptom3->pref = "20";
    $record2_symptom3->grade = "715";
    $record2_symptom3->class_id = "1";
    $record2_symptom3->symptom = "10088";
    $record2_symptom3->report_date = "20211005";
    $record2_symptom3->absence_num = "1";

    $record3_symptom3 = new InnerData_Absence();
    $record3_symptom3->data_kbn = "1";
    $record3_symptom3->school_code = "E120220100026";
    $record3_symptom3->pref = "20";
    $record3_symptom3->grade = "715";
    $record3_symptom3->class_id = "1";
    $record3_symptom3->symptom = "10088";
    $record3_symptom3->report_date = "20211004";
    $record3_symptom3->absence_num = "1";

    $record1_symptom4 = new InnerData_Absence();
    $record1_symptom4->data_kbn = "1";
    $record1_symptom4->school_code = "E120220100026";
    $record1_symptom4->pref = "20";
    $record1_symptom4->grade = "715";
    $record1_symptom4->class_id = "1";
    $record1_symptom4->symptom = "10077";
    $record1_symptom4->report_date = "20211004";
    $record1_symptom4->absence_num = "0";

    $record2_symptom4 = new InnerData_Absence();
    $record2_symptom4->data_kbn = "1";
    $record2_symptom4->school_code = "E120220100026";
    $record2_symptom4->pref = "20";
    $record2_symptom4->grade = "715";
    $record2_symptom4->class_id = "1";
    $record2_symptom4->symptom = "10077";
    $record2_symptom4->report_date = "20211004";
    $record2_symptom4->absence_num = "0";
    
    $record3_symptom4 = new InnerData_Absence();
    $record3_symptom4->data_kbn = "1";
    $record3_symptom4->school_code = "E120220100026";
    $record3_symptom4->pref = "20";
    $record3_symptom4->grade = "715";
    $record3_symptom4->class_id = "1";
    $record3_symptom4->symptom = "10077";
    $record3_symptom4->report_date = "20211004";
    $record3_symptom4->absence_num = "0";

    $record1_symptom5 = new InnerData_Absence();
    $record1_symptom5->data_kbn = "1";
    $record1_symptom5->school_code = "E120220100026";
    $record1_symptom5->pref = "20";
    $record1_symptom5->grade = "715";
    $record1_symptom5->class_id = "1";
    $record1_symptom5->symptom = "10055";
    $record1_symptom5->report_date = "20211004";
    $record1_symptom5->absence_num = "0";

    $record2_symptom5 = new InnerData_Absence();
    $record2_symptom5->data_kbn = "1";
    $record2_symptom5->school_code = "E120220100026";
    $record2_symptom5->pref = "20";
    $record2_symptom5->grade = "715";
    $record2_symptom5->class_id = "1";
    $record2_symptom5->symptom = "10055";
    $record2_symptom5->report_date = "20211004";
    $record2_symptom5->absence_num = "0";
    
    $record3_symptom5 = new InnerData_Absence();
    $record3_symptom5->data_kbn = "1";
    $record3_symptom5->school_code = "E120220100026";
    $record3_symptom5->pref = "20";
    $record3_symptom5->grade = "715";
    $record3_symptom5->class_id = "1";
    $record3_symptom5->symptom = "10055";
    $record3_symptom5->report_date = "20211004";
    $record3_symptom5->absence_num = "1";

    $records = [
        $record1, $record2, $record3, 
        $record1_symptom2, $record2_symptom2, $record3_symptom2,
        $record1_symptom3, $record2_symptom3, $record3_symptom3,
        $record1_symptom4, $record2_symptom4, $record3_symptom4,
        $record1_symptom5, $record2_symptom5, $record3_symptom5
    ];

    $inner_data = new InnerData([], $records, [], [], [], [], [], []);

    $save_data = new Absence();
    $save_data->createOutputCsv($inner_data);

    print_r($save_data);

} catch (Exception $e) {
  echo $e->getMessage() . "\n";;
}



?>