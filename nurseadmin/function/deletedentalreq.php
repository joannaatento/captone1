<?php
    session_start();
    include '../../db.php';


    if(isset($_GET['dental_id'])){
	
        $dental_id = $_GET['dental_id'];
    
        $query = "DELETE FROM dental WHERE dental_id = '$dental_id' ";
    
        if($conn->query($query) === TRUE){
    
            header('Location: ../dentalrequests.php?msg=Successfully Deleted!');
            
        }else{
            
            // echo"Error!!!";
            echo '<script>window.alert("ERROR!")</script>';
        }
        
    }

    ?>