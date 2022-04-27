<?php

/**
 * 休業情報
 * Holiday Information
 */
class HolidayInfo
{
    /**
     * Year
     * @var $school_code
     */
    public $school_code;

    /**
     * Year
     * @var $year
     */
    public $year;

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
     * Hr_name
     * @var $hr_name
     */
    public $hr_name;

    /**
     * Total Sum
     * @var int $total_sum
     */
    public $total_sum;

    public function __construct()
    {
        $this->school_code = '';
        $this->year = '';
        $this->grade = '';
        $this->hr_class = '';
        $this->hr_name = '';
        $this->total_sum = 0;
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
     * @param $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return $this->year
     */
    public function getYear()
    {
        return $this->year;
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
     * @param $hr_name
     */
    public function setHrName($hr_name)
    {
        $this->hr_name = $hr_name;
    }

    /**
     * @return $this->hr_name
     */
    public function getHrName()
    {
        return $this->hr_name;
    }

    /**
     * @param int $total_sum
     */
    public function setTotalSum($total_sum)
    {
        $this->total_sum = $total_sum;
    }

    /**
     * @return int $this->total_sum
     */
    public function getTotalSum()
    {
        return $this->total_sum;
    }
}