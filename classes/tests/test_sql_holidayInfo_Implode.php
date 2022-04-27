<?php

function getSql($school_code)
{
    $sql  = "SELECT REGDH.YEAR, REGDH.GRADE, REGDH.HR_CLASS, REGDH.HR_NAME, DI.TOTALSUM06, DI.EDBOARD_SCHOOLCD as school_code ";
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

$school_code = array('E120220100025', 'E120220100028', 'E120220100026', 'E120220100027');
echo getSql($school_code);