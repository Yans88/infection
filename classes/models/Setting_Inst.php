<?php


class Setting_Inst
{

    /**
     * Prefecture Id
     *
     * @var int
     */
    public $pref;

    /**
     * School Code
     *
     * @var string
     */
    public $school_code;

    /**
     * City
     *
     * @var int
     */
    public $city;

    /**
     * Facility Information
     *
     * @var string
     */
    public $division;

    /**
     * Junior high school district
     *
     * @var string
     */
    public $school_area;

    /**
     * Facility Name
     *
     * @var string
     */
    public $facility_name;

    /**
     * Input Person
     *
     * @var string
     */
    public $person_in_charge;

    /**
     * Phone no
     *
     * @var string
     */
    public $tel;

    /**
     * Fax
     *
     * @var string
     */
    public $fax;

    /**
     * Facility Address
     *
     * @var string
     */
    public $address;

    /**
     * Contact E-mail Address
     *
     * @var string
     */
    public $mail;

    /**
     * Princial's Name
     *
     * @var string
     */
    public $director;

    /**
     * Email address of related person
     *
     * @var string
     */
    public $doctor_mail_1;

    /**
     * Email address of related person
     *
     * @var string
     */
    public $doctor_mail_2;

    /**
     * Email address of related person
     *
     * @var string
     */
    public $doctor_mail_3;

    /**
     * School Closure Flag
     *
     * @var int
     */
    public $lost_flg;

    /**
     * Jurisdiction classification
     *
     * @var int
     */
    public $kbn;

    public function __construct()
    {
        $this->pref = 0;
        $this->school_code = '';
        $this->city = '';
        $this->division = '';
        $this->school_area = '';
        $this->facility_name = '';
        $this->person_in_charge = '';
        $this->tel = '';
        $this->fax = '';
        $this->address = '';
        $this->mail = '';
        $this->director = '';
        $this->doctor_mail_1 = '';
        $this->doctor_mail_2 = '';
        $this->doctor_mail_3 = '';
        $this->lost_flg = '';
        $this->kbn = 0;
    }

    public function setPref($pref)
    {
        $this->pref = $pref;
    }

    public function getPref()
    {
        return $this->pref;
    }

    public function setSchoolCode($school_code)
    {
        $this->school_code = $school_code;
    }

    public function getSchoolCode()
    {
        return $this->school_code;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setDivision($division)
    {
        $this->division = $division;
    }

    public function getDivision()
    {
        return $this->division;
    }

    public function setSchoolArea($school_area)
    {
        $this->school_area = $school_area;
    }

    public function getSchoolArea()
    {
        return $this->school_area;
    }

    public function setFacilityName($facility_name)
    {
        $this->facility_name = $facility_name;
    }

    public function getFacilityName()
    {
        return $this->facility_name;
    }

    public function setPersonInCharge($person_in_charge)
    {
        $this->person_in_charge = $person_in_charge;
    }

    public function getPersonInCharge()
    {
        return $this->person_in_charge;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    public function getFax()
    {
        return $this->fax;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setDirector($director)
    {
        $this->director = $director;
    }

    public function getDirector()
    {
        return $this->director;
    }

    public function setDoctorMail1($doctor_mail_1)
    {
        $this->director_mail_1 = $doctor_mail_1;
    }

    public function getDoctorMail1()
    {
        return $this->doctor_mail_1;
    }

    public function setDoctorMail2($doctor_mail_2)
    {
        $this->director_mail_2 = $doctor_mail_2;
    }

    public function getDoctorMail2()
    {
        return $this->doctor_mail_2;
    }

    public function setDoctorMail3($doctor_mail_3)
    {
        $this->director_mail_3 = $doctor_mail_3;
    }

    public function getDoctorMail3()
    {
        return $this->doctor_mail_3;
    }

    public function setLostFlag($lost_flg)
    {
        $this->lost_flg = $lost_flg;
    }

    public function getLostFlag()
    {
        return $this->lost_flg;
    }

    public function setKbn($kbn)
    {
        $this->kbn = $kbn;
    }

    public function getKbn()
    {
        return $this->kbn;
    }
}