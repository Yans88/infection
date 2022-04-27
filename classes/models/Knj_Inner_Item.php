<?php


class Knj_Inner_Item
{

    /**
     * ATTH.YEAR
     *
     * @var string
     */
    public $year;

    /**
     * GRD.SCHREGNO
     *
     * @var string
     */
    public $schregno;

    /**
     * REGD.GRADE
     *
     * @var string
     */
    public $grade;

    /**
     * REGD.HR_CLASS
     *
     * @var [type]
     */
    public $hr_class;

    /**
     * ATT.DI_REMARK_CD as symptom
     *
     * @var string
     */
    public $symptom;

    /**
     * ATT.DI_REMARK as symptom_temp
     *
     * @var string
     */
    public $symptom_temp;

    /**
     * ATT.INPUT_FLG
     *
     * @var string
     */
    public $input_flg;

    /**
     * ATTH.DI_REMARK_CD2 as symptom_etc
     *
     * @var string
     */
    public $symptom_etc;

    /**
     * GRD.ENT_DATE as ent_date
     *
     * @var string
     */
    public $ent_date;

    /**
     *  GRD.GRD_DIV
     *
     * @var string
     */
    public $grd_div;

    /**
     * GRD.GRD_DATE as exc_date
     *
     * @var string
     */
    public $exc_date;

    /**
     * ATTENDDATE
     *
     * @var [type]
     */
    public $attenddate;

    public function __construct()
    {
        $this->year = '';
        $this->schregno = '';
        $this->grade = '';
        $this->hr_class = '';
        $this->symptom = '';
        $this->symptom_temp = '';
        $this->input_flg = '';
        $this->symptom_etc = '';
        $this->ent_date = '';
        $this->grd_div = '';
        $this->exc_date = '';
        $this->attenddate = '';
    }

    public function setAttenddate($attenddate)
    {
        $this->attenddate = $attenddate;
    }

    public function getAttenddate()
    {
        return $this->attenddate;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setSchregno($schregno)
    {
        $this->schregno = $schregno;
    }

    public function getSchregno()
    {
        return $this->schregno;
    }

    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    public function getGrade()
    {
        return $this->grade;
    }

    public function setHrClass($hr_class)
    {
        $this->hr_class = $hr_class;
    }

    public function getHrClass()
    {
        return $this->hr_class;
    }

    public function setSymptom($symptom)
    {
        $this->symptom = $symptom;
    }

    public function getSymptom()
    {
        return $this->symptom;
    }

    public function setSymptomTemp($symptom_temp)
    {
        $this->symptom_temp = $symptom_temp;
    }

    public function getSymptomTemp()
    {
        return $this->symptom_temp;
    }

    public function setInputFLG($input_flg)
    {
        $this->input_flg = $input_flg;
    }

    public function getInputFLG()
    {
        return $this->input_flg;
    }

    public function setSymptomEtc($symptom_etc)
    {
        $this->symptom_etc = $symptom_etc;
    }

    public function getSymptomEtc()
    {
        return $this->symptom_etc;
    }

    public function setEntDate($ent_date)
    {
        $this->ent_date = $ent_date;
    }

    public function getEntDate()
    {
        return $this->ent_date;
    }

    public function setGrdDiv($grd_div)
    {
        $this->grd_div = $grd_div;
    }

    public function getGrdDiv()
    {
        return $this->grd_div;
    }

    public function setExcDate($exc_date)
    {
        $this->exc_date = $exc_date;
    }

    public function getExcDate()
    {
        return $this->exc_date;
    }
}