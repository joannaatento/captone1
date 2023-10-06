<?php

$items = array(
    "Health Profile" => array('healthrecordformgsjhs.php', 'menu-icon-13'),
    "Appointment" => array('#', 'menu-icon-04', 
        [
            "Request Dental Scheduling" => "adddentalmessagegsjhs.php",
            "Request Medical Scheduling" => "addmedicalmessagegsjhs.php",
            "Request Physician Consultation Scheduling" => "addphysicianmessagegsjhs.php",
        ]),
    "Clinic Records" => array('#', 'menu-icon-15', 
        [
            "Health Profile Record" => "viewhealthrecordprofile.php",
            "Dental Record" => "viewdentalappgsjhs.php",
            "Medical Record" => "viewmedicalappgsjhs.php",
            "Physician Consultation Record" => "viewphysicianappgsjhs.php",
            "Patient Management Record" => "viewdiagnosisgsjhs.php",
            "School Health Assessment Record" => "viewschoolassesgsjhs.php",
            "Physical Examination Record" => "viewphysicalexaminationrecordgsjhs.php",
            "Physician's Order Sheet and Progress Notes Records" => "viewphysicianorderandprogressnotesgsjhs.php",
        ])
);
