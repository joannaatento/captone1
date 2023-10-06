<?php

$items = array(
    // template 
    // "category" => array('#', 'menu-icon-09', 
    //     [
    //         "subcategory1" => "totalappointments.php",
    //         "subcategory2" => "totaldentalappointments.php",
    //         "subcategory3" => "totalphysicianappointments.php",
    // ]),
    // if wala sya category
    // "category" => array('redirect.php', 'menu-icon-09',),

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
    "Appointments" => array('medicalshs.php', 'menu-icon-012', ),
    "Consultation Form" => array('consultationformshs.php', 'menu-icon-04', ),
    "School Health Assessment" => array('schoolhealthassessmentformshs.php', 'menu-icon-10', ),
    "Monitoring Sheet" => array('#', 'menu-icon-15', 
        [
            "Weight Monitoring Sheet" => "weightmonitoringshs.php",
            "Vital Signs Monitoring Sheet" => "vitalsignsmonitoringshs.php",
        ]),
    "Nurse's Notes" => array('nursenotesshs.php', 'menu-icon-15', ),
    "Printable Papers" => array('#', 'menu-icon-15', 
        [
            "Health Profile" => "healthprofileshs.php",
            "Health Declaration" => "healthdeclarationshs.php",
            "Medical Certificate" => "medicalcertificateshs.php",
        ]),
);


$link_redirects= array(
    "gsjhslists.php" => array("viewgsjhsrecord.php"),
    "shslist.php" => array("editrecordshslist.php", "viewshsrecord.php"),
    "collegelists.php" => array("viewcollegerecord.php"),
    "medicalshs.php" => array('editmedicals.php'),
    "consultationformshs.php" => array('editconsultation.php'),
    "schoolhealthassessmentformshs.php" => array('editschoolasses.php'),
    "weightmonitoringshs.php" => array('editweightmonitoring.php'),
    "vitalsignsmonitoringshs.php" => array('editvitalsigns.php'),
    "nursenotesshs.php" => array('editnursenotes.php')
);