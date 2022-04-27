<?php
require_once('AbstractCreateOutput.php');
/**
 * 出席停止届け情報(明細)生成部
 * Attendance sus. Info (details)
 */
class DisorderDitale extends AbstractCreateOutput
{
  public function createOutputCsv(InnerData $inner_data)
  {
    $ditale_arr = array();
    $head_arr = array();

    if (!empty($inner_data->disorder_ditale)) {
      $report_no = 1;

      foreach ($inner_data->disorder_ditale as $ditale_item) {
        if ($ditale_item->disorder_num !== 0) {
          if (empty($ditale_arr)) {
            // Set SaveData_DisorderDitale from inner_data,And Add to $ditale_arr
            // SaveData_DisorderDitale->report_no = $report_no
            // inncrement $report_no


            $save_data = new SaveData_DisorderDitale();
            $save_data->setDataKbn($ditale_item->getDataKbn());
            $save_data->setReportNo($report_no);
            $save_data->setSchoolCode($ditale_item->getSchoolCode());
            $save_data->setGrade($ditale_item->getGrade());
            $save_data->setClassId($ditale_item->getClassId());
            $save_data->setDisorderNum($ditale_item->getDisorderNum());
            $report_no++;
            $ditale_arr[] = $save_data;
          } else {
            $is_exist = false;
            $disorder_num = 0;

            foreach ($ditale_arr as $key => $arr_item) {
              // if Same school_code,grade,class_id 
              //  Set $disorder_num += $ditale_item->disorder_num
              //  $is_exist = true,break
              $grade = $arr_item->getGrade();
              $school_code = $arr_item->getSchoolCode();
              $class_id = $arr_item->getClassId();
              if ($grade == $ditale_item->getGrade() && $school_code == $ditale_item->getSchoolCode() && $class_id == $ditale_item->getClassId()) {
                $is_exist = true;
                $disorder_num = $arr_item->getDisorderNum();
                $disorder_num = $ditale_item->getDisorderNum() + $disorder_num;
                $arr_item->setDisorderNum($disorder_num);
                break;
              }
            }

            if (!$is_exist) {
              // Set SaveData_DisorderDitale from inner_data,And Add to $ditale_arr
              // SaveData_DisorderDitale->report_no = $report_no
              // inncrement $report_no
              $save_data = new SaveData_DisorderDitale();
              $save_data->setDataKbn($ditale_item->getDataKbn());
              $save_data->setReportNo($report_no);
              $save_data->setSchoolCode($ditale_item->getSchoolCode());
              $save_data->setGrade($ditale_item->getGrade());
              $save_data->setClassId($ditale_item->getClassId());
              $save_data->setDisorderNum($ditale_item->getDisorderNum());
              $report_no++;
              $ditale_arr[] = $save_data;
            }
          }
        }
      }
    }


    if (!empty($inner_data->disorder_head)) {
      foreach ($inner_data->disorder_head as $head_item) {
        if ($head_item->getReason() !== 0) {
          $save_head = new SaveData_DisorderHead();
          $reason_etc = '';
          if ($head_item->getReason() !== 1999) {
            // Set reason_etc from inner_data to save_data  
            $reason_etc = $head_item->getReasonEtc();
          }

          // Set SaveData_DisorderHead from inner_data,And Add to $head_arr
          // report_no with the same school_code, grade, class_id data from $ head_arr          
          if (empty($head_arr)) {
            $save_head->setDataKbn($head_item->getDataKbn());
            $save_head->setPref($head_item->getPref());
            $save_head->setReportNo($head_item->getReportNo());
            $save_head->setSchoolCode($head_item->getSchoolCode());
            $save_head->setReportDate($head_item->getReportDate());
            $save_head->setReason($head_item->getReason());
            $save_head->setReasonEtc($reason_etc);
            $save_head->setTerm($head_item->getTerm());
            $save_head->setOrderDate($head_item->getOrderDate());
            $save_head->setEndDate($head_item->getEndDate());
            $save_head->setDoctorsOpinion($head_item->getDoctorsOpinion());
            $save_head->setMeasures($head_item->getMeasures());
            $save_head->setComment($head_item->getComment());
            $head_arr[] = $save_head;
          } else {
            $is_exist_head = false;

            foreach ($head_arr as $key => $arr_head) {
              // report_no with the same school_code $ head_arr             
              $school_code = $arr_head->getSchoolCode();
              if ($school_code == $head_item->getSchoolCode()) {
                $is_exist_head = true;
                $save_head->setReportNo($arr_head->getReportNo());
                break;
              }
            }
            if (!$is_exist_head) {
              $save_head->setDataKbn($head_item->getDataKbn());
              $save_head->setPref($head_item->getPref());
              $save_head->setReportNo($head_item->getReportNo());
              $save_head->setSchoolCode($head_item->getSchoolCode());
              $save_head->setReportDate($head_item->getReportDate());
              $save_head->setReason($head_item->getReason());
              $save_head->setReasonEtc($reason_etc);
              $save_head->setTerm($head_item->getTerm());
              $save_head->setOrderDate($head_item->getOrderDate());
              $save_head->setEndDate($head_item->getEndDate());
              $save_head->setDoctorsOpinion($head_item->getDoctorsOpinion());
              $save_head->setMeasures($head_item->getMeasures());
              $save_head->setComment($head_item->getComment());
              $head_arr[] = $save_head;
            }
          }
        }
      }
    }
    $this->csv_json = new SaveData([], [], $head_arr, $ditale_arr, [], []);
  }
}