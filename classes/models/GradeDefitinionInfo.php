<?php

/**
 * 休業情報
 * Grade Definition Info
 */
class GradeDefinitionInfo
{

    /**
     * Grade
     * @var $school_code
     */
    public $school_code;

    /**
     * Grade
     * @var $grade
     */
    public $grade;

    /**
     * Hr_class
     * @var $hr_class
     */
    public $hr_class;

    /**
     * Diseasecd
     * @var $diseasecd
     */
    public $diseasecd;

    /**
     * Patient_no
     * @var $patient_no
     */
    public $patient_no;

    /**
     * Absence_no
     * @var $absence_no
     */
    public $absence_no;

    /**
     * Period_start
     * @var $period_start
     */
    public $period_start;

    /**
     * Period_end
     * @var $period_end
     */
    public $period_end;

    /**
     * D_AD4.symptom01
     * @var $symptom_flag1
     */
    public $symptom_flag1;

    /**
     * Symptom_temp
     * @var $symptom_temp
     */
    public $symptom_temp;

    /**
     * D_AD4.symptom02
     * @var $symptom_flag2
     */
    public $symptom_flag2;

    /**
     * D_AD4.symptom03
     * @var $symptom_flag3
     */
    public $symptom_flag3;

    /**
     * D_AD4.symptom04
     * @var $symptom_flag4
     */
    public $symptom_flag4;

    /**
     * D_AD4.symptom05
     * @var $symptom_flag5
     */
    public $symptom_flag5;

    /**
     * D_AD4.symptom06
     * @var $symptom_flag6
     */
    public $symptom_flag6;

    /**
     * D_AD4.symptom07
     * @var $symptom_flag7
     */
    public $symptom_flag7;

    /**
     * D_AD4.symptom08
     * @var $symptom_flag8
     */
    public $symptom_flag8;

    /**
     * D_AD4.symptom09
     * @var $symptom_flag9
     */
    public $symptom_flag9;

    /**
     * D_AD4.symptom10
     * @var $symptom_flag10
     */
    public $symptom_flag10;

    /**
     * D_AD4.symptom11
     * @var $symptom_flag11
     */
    public $symptom_flag11;

    /**
     * Symptom_etc
     * @var $symptom_etc
     */
    public $symptom_etc;

    /**
     * Note
     * @var $note
     */
    public $note;

    public function __construct()
    {
        $this->school_code = '';
        $this->grade = '';
        $this->hr_class = '';
        $this->diseasecd = '';
        $this->patient_no = '';
        $this->absence_no = '';
        $this->period_start = '';
        $this->period_end = '';
        $this->symptom_flag1 = '';
        $this->symptom_temp = '';
        $this->symptom_flag2 = '';
        $this->symptom_flag3 = '';
        $this->symptom_flag4 = '';
        $this->symptom_flag5 = '';
        $this->symptom_flag6 = '';
        $this->symptom_flag7 = '';
        $this->symptom_flag8 = '';
        $this->symptom_flag9 = '';
        $this->symptom_flag10 = '';
        $this->symptom_flag11 = '';
        $this->symptom_etc = '';
        $this->note = '';
    }

    /**
     * @param $school_code
     */
    public function setSchoolCode($school_code)
    {
        $this->school_code = $school_code;
    }

    /**
     * @return $this->school_code
     */
    public function getSchoolCode()
    {
        return $this->school_code;
    }

    /**
     * @param $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * @return $this->grade
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param $hr_class
     */
    public function setHrClass($hr_class)
    {
        $this->hr_class = $hr_class;
    }

    /**
     * @return $this->hr_class
     */
    public function getHrClass()
    {
        return $this->hr_class;
    }

    /**
     * @param $diseasecd
     */
    public function setDiseaseCd($diseasecd)
    {
        $this->diseasecd = $diseasecd;
    }

    /**
     * @return $this->diseasecd
     */
    public function getDiseaseCd()
    {
        return $this->diseasecd;
    }

    /**
     * @param $patient_no
     */
    public function setPatientNo($patient_no)
    {
        $this->patient_no = $patient_no;
    }

    /**
     * @return $this->patient_no
     */
    public function getPatientNo()
    {
        return $this->patient_no;
    }

    /**
     * @param $absence_no
     */
    public function setAbsenceNo($absence_no)
    {
        $this->absence_no = $absence_no;
    }

    /**
     * @return $this->absence_no
     */
    public function getAbsenceNo()
    {
        return $this->absence_no;
    }

    /**
     * @param $period_start
     */
    public function setPeriodStart($period_start)
    {
        $this->period_start = $period_start;
    }

    /**
     * @return $this->period_start
     */
    public function getPeriodStart()
    {
        return $this->period_start;
    }

    /**
     * @param $period_end
     */
    public function setPeriodEnd($period_end)
    {
        $this->period_end = $period_end;
    }

    /**
     * @return $this->period_end
     */
    public function getPeriodEnd()
    {
        return $this->period_end;
    }

    /**
     * @param $symptom_flag1
     */
    public function setSymptomFlag1($symptom_flag1)
    {
        $this->symptom_flag1 = $symptom_flag1;
    }

    /**
     * @return $this->symptom_flag1
     */
    public function getSymptomFlag1()
    {
        return $this->symptom_flag1;
    }

    /**
     * @param $symptom_temp
     */
    public function setSymptomTemp($symptom_temp)
    {
        $this->symptom_temp = $symptom_temp;
    }

    /**
     * @return $this->symptom_temp
     */
    public function getSymptomTemp()
    {
        return $this->symptom_temp;
    }

    /**
     * @param $symptom_flag2
     */
    public function setSymptomFlag2($symptom_flag2)
    {
        $this->symptom_flag2 = $symptom_flag2;
    }

    /**
     * @return $this->symptom_flag2
     */
    public function getSymptomFlag2()
    {
        return $this->symptom_flag2;
    }

    /**
     * @param $symptom_flag3
     */
    public function setSymptomFlag3($symptom_flag3)
    {
        $this->symptom_flag3 = $symptom_flag3;
    }

    /**
     * @return $this->symptom_flag3
     */
    public function getSymptomFlag3()
    {
        return $this->symptom_flag3;
    }

    /**
     * @param $symptom_flag4
     */
    public function setSymptomFlag4($symptom_flag4)
    {
        $this->symptom_flag4 = $symptom_flag4;
    }

    /**
     * @return $this->symptom_flag4
     */
    public function getSymptomFlag4()
    {
        return $this->symptom_flag4;
    }

    /**
     * @param $symptom_flag5
     */
    public function setSymptomFlag5($symptom_flag5)
    {
        $this->symptom_flag5 = $symptom_flag5;
    }

    /**
     * @return $this->symptom_flag5
     */
    public function getSymptomFlag5()
    {
        return $this->symptom_flag5;
    }

    /**
     * @param $symptom_flag6
     */
    public function setSymptomFlag6($symptom_flag6)
    {
        $this->symptom_flag6 = $symptom_flag6;
    }

    /**
     * @return $this->symptom_flag6
     */
    public function getSymptomFlag6()
    {
        return $this->symptom_flag6;
    }

    /**
     * @param $symptom_flag7
     */
    public function setSymptomFlag7($symptom_flag7)
    {
        $this->symptom_flag7 = $symptom_flag7;
    }

    /**
     * @return $this->symptom_flag7
     */
    public function getSymptomFlag7()
    {
        return $this->symptom_flag7;
    }

    /**
     * @param $symptom_flag8
     */
    public function setSymptomFlag8($symptom_flag8)
    {
        $this->symptom_flag8 = $symptom_flag8;
    }

    /**
     * @return $this->symptom_flag8
     */
    public function getSymptomFlag8()
    {
        return $this->symptom_flag8;
    }

    /**
     * @param $symptom_flag9
     */
    public function setSymptomFlag9($symptom_flag9)
    {
        $this->symptom_flag9 = $symptom_flag9;
    }

    /**
     * @return $this->symptom_flag9
     */
    public function getSymptomFlag9()
    {
        return $this->symptom_flag9;
    }

    /**
     * @param $symptom_flag10
     */
    public function setSymptomFlag10($symptom_flag10)
    {
        $this->symptom_flag10 = $symptom_flag10;
    }

    /**
     * @return $this->symptom_flag10
     */
    public function getSymptomFlag10()
    {
        return $this->symptom_flag10;
    }

    /**
     * @param $symptom_flag11
     */
    public function setSymptomFlag11($symptom_flag11)
    {
        $this->symptom_flag11 = $symptom_flag11;
    }

    /**
     * @return $this->symptom_flag11
     */
    public function getSymptomFlag11()
    {
        return $this->symptom_flag11;
    }

    /**
     * @param $symptom_etc
     */
    public function setSymptomEtc($symptom_etc)
    {
        $this->symptom_etc = $symptom_etc;
    }

    /**
     * @return $this->symptom_etc
     */
    public function getSymptomEtc()
    {
        return $this->symptom_etc;
    }

    /**
     * @param $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return $this->note
     */
    public function getNote()
    {
        return $this->note;
    }
}