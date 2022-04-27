<?php 
require_once('../CloseData.php');
require_once('../models/InnerData.php');

try{

    //test key condition to make new record
    $record1 = new InnerData_CloseData();
    $record1->data_kbn = 0;
    $record1->pref = 20;
    $record1->school_code = "E120220100025";
    $record1->close_division = 2;
    $record1->reason = 1;
    $record1->grade = "715";
    $record1->class_id = "1";
    $record1->reoprt_date = "20211004";
    $record1->patient_num = 3;
    $record1->absence_num = 2;
    $record1->period_start = "20211002";
    $record1->period_end = "20211006";
    $record1->symptom_flag = '100000000000000';
    $record1->symptom_temp = 37.80;
    $record1->symptom_etc = '';
    $record1->note = 'need rest';

    $record2 = new InnerData_CloseData();
    $record2->data_kbn = 0;
    $record2->pref = 23;
    $record2->school_code = "E120220100025";
    $record2->close_division = 2;
    $record2->reason = 1;
    $record2->grade = "715";
    $record2->class_id = "1";
    $record2->reoprt_date = "20211004";
    $record2->patient_num = 3;
    $record2->absence_num = 2;
    $record2->period_start = "20211002";
    $record2->period_end = "20211006";
    $record2->symptom_flag = '100000000000000';
    $record2->symptom_temp = 37.80;
    $record2->symptom_etc = '';
    $record2->note = 'need rest';

    $record3 = new InnerData_CloseData();
    $record3->data_kbn = 0;
    $record3->pref = 23;
    $record3->school_code = "E120220100030";
    $record3->close_division = 2;
    $record3->reason = 1;
    $record3->grade = "715";
    $record3->class_id = "1";
    $record3->reoprt_date = "20211004";
    $record3->patient_num = 3;
    $record3->absence_num = 2;
    $record3->period_start = "20211002";
    $record3->period_end = "20211006";
    $record3->symptom_flag = '100000000000000';
    $record3->symptom_temp = 37.80;
    $record3->symptom_etc = '';
    $record3->note = 'need rest';

    $record4 = new InnerData_CloseData();
    $record4->data_kbn = 0;
    $record4->pref = 23;
    $record4->school_code = "E120220100030";
    $record4->close_division = 2;
    $record4->reason = 5;
    $record4->grade = "715";
    $record4->class_id = "1";
    $record4->reoprt_date = "20211004";
    $record4->patient_num = 3;
    $record4->absence_num = 2;
    $record4->period_start = "20211002";
    $record4->period_end = "20211006";
    $record4->symptom_flag = '100000000000000';
    $record4->symptom_temp = 37.80;
    $record4->symptom_etc = '';
    $record4->note = 'need rest';

    $record5 = new InnerData_CloseData();
    $record5->data_kbn = 0;
    $record5->pref = 23;
    $record5->school_code = "E120220100030";
    $record5->close_division = 2;
    $record5->reason = 5;
    $record5->grade = "800";
    $record5->class_id = "1";
    $record5->reoprt_date = "20211004";
    $record5->patient_num = 3;
    $record5->absence_num = 2;
    $record5->period_start = "20211002";
    $record5->period_end = "20211006";
    $record5->symptom_flag = '100000000000000';
    $record5->symptom_temp = 37.80;
    $record5->symptom_etc = '';
    $record5->note = 'need rest';

    $record6 = new InnerData_CloseData();
    $record6->data_kbn = 0;
    $record6->pref = 23;
    $record6->school_code = "E120220100030";
    $record6->close_division = 2;
    $record6->reason = 5;
    $record6->grade = "800";
    $record6->class_id = "7";
    $record6->reoprt_date = "20211004";
    $record6->patient_num = 3;
    $record6->absence_num = 2;
    $record6->period_start = "20211002";
    $record6->period_end = "20211006";
    $record6->symptom_flag = '100000000000000';
    $record6->symptom_temp = 37.80;
    $record6->symptom_etc = 'symptom_etc1';
    $record6->note = 'need rest';

    //test case for symptom_flag, symptom_temp, symptom_etc, notes
    $record6_1_symptom2 = new InnerData_CloseData();
    $record6_1_symptom2->data_kbn = 0;
    $record6_1_symptom2->pref = 23;
    $record6_1_symptom2->school_code = "E120220100030";
    $record6_1_symptom2->close_division = 2;
    $record6_1_symptom2->reason = 5;
    $record6_1_symptom2->grade = "800";
    $record6_1_symptom2->class_id = "7";
    $record6_1_symptom2->reoprt_date = "20211004";
    $record6_1_symptom2->patient_num = 5;
    $record6_1_symptom2->absence_num = 5;
    $record6_1_symptom2->period_start = "20211002";
    $record6_1_symptom2->period_end = "20211006";
    $record6_1_symptom2->symptom_flag = '011000000000010';
    $record6_1_symptom2->symptom_temp = 35.80;
    $record6_1_symptom2->symptom_etc = 'symptom_etc2';
    $record6_1_symptom2->note = 'notes1';

    $record6_2_symptom2 = new InnerData_CloseData();
    $record6_2_symptom2->data_kbn = 0;
    $record6_2_symptom2->pref = 23;
    $record6_2_symptom2->school_code = "E120220100030";
    $record6_2_symptom2->close_division = 2;
    $record6_2_symptom2->reason = 5;
    $record6_2_symptom2->grade = "800";
    $record6_2_symptom2->class_id = "7";
    $record6_2_symptom2->reoprt_date = "20211004";
    $record6_2_symptom2->patient_num = 1;
    $record6_2_symptom2->absence_num = 1;
    $record6_2_symptom2->period_start = "20211002";
    $record6_2_symptom2->period_end = "20211006";
    $record6_2_symptom2->symptom_flag = '000000000000010';
    $record6_2_symptom2->symptom_temp = 38.00;
    $record6_2_symptom2->symptom_etc = 'symptom_etc3';
    $record6_2_symptom2->note = 'notes2';


    $records = [
        $record1, $record2, $record3, $record4, $record5, $record6,
        $record6_1_symptom2, $record6_2_symptom2
    ];

    $inner_data = new InnerData([], [], [], [], [], $records, [], []);

    $save_data = new CloseData();
    $save_data->createOutputCsv($inner_data);

    print_r($save_data);

}catch (Exception $e) {
  echo $e->getMessage() . "\n";;
}



?>