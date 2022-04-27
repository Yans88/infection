<?php

require_once 'models/HolidayInfo.php';

/**
 * 休業情報取得
 * Holiday Information Acquisition
 */
class ConvertHolidayInfo
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
        $sql  = "SELECT REGDH.YEAR, REGDH.GRADE, REGDH.HR_CLASS, REGDH.HR_NAME, DI.TOTALSUM06, DI.EDBOARD_SCHOOLCD as SCHOOL_CODE ";
        $sql .= "FROM SCHREG_REGD_HDAT REGDH ";
        $sql .= "JOIN MEDEXAM_DISEASE_ADDITION2_DAT DI ";
        $sql .= "ON  DI.YEAR = REGDH.YEAR ";
        $sql .= "AND DI.GRADE = REGDH.GRADE ";
        $sql .= "AND DI.HR_CLASS = REGDH.HR_CLASS ";
        
        if (!empty($school_code)) {
            $imploded_schoolCode = "'" . implode("','", $school_code) . "'";
            $sql .= "  WHERE DI.EDBOARD_SCHOOLCD IN ($imploded_schoolCode)";
        }
        

        return $sql;
    }

    /**
     * Undocumented function
     * Get data from the "KNJ" Holiday Information
     * @return array
     */
    public function readHolidayInfo($school_code = array())
    {
        $resultSet = $this->execute($this->getSql($school_code));
        $rtn = [];
        while ($row = odbc_fetch_array($resultSet)) {
            $holidayInfo = new HolidayInfo();
            $holidayInfo->setSchoolCode($row['SCHOOL_CODE']);
            $holidayInfo->setYear($row['YEAR']);
            $holidayInfo->setGrade($row['GRADE']);
            $holidayInfo->setHrClass($row['HR_CLASS']);
            $holidayInfo->setHrName($row['HR_NAME']);
            $holidayInfo->setTotalSum($row['TOTAL_SUM06']);

            $rtn[] = $holidayInfo;
        }

        return $rtn;
    }
}