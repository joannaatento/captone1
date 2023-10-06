<?php

$items = array(
    "Total Physician Consultation <br> Appointment Report" => array('physiciangsjhsshs.php', 'menu-icon-04', 
        [
    ]),
    "Appointments" => array('physicianapproved.php', 'menu-icon-04', ),
    "Physical Examinations" => array('#', 'menu-icon-15', 
        [
            "Grade School and Junior High School Department" => "physicalexaminationgsjhs.php",
            "Senior High School Department" => "physicalexaminationshs.php",
        ]),
    "Order & Progress Notes" => array('#', 'menu-icon-15', 
        [
            "Grade School and Junior High School Department" => "physicianorderandprogressgsjhs.php",
            "Senior High School Department" => "physicianorderandprogressshs.php",
        ]),
);
    
$link_redirects = [
    "physicianapproved.php" => ["editphysician.php"],
    "physicalexaminationgsjhs.php" => ["editphysicalexamgsjhs.php"],
    "physicalexaminationshs.php" => ["editphysicalexamshs.php"],
    "physicianorderandprogressgsjhs.php" => ["editphysicianordergsjhs.php"],
    "physicianorderandprogressshs.php" => ["editphysicianordershs.php"]
];