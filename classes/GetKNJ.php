<?php
require_once('models/knjData.php');
require_once('classes/LoadInst.php');
require_once('classes/ConvertHolidayInfo.php');
require_once('classes/GenerateGradeDefinitionInfo.php');
require_once('classes/AttendanceSuspendInfo.php');
require_once('classes/InnerItem.php');

/**
 * データ取得
 * Get Data
 */
class GetKNJ
{
    /**
     * Db Connection
     * @var object $conn
     */
    public $conn;

    public function __construct(array $config)
    {

        $_ = function($s){return $s;};
        $dsn = "ibm:DRIVER={IBM DB2 ODBC DRIVER};DATABASE={$_($this->db_name)};" . "HOSTNAME={$_($this->db_host)};PORT={$_($this->db_port)};PROTOCOL=TCPIP;UID={$_($this->username)};PWD={$_($this->password)}";
        $this->conn = odbc_connect($config['Database'], $config['User'], $config['Password']);

        if($this->conn == false){
            throw new Exception('Err Database Connect');
        }
    }

    /**
     * Disconnect Database Connection
     */

    public function disconnect(){
        odbc_close($this->conn);
    }

    /**
     * Undocumented function
     * Get data from the "KNJ"
     * @return KnjData
     */

     public function readKNJdb() 
     {
         // ToDo : Open Database Connectiion
         $conn = $this->conn;

        // Get Inst
        $loadInst = new LoadInst();
        $insts = $loadInst->loadData();

        $schoo_list = [];

        foreach ($insts as $inst) {
            $schoo_list[] = $inst->school_code;
        }

        // Get Class
        $convertHolidayIndo = new ConvertHolidayInfo($conn);
        $classes = $convertHolidayIndo->readHolidayInfo($schoo_list);

        // Get Close
        $generateGradeDefinitionInfo = new GenerateGradeDefinitionInfo($conn);
        $closes = $generateGradeDefinitionInfo->readGradeDefinitionInfo($schoo_list);

        // Get Disorder
        $attendanceSuspendInfo = new AttendanceSuspendInfo($conn);
        $disorders = $attendanceSuspendInfo->getDisorderInfo($schoo_list);

        // Get InnerItem
        $innerItem = new InnerItem($conn);
        $innerItems = $innerItem->loadDataInnerItem();

        return new KnjData($classes, $closes, $disorders, $innerItems, $insts);
    }
}