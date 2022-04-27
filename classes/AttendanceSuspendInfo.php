<?php
require_once('models/AttendanceInfo.php');

class AttendanceSuspendInfo {

    protected $conn;

    public function __construct($conn){
        if(!isset($this->conn)){
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

    public function getSql(array $school_code){
        $imploded_schoolCode = "'" . implode("','", $school_code) . "'";
        $query = "SELECT
                    D3.EDBOARD_SCHOOLCD as SCHOOL_CD,
                    D_SH.GRADE, D_SH.HR_CLASS, D_SH.SCHREGNO,
                    D_SH.DISEASECD as reason, D3.DISEASECD_REMARK as reason_etc,
                    D_SH.SUSPEND_DIRECT_DATE as order_date,
                    D3.SUSPEND_E_DATE as end_date,
                    D3.REMARK1, D3.REMARK2, D3.REMARK3
                FROM MEDEXAM_DISEASE_ADDITION3_DAT D3
                    JOIN MEDEXAM_DISEASE_ADDITION3_SCHREG_DAT D_SH
                        ON  D_SH.YEAR = D3.YEAR
                        AND D_SH.SUSPEND_DIRECT_DATE = D3.SUSPEND_DIRECT_DATE
                        AND D_SH.DISEASECD = D3.DISEASECD AND
                D3.EDBOARD_SCHOOLCD
                IN (".$imploded_schoolCode.")";

        return $query;
    }


    public function getDisorderInfo(array $school_code){

        
        $arr = array();
        $result = $this->execute($this->getSql($school_code));

        while($row = odbc_fetch_array($result)) {
            $save_model = new AttendanceInfo();
            $save_model->setSchoolCd($row['SCHOOL_CD']);
            $save_model->setGrade($row['GRADE']);
            $save_model->setHrClass($row['HR_CLASS']);
            $save_model->setSchregno($row['SCHREGNO']);
            $save_model->setReason($row['reason']);
            $save_model->setReasonEtc($row['reason_etc']);
            $save_model->setOrderDate($row['order_date']);
            $save_model->setEndDate($row['end_date']);
            $save_model->setRemark1($row['REMARK1']);
            $save_model->setRemark2($row['REMARK2']);
            $save_model->setRemark3($row['REMARK3']);

            $arr[] = $save_model;
        }

       

        return $arr;
    }
}


?>