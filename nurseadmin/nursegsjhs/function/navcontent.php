<?php

$items = array(
    "Report Generation" => array('#', 'menu-icon-09', 
        [
            "Total Medical Appointments Report" => "totalappointments.php",
            "Total Dental Appointments Report" => "totaldentalappointments.php",
            "Total Physician Consultation Appointments Report" => "totalphysicianappointments.php",
            "Total Clinic Visitor Report" => "totalvisitors.php",
            "Total Medicine Consumed Report" => "totalmedicines.php",
    ]),
    "Health Profiles" => array('#', 'menu-icon-08', 
        [
            "Grade School and Junior High School Department" => "gsjhslists.php",
            "Senior High School Department" => "shslist.php",
            "College Department" => "collegelists.php",
    ]),
    "Appointments" => array('medicalgsjhs.php', 'menu-icon-12', ),
    "Patient's Management <br> Record" => array('patientmanagementrecordgsjhs.php', 'menu-icon-13', ),
    "School Health Assessment <br> Form" => array('schoolhealthassessmentformgsjhs.php', 'menu-icon-10', ),
    "Printable Papers" => array('#', 'menu-icon-15', 
        [
            "Health Profile" => "healthprofilegsjhs.php",
        ])
);
    
$link_redirects= array(
    "gsjhslists.php" => array("editrecordgsjhslist.php","viewgsjhsrecord.php"),
    "shslist.php" => array("editrecordshslist.php", "viewshsrecord.php"),
    "collegelists.php" => array("viewcollegerecord.php"),
    "medicalgsjhs.php" => array('editmedicals.php'),
    "patientmanagementrecordgsjhs.php" => array('editpatientrecord.php'),
    "schoolhealthassessmentformgsjhs.php" => array('editschoolasses.php')
);