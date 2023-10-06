<?php

$items = array(
    "Report Generation" => array('#', 'menu-icon-04', 
        [
            "Total Medical Appointment Report" => "totalappointments.php",
            "Total Dental Appointment Report" => "totaldentalappointments.php",
            "Total Physician Consultation Appointment Report" => "totalphysicianappointments.php",
            "Total Clinic Visitor Report" => "totalvisitors.php",
            "Total Medicine Consumed Report" => "totalmedicines.php",
    ]),
    "Health Profiles" => array('#', 'menu-icon-04', 
        [
            "Grade School and Junior High School Department" => "gsjhslists.php",
            "Senior High School Department" => "shslist.php",
            "College Department" => "collegelists.php",
    ]),
    "Appointments" => array('medicalcollege.php', 'menu-icon-04',),
    "Consultation Form" => array('consultationformcollege.php', 'menu-icon-04', ),
    "School Health Assessment <br> Form" => array('schoolhealthassessmentformcollege.php', 'menu-icon-15', ),
    "Printable Papers" => array('#', 'menu-icon-15', 
        [
            "Health Profile" => "healthprofilecollege.php",
        ])
);

$link_redirects= array(
    "gsjhslists.php" => array("editrecordgsjhslist.php","viewgsjhsrecord.php"),
    "shslist.php" => array("editrecordshslist.php", "viewshsrecord.php"),
    "collegelists.php" => array("editcollege.php","viewcollegerecord.php"),
    "medicalcollege.php" => array('editmedicals.php'),
    "consultationformcollege.php" => array('editconsultation.php'),
    "schoolhealthassessmentformcollege.php" => array('editschoolassess.php')


);