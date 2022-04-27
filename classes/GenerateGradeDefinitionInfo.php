<?php

require_once 'models/GradeDefitinionInfo.php';

/**
 * 休業情報取得
 * Grade/Class definition info Generator
 */
class GenerateGradeDefinitionInfo
{
    /**
     * Database Connection
     * @var $conn
     */
    protected $conn;

    /**
     * @param $conn
     */
    public function __construct($conn)
    {
        if (!isset($this->conn)) {
            $this->conn = $conn;
        }
    }

    /**
     * @param string $sql
     * @return object $resultSet
     */
    public function execute($sql)
    {
        $stmt = false;
        if ($sql != '') {
            $stmt = odbc_exec($this->conn, $sql);        
        }
        return $stmt;
    }

    /**
     * @return string
     */
    public function getSql($school_code = array())
    {
        $sql = "SELECT 
        D_AD4.GRADE, D_AD4.HR_CLASS, D_AD4.DISEASECD, D_AD4.EDBOARD_SCHOOLCD as school_code,
    --     D_AD2.TOTALSUM04 as patient_no, 
    --     D_AD2.TOTALSUM05 as absence_no,
        D_AD4.PATIENT_COUNT as patient_no,
        D_AD4.ABSENCE_COUNT as absence_no,
        D_AD4.ACTION_S_DATE as period_start,
        D_AD4.ACTION_E_DATE as period_end,
        -- フラグは右から順に01～12(12=symptom_etc)がセットされる。symptom_flagの下4桁は0のまま。
        D_AD4.symptom01 as symptom_flag01, -- 発熱
        D_AD4.SYMPTOM01_REMARK as symptom_temp,
        D_AD4.symptom02 as symptom_flag02, -- 咽頭痛
        D_AD4.symptom03 as symptom_flag03, -- 関節痛
        D_AD4.symptom04 as symptom_flag04, -- 倦怠感
        D_AD4.symptom05 as symptom_flag05, -- 悪寒
        D_AD4.symptom06 as symptom_flag06, -- 腹痛
        D_AD4.symptom07 as symptom_flag07, -- 下痢
        D_AD4.symptom08 as symptom_flag08, -- 咳（かぜ）
        D_AD4.symptom09 as symptom_flag09, -- 頭痛
        D_AD4.symptom10 as symptom_flag10, -- 嘔吐
        D_AD4.symptom11 as symptom_flag11, -- 嘔気
        D_AD4.SYMPTOM12 as symptom_etc, -- その他
        D_AD4.REMARK as note
    FROM MEDEXAM_DISEASE_ADDITION4_DAT D_AD4
    -- WHERE D_AD4.EDBOARD_SCHOOLCD = '0000000000'
    -- D_AD4テーブル単体でデータ取得に変更
    -- LEFT JOIN MEDEXAM_DISEASE_ADDITION2_DAT D_AD2
    --     ON  D_AD2.YEAR = D_AD4.YEAR
    --     AND D_AD2.GRADE = D_AD4.GRADE
    --     AND D_AD2.HR_CLASS = D_AD4.HR_CLASS
    ";
        
        if (!empty($school_code)) {
            $imploded_schoolCode = "'" . implode("','", $school_code) . "'";
            $sql .= " WHERE D_AD4.EDBOARD_SCHOOLCD IN ($imploded_schoolCode)";
        }
        return $sql . ";";
    }

    /**
     * Undocumented function
     * Get data from the "KNJ" Holiday Information
     * @return array
     */
    public function readGradeDefinitionInfo($school_code = array())
    {
        $resultSet = $this->execute($this->getSql($school_code));
        $rtn = [];
        echo('ここから賢者の閉鎖情報ーーーーー<br/>');
        while ($row = odbc_fetch_array($resultSet)) {
            $holidayInfo = new GradeDefinitionInfo();
            $holidayInfo->setSchoolCode($row['SCHOOL_CODE']);
            $holidayInfo->setGrade($row['GRADE']);
            $holidayInfo->setHrClass($row['HR_CLASS']);
            $holidayInfo->setDiseaseCd($row['DISEASECD']);
            $holidayInfo->setPatientNo($row['PATIENT_NO']);
            $holidayInfo->setAbsenceNo($row['ABSENCE_NO']);
            $holidayInfo->setPeriodStart($row['PERIOD_START']);
            $holidayInfo->setPeriodEnd($row['PERIOD_END']);
            $holidayInfo->setSymptomFlag1($row['SYMPTOM_FLAG1']);
            $holidayInfo->setSymptomTemp($row['SYMPTOM_TEMP']);
            $holidayInfo->setSymptomFlag2($row['SYMPTOM_FLAG2']);
            $holidayInfo->setSymptomFlag3($row['SYMPTOM_FLAG3']);
            $holidayInfo->setSymptomFlag4($row['SYMPTOM_FLAG4']);
            $holidayInfo->setSymptomFlag5($row['SYMPTOM_FLAG5']);
            $holidayInfo->setSymptomFlag6($row['SYMPTOM_FLAG6']);
            $holidayInfo->setSymptomFlag7($row['SYMPTOM_FLAG7']);
            $holidayInfo->setSymptomFlag8($row['SYMPTOM_FLAG8']);
            $holidayInfo->setSymptomFlag9($row['SYMPTOM_FLAG9']);
            $holidayInfo->setSymptomFlag10($row['SYMPTOM_FLAG10']);
            $holidayInfo->setSymptomFlag11($row['SYMPTOM_FLAG11']);
            $holidayInfo->setSymptomEtc($row['SYMPTOM_ETC']);
            $holidayInfo->setNote($row['NOTE']);

            $rtn[] = $holidayInfo;

            print_r($holidayInfo);
            echo('<br/>');
        }

        return $rtn;
    }
}