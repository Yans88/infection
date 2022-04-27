<?php
require_once('Absence.php');
require_once('CloseData.php');
require_once('DisorderDitale.php');
require_once('Inst.php');
require_once('models/SaveData.php');
require_once('models/InnerData.php');
require_once('ClassDef.php');
/**
 * 学級集計
 * Total Grade
 */
class ClassTotal
{
  protected $currentDate;

  public function __construct($currentdatetime)
  {
    $this->currentDate = substr($currentdatetime,0,4) .'/'.  substr($currentdatetime,4,2) .'/'.  substr($currentdatetime,6,2);
  }

  /**
   * Total Grade
   *
   * @param InnerData $innerData
   * @return SaveData
   */
  public function total(InnerData $innerData)
  {
    $close_data = isset($innerData->close_data) && !empty($innerData->close_data) ? $innerData->close_data : '';
    $absence = isset($innerData->absence) && !empty($innerData->absence) ? $innerData->absence : '';
    $disorder_ditale = isset($innerData->disorder_ditale) && !empty($innerData->disorder_ditale) ? $innerData->disorder_ditale : '';
    $class_def = isset($innerData->class_def) && !empty($innerData->class_def) ? $innerData->class_def : '';
    $inst = isset($innerData->inst) && !empty($innerData->inst) ? $innerData->inst : '';

    $resultCloseData = [];
    $resultAbsence = [];
    $resultDisorderDetail = [];
    $resultDisorderHead = [];
    $resultClassDeff = [];
    $resultInst = [];

    if (!empty($absence) && !empty($close_data)) $results = $this->setDataAbsence($close_data, $absence);

    if (!empty($close_data)) {
      $closedata = new CloseData();
      $closedata->createOutputCsv($innerData);
      $resultCloseData = $closedata->csv_json->close_data;
    }

    if (!empty($absence)) {
      $innerAbsence = new Absence();
      $innerAbsence->createOutputCsv($innerData);
      $resultAbsence = $innerAbsence->csv_json->absence;
    }
    if (!empty($disorder_ditale)) {
      $disorderDitale = new DisorderDitale();
      $disorderDitale->createOutputCsv($innerData);
      $resultDisorderHead = $disorderDitale->csv_json->disorder_head;
      $resultDisorderDetail = $disorderDitale->csv_json->disorder_ditale;
    }
    if (!empty($class_def)) {
      $classDef = new ClassDef();
      $classDef->createOutputCsv($innerData);
      $resultClassDeff = $classDef->csv_json->class_def;
    }
    if (!empty($inst)) {
      $newInst = new Inst();
      $newInst->createOutputCsv($innerData);
      $resultInst = $newInst->csv_json->inst;
    }
    return new SaveData($resultAbsence, $resultClassDeff, $resultDisorderHead, $resultDisorderDetail, $resultCloseData, $resultInst);
  }

  function setDataAbsence($close_data, $absence)
  {
    $currentDate = $this->currentDate;
    $resultAbsence = [];
    $absence_num = array();
    if (!empty($close_data)) {
      foreach ($close_data as $key => $cd) {
        $dateCloseData = !empty($cd->getPeriodStart()) ? date('Y/m/d', strtotime($cd->getPeriodStart())) : '';
        if ($dateCloseData == $currentDate) {
          $close_division = (int)$cd->getCloseDivision();
          $pref = $cd->getPref();
          $school_code = $cd->getSchoolCode();
          $grade = $cd->getGrade();
          $class_id = $cd->getClassId();
          $absenceNum = (int)$cd->getAbsenceNum();
          switch ($close_division) {
            case 1:
              $absence_num[$pref][$school_code] = $absenceNum;
              break;
            case 2:
              $absence_num[$pref][$school_code][$grade] = $absenceNum;
              break;
            case 3:
              $absence_num[$pref][$school_code][$grade][$class_id] = $absenceNum;
              break;
            default:
              throw new Exception('Invalid close_division');
              break;
          }
        }
      }
    }

    if (!empty($absence)) {
      foreach ($absence as $key => $abs) {

        $pref = $abs->getPref();
        $school_code = $abs->getSchoolCode();
        $grade = $abs->getGrade();
        $class_id = $abs->getClassId();

        $absenceNum = isset($absence_num[$pref][$school_code][$grade][$class_id]) ? $absence_num[$pref][$school_code][$grade][$class_id] : '';
        if (empty($absenceNum)) $absenceNum = isset($absence_num[$pref][$school_code][$grade]) ? $absence_num[$pref][$school_code][$grade] : '';
        if (empty($absenceNum)) $absenceNum = isset($absence_num[$pref][$school_code]) ? $absence_num[$pref][$school_code] : '';
        $absemNumb = !empty($absenceNum) && (int)$absenceNum > 0 ? $absenceNum : $abs->getAbsenceNum();

        $record_abs = new InnerData_Absence();
        $record_abs->setDataKbn($abs->getDataKbn());
        $record_abs->setPref($abs->getPref());
        $record_abs->setSchoolCode($abs->getSchoolCode());
        $record_abs->setGrade($abs->getGrade());
        $record_abs->setClassId($abs->getClassId());
        $record_abs->setSymptom($abs->getSymptom());
        $record_abs->setReportDate($abs->getReportDate());
        $record_abs->setAbsenceNum($absemNumb);
        $resultAbsence[] = $record_abs;
      }
    }
    return $resultAbsence;
  }
}