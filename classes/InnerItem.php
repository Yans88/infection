<?php
require_once('models/Knj_Inner_Item.php');
class InnerItem
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

    public function loadDataInnerItem()
    {
        $arr = [];
        $resultSet = array();
        $sql = "SELECT	
            ATTH.YEAR, GRD.SCHREGNO, REGD.GRADE,ATT.ATTENDDATE,	
            GRD.SCHREGNO as schregno, REGD.GRADE as grade, REGD.HR_CLASS,
            ATT.DI_REMARK_CD as symptom,	
            ATT.DI_REMARK as symptom_temp,	
            ATT.INPUT_FLG,  -- INPUT_FLGが 1 の時にsymptom_etcが書き込まれる	
            ATTH.DI_REMARK_CD2 as symptom_etc,	
            GRD.ENT_DATE as ent_date,	
            GRD.GRD_DIV, --除籍区分	
            GRD.GRD_DATE as exc_date	
            FROM	
            (select ATTENDDATE,DI_REMARK_CD,DI_REMARK,INPUT_FLG,YEAR,SEQNO,SCHREGNO FROM ATTEND_PETITION_DAT GROUP BY ATTENDDATE,DI_REMARK_CD,DI_REMARK,INPUT_FLG,YEAR,SEQNO,SCHREGNO) ATT	
                JOIN ATTEND_PETITION_HDAT ATTH	
                    ON  ATTH.YEAR = ATT.YEAR	
                    AND ATTH.SEQNO = ATT.SEQNO	
                    AND ATTH.SCHREGNO = ATT.SCHREGNO	
                JOIN SCHREG_ENT_GRD_HIST_DAT GRD	
                    ON GRD.SCHREGNO = ATT.SCHREGNO	
                JOIN SCHREG_REGD_DAT REGD	
                    ON REGD.SCHREGNO = ATT.SCHREGNO	;";
        $resultSet = odbc_exec($this->conn, $sql);        
        echo('ここから賢者のinneritemsーーーーー<br/>');

        $nolist = [];

        while ($row = odbc_fetch_array($resultSet)) {
            $model = new Knj_Inner_Item();
            $model->setYear($row['YEAR']);
            $model->setSchregno($row['SCHREGNO']);
            $model->setGrade($row['GRADE']);
            $model->setHrClass($row['HR_CLASS']);
            $model->setSymptom($row['SYMPTOM']);
            $model->setSymptomTemp($row['SYMPTOM_TEMP']);
            $model->setInputFLG($row['INPUT_FLG']);
            $model->setSymptomEtc($row['SYMPTOM_ETC']);
            $model->setEntDate($row['ENT_DATE']);
            $model->setGrdDiv($row['GRD_DIV']);
            $model->setExcDate($row['EXC_DATE']);
            $model->setAttenddate($row['ATTENDDATE']);

            $exits = false;
            foreach ($nolist as $no) {
                if($no === $row['YEAR'] . '-' . $row['SCHREGNO']. '-' .$row['ATTENDDATE']){
                    $exits = true;
                    break;
                }
            }

            if(!$exits){
                $arr[] = $model;
                $nolist[] = $row['YEAR'] . '-' . $row['SCHREGNO']. '-' .$row['ATTENDDATE'];
            }            
        }
        print_r($arr);
        return $arr;
    }
}