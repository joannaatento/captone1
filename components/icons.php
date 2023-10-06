<?php

if(basename($_SERVER['SCRIPT_FILENAME']) == 'icons.php'){
    ?>
    <script>
        history.go(-1);
    </script>
    <?php
    die();
}

$icons = [
    "report" => "menu-icon-15",
    "generation" => "menu-icon-09",
    "profile" => "menu-icon-08",
    "appointment" => "menu-icon-12",
    "record" => "menu-icon-13",
    "consultation" => "menu-icon-10",
    "print" => "printer",
    "monitor" => "menu-icon-07",
    "assessment" => "menu-icon-02",
    "note" => "menu-icon-15",
];