<?php
    session_start();
    include '../../../db.php';

    if(isset($_POST['submit_data'])){ // pag get ng data 
        $user_id = $_POST['user_id'];
        $image = $_FILES['image']['name'];
        $idnumber = trim(mysqli_real_escape_string($conn, $_POST['idnumber']));
        $fullname = trim(mysqli_real_escape_string($conn, $_POST['fullname']));
        $gender = isset($_POST['gender']) ? trim(mysqli_real_escape_string($conn, $_POST['gender'])) : "";
        $address = trim(mysqli_real_escape_string($conn, $_POST['address']));
        $pcontact = trim(mysqli_real_escape_string($conn, $_POST['pcontact']));
        $nationality = isset($_POST['nationality']) ? trim(mysqli_real_escape_string($conn, $_POST['nationality'])) : "";
        $otherNationality = trim(mysqli_real_escape_string($conn, $_POST['otherNationality']));
        $birthday = trim(mysqli_real_escape_string($conn, $_POST['birthday']));
        $religion = isset($_POST['religion']) ? trim(mysqli_real_escape_string($conn, $_POST['religion'])) : "";
        $otherReligion = trim(mysqli_real_escape_string($conn, $_POST['otherReligion']));
        $fguardian = trim(mysqli_real_escape_string($conn, $_POST['fguardian']));
        $occupation1 = trim(mysqli_real_escape_string($conn, $_POST['occupation1']));
        $mother = trim(mysqli_real_escape_string($conn, $_POST['mother']));
        $occupation2 = trim(mysqli_real_escape_string($conn, $_POST['occupation2']));
        $contactemer = trim(mysqli_real_escape_string($conn, $_POST['contactemer']));
        $contactno = trim(mysqli_real_escape_string($conn, $_POST['contactno']));
        $relation = trim(mysqli_real_escape_string($conn, $_POST['relation']));
        $referral = trim(mysqli_real_escape_string($conn, $_POST['referral']));
        $contactno2 = trim(mysqli_real_escape_string($conn, $_POST['contactno2']));
        $physiciannumcall = trim(mysqli_real_escape_string($conn, $_POST['physiciannumcall']));
        $addresshospital = trim(mysqli_real_escape_string($conn, $_POST['addresshospital']));
        $td = trim(mysqli_real_escape_string($conn, $_POST['td']));
        $mmr = trim(mysqli_real_escape_string($conn, $_POST['mmr']));
        $hepab = trim(mysqli_real_escape_string($conn, $_POST['hepab']));
        $varicella = trim(mysqli_real_escape_string($conn, $_POST['varicella']));
        $asthma_history = isset($_POST['asthma_history']) ? trim(mysqli_real_escape_string($conn, $_POST['asthma_history'])) : "";
        $asthma_relation = isset($_POST['asthma_relation']) ? trim(mysqli_real_escape_string($conn, $_POST['asthma_relation'])) : "";
        $bleedingtendency_history = isset($_POST['bleedingtendency_history']) ? trim(mysqli_real_escape_string($conn, $_POST['bleedingtendency_history'])) : "";
        $bleedingtendency_relation = isset($_POST['bleedingtendency_relation']) ? trim(mysqli_real_escape_string($conn, $_POST['bleedingtendency_relation'])) : "";
        $cancer_history = isset($_POST['cancer_history']) ? trim(mysqli_real_escape_string($conn, $_POST['cancer_history'])) : "";
        $cancer_relation = isset($_POST['cancer_relation']) ? trim(mysqli_real_escape_string($conn, $_POST['cancer_relation'])) : "";
        $diabetes_history = isset($_POST['diabetes_history']) ? trim(mysqli_real_escape_string($conn, $_POST['diabetes_history'])) : "";
        $diabetes_relation = isset($_POST['diabetes_relation']) ? trim(mysqli_real_escape_string($conn, $_POST['diabetes_relation'])) : "";
        $heartdisorder_history = isset($_POST['heartdisorder_history']) ? trim(mysqli_real_escape_string($conn, $_POST['heartdisorder_history'])) : "";
        $heartdisorder_relation = isset($_POST['heartdisorder_relation']) ? trim(mysqli_real_escape_string($conn, $_POST['heartdisorder_relation'])) : "";
        $highblood_history = isset($_POST['highblood_history']) ? trim(mysqli_real_escape_string($conn, $_POST['highblood_history'])) : "";
        $highblood_relation = isset($_POST['highblood_relation']) ? trim(mysqli_real_escape_string($conn, $_POST['highblood_relation'])) : "";
        $kidneyproblem_history = isset($_POST['kidneyproblem_history']) ? trim(mysqli_real_escape_string($conn, $_POST['kidneyproblem_history'])) : "";
        $kidneyproblem_relation = isset($_POST['kidneyproblem_relation']) ? trim(mysqli_real_escape_string($conn, $_POST['kidneyproblem_relation'])) : "";
        $mentaldisorder_history = isset($_POST['mentaldisorder_history']) ? trim(mysqli_real_escape_string($conn, $_POST['mentaldisorder_history'])) : "";
        $mentaldisorder_relation = isset($_POST['mentaldisorder_relation']) ? trim(mysqli_real_escape_string($conn, $_POST['mentaldisorder_relation'])) : "";
        $obesity_history = isset($_POST['obesity_history']) ? trim(mysqli_real_escape_string($conn, $_POST['obesity_history'])) : "";
        $obesity_relation = isset($_POST['obesity_relation']) ? trim(mysqli_real_escape_string($conn, $_POST['obesity_relation'])) : "";
        $seizuredisorder_history = isset($_POST['seizuredisorder_history']) ? trim(mysqli_real_escape_string($conn, $_POST['seizuredisorder_history'])) : "";
        $seizuredisorder_relation = isset($_POST['seizuredisorder_relation']) ? trim(mysqli_real_escape_string($conn, $_POST['seizuredisorder_relation'])) : "";
        $stroke_history = isset($_POST['stroke_history']) ? trim(mysqli_real_escape_string($conn, $_POST['stroke_history'])) : "";
        $stroke_relation = isset($_POST['stroke_relation']) ? trim(mysqli_real_escape_string($conn, $_POST['stroke_relation'])) : "";
        $tb_history = isset($_POST['tb_history']) ? trim(mysqli_real_escape_string($conn, $_POST['tb_history'])) : "";
        $tb_relation = isset($_POST['tb_relation']) ? trim(mysqli_real_escape_string($conn, $_POST['tb_relation'])) : "";
        $allergy = isset($_POST['allergy']) ? trim(mysqli_real_escape_string($conn, $_POST['allergy'])) : "";
        $anemia = isset($_POST['anemia']) ? trim(mysqli_real_escape_string($conn, $_POST['anemia'])) : "";
        $asthma = isset($_POST['asthma']) ? trim(mysqli_real_escape_string($conn, $_POST['asthma'])) : "";
        $behavioral = isset($_POST['behavioral']) ? trim(mysqli_real_escape_string($conn, $_POST['behavioral'])) : "";
        $bleedingprob = isset($_POST['bleedingprob']) ? trim(mysqli_real_escape_string($conn, $_POST['bleedingprob'])) : "";
        $blood = isset($_POST['blood']) ? trim(mysqli_real_escape_string($conn, $_POST['blood'])) : "";
        $chickenpox = isset($_POST['chickenpox']) ? trim(mysqli_real_escape_string($conn, $_POST['chickenpox'])) : "";
        $convulsion = isset($_POST['convulsion']) ? trim(mysqli_real_escape_string($conn, $_POST['convulsion'])) : "";
        $dengue = isset($_POST['dengue']) ? trim(mysqli_real_escape_string($conn, $_POST['dengue'])) : "";
        $diabetess = isset($_POST['diabetess']) ? trim(mysqli_real_escape_string($conn, $_POST['diabetess'])) : "";
        $earproblem = isset($_POST['earproblem']) ? trim(mysqli_real_escape_string($conn, $_POST['earproblem'])) : "";
        $eating_disorder = isset($_POST['eating_disorder']) ? trim(mysqli_real_escape_string($conn, $_POST['eating_disorder'])) : "";
        $epilepsy = isset($_POST['epilepsy']) ? trim(mysqli_real_escape_string($conn, $_POST['epilepsy'])) : "";
        $eyeproblemm = isset($_POST['eyeproblemm']) ? trim(mysqli_real_escape_string($conn, $_POST['eyeproblemm'])) : "";
        $fracture = isset($_POST['fracture']) ? trim(mysqli_real_escape_string($conn, $_POST['fracture'])) : "";
        $hearing_problem = isset($_POST['hearing_problem']) ? trim(mysqli_real_escape_string($conn, $_POST['hearing_problem'])) : "";
        $heart_disorder = isset($_POST['heart_disorder']) ? trim(mysqli_real_escape_string($conn, $_POST['heart_disorder'])) : "";
        $hyperacidity = isset($_POST['hyperacidity']) ? trim(mysqli_real_escape_string($conn, $_POST['hyperacidity'])) : "";
        $indigestion = isset($_POST['indigestion']) ? trim(mysqli_real_escape_string($conn, $_POST['indigestion'])) : "";
        $insomia = isset($_POST['insomia']) ? trim(mysqli_real_escape_string($conn, $_POST['insomia'])) : "";
        $kidney_problem = isset($_POST['kidney_problem']) ? trim(mysqli_real_escape_string($conn, $_POST['kidney_problem'])) : "";
        $liver_problem = isset($_POST['liver_problem']) ? trim(mysqli_real_escape_string($conn, $_POST['liver_problem'])) : "";
        $measless = isset($_POST['measless']) ? trim(mysqli_real_escape_string($conn, $_POST['measless'])) : "";
        $mumpss = isset($_POST['mumpss']) ? trim(mysqli_real_escape_string($conn, $_POST['mumpss'])) : "";
        $parasitism = isset($_POST['parasitism']) ? trim(mysqli_real_escape_string($conn, $_POST['parasitism'])) : "";
        $pneumonia = isset($_POST['pneumonia']) ? trim(mysqli_real_escape_string($conn, $_POST['pneumonia'])) : "";
        $primary_complex = isset($_POST['primary_complex']) ? trim(mysqli_real_escape_string($conn, $_POST['primary_complex'])) : "";
        $scoliosis = isset($_POST['scoliosis']) ? trim(mysqli_real_escape_string($conn, $_POST['scoliosis'])) : "";
        $skin_problem = isset($_POST['skin_problem']) ? trim(mysqli_real_escape_string($conn, $_POST['skin_problem'])) : "";
        $tonsillitis = isset($_POST['tonsillitis']) ? trim(mysqli_real_escape_string($conn, $_POST['tonsillitis'])) : "";
        $typhoid_fever = isset($_POST['typhoid_fever']) ? trim(mysqli_real_escape_string($conn, $_POST['typhoid_fever'])) : "";
        $vision_defect = isset($_POST['vision_defect']) ? trim(mysqli_real_escape_string($conn, $_POST['vision_defect'])) : "";
        $otherillness = trim(mysqli_real_escape_string($conn, $_POST['otherillness']));
        $hospitalization_history = isset($_POST['hospitalization_history']) ? trim(mysqli_real_escape_string($conn, $_POST['hospitalization_history'])) : "";
        $surgicaloperation_history = isset($_POST['surgicaloperation_history']) ? trim(mysqli_real_escape_string($conn, $_POST['surgicaloperation_history'])) : "";
        $specialmed = trim(mysqli_real_escape_string($conn, $_POST['specialmed']));
        $allergicdrugs = trim(mysqli_real_escape_string($conn, $_POST['allergicdrugs']));
        $otherrelevant = trim(mysqli_real_escape_string($conn, $_POST['otherrelevant']));

        $sql = "INSERT INTO healthrecordformcollege VALUES ('','$user_id','$image','$idnumber','$fullname','$gender','$address',
        '$pcontact','$nationality','$otherNationality','$birthday','$religion','$otherReligion','$fguardian','$occupation1','$mother','$occupation2','$contactemer','$contactno',
        '$relation','$referral','$contactno2','$physiciannumcall','$addresshospital','$td','$mmr','$hepab', '$varicella','$asthma_history',
        '$asthma_relation','$bleedingtendency_history','$bleedingtendency_relation','$cancer_history','$cancer_relation','$diabetes_history','$diabetes_relation','$heartdisorder_history',
        '$heartdisorder_relation','$highblood_history','$highblood_relation','$kidneyproblem_history','$kidneyproblem_relation','$mentaldisorder_history','$mentaldisorder_relation','$obesity_history','$obesity_relation',
        '$seizuredisorder_history','$seizuredisorder_relation','$stroke_history','$stroke_relation','$tb_history','$tb_relation','$allergy',
        '$anemia', '$asthma','$behavioral','$bleedingprob','$blood','$chickenpox','$convulsion','$dengue','$diabetess','$earproblem',
        '$eating_disorder','$epilepsy','$eyeproblemm','$fracture','$hearing_problem','$heart_disorder','$hyperacidity','$indigestion','$insomia',
        '$kidney_problem','$liver_problem','$measless','$mumpss','$parasitism','$pneumonia','$primary_complex','$scoliosis','$skin_problem','$tonsillitis',
        '$typhoid_fever','$vision_defect','$otherillness','$hospitalization_history','$surgicaloperation_history','$specialmed','$allergicdrugs','$otherrelevant')";
      
        
       if (mysqli_query($conn, $sql)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], "/xampp/htdocs/DivineClinic/upload_image/" . $_FILES["image"]["name"])) {
            header('location: ../healthrecordformcollege.php');
            $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Your health record has been submitted.</h2>
                </div>
            ";
        } else {
            // There was an error uploading the file
            echo "Error: " . $_FILES["image"]["error"];
        }
    }
}

  ?>

  