<?php
    session_start();
    include '../../db.php';

    if (!isset($_SESSION['user_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("../login.php");</script>';
        exit; // Exit the script to prevent further execution
    }

    $user_id = $_SESSION['user_id'];
    $sql_query = "SELECT * FROM users WHERE user_id ='$user_id'";
    $result = $conn->query($sql_query);
    while($row = $result->fetch_array()){
        $user_id = $row['user_id'];
        $fullname = $row['fullname'];
        require_once('../../db.php');
        if($_SESSION['leveleduc'] == 1){
            // User type 1 specific code here
        }
        else{
            header('location: ../login.php');
            exit; // Exit the script to prevent further execution
        }
    }
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Request Physician Consultation Schedule</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
    <link rel="stylesheet" href="assets/style.css">

     <!-- Add Bootstrap JavaScript and jQuery links -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head> 

<body class="app">   
<header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            <div class="app-utilities col-auto">		            
			            <div class="app-utility-item app-user-dropdown dropdown">

				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="assets/images/user.png"><?= $fullname;?></a>
				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="function/logout.php">Log Out</a></li>
							</ul>
			            </div>
		            </div>
		        </div>
	            </div>
	        </div>
        </div>
        <div id="app-sidepanel" class="app-sidepanel sidepanel-hidden"> 
			<div id="sidepanel-drop" class="sidepanel-drop"></div>
				<div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app_logo">
					<img style="width: 150px; display:flex; margin-left: 50px; margin-top: 10px;" src="assets/images/dwcl.png" alt="logo">
		        </div>
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				<ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				<ul class="app-menu list-unstyled accordion" id="menu-accordion">
        <li class="nav-item has-submenu">

        <a class="nav-link submenu-toggle" href="healthrecordformgsjhs.php" data-bs-target="#submenu-4" aria-controls="submenu-4">        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
           <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
                    <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
                </svg>
        </span>
        <span class="nav-link-text">Health Profile</span>
    </a>
</li>

<li id="scheduling-link" class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="#" data-toggle="collapse" data-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
				<span class="nav-icon">
					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-plus" viewBox="0 0 16 16">
					<path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
					<path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>
					</svg>
				</span>
				<span class="nav-link-text">Request Scheduling Appointment</span>
				    <span class="submenu-arrow">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
						</svg>
					</span>
			</a>
            <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
        <ul class="submenu-list list-unstyled">
            <li class="submenu-item"><a class="submenu-link" href="adddentalmessagegsjhs.php">Request Dental Scheduling</a></li>
            <li class="submenu-item"><a class="submenu-link" href="addmedicalmessagegsjhs.php">Request Medical Scheduling</a></li>
            <li class="submenu-item"><a class="submenu-link active" href="addphysicianmessagegsjhs.php">Request Physician Scheduling</a></li>
        </ul>
    </div>
</li>

<li id="clinical-link" class="nav-item has-submenu">
<a class="nav-link submenu-toggle" href="#" data-toggle="collapse" data-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
			<span class="nav-icon">
						<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stickies" viewBox="0 0 16 16">
			    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z"/>
				<path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z"/>
			    </svg>
			</span>
			
            <span class="nav-link-text">Clinic Records</span>
				<span class="submenu-arrow">
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
					</svg>
					</span>
		</a>
        <div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
				<ul class="submenu-list list-unstyled">
					<li class="submenu-item"> <a class="submenu-link" href="viewhealthrecordprofile.php">Health Profile Record</a>
					<li class="submenu-item"> <a class="submenu-link" href="viewdentalappgsjhs.php">Dental Record</a>
                    <li class="submenu-item"> <a class="submenu-link" href="viewmedicalappgsjhs.php">Medical Record</a>
                    <li class="submenu-item"> <a class="submenu-link" href="viewphysicianappgsjhs.php">Physician Record</a>
					<li class="submenu-item"> <a class="submenu-link" href="viewdiagnosisgsjhs.php">Patient Management Record</a>
					<li class="submenu-item"> <a class="submenu-link" href="viewschoolassesgsjhs.php">School Health Assessment Record</a>
					<li class="submenu-item"> <a class="submenu-link" href="viewphysicalexaminationrecordgsjhs.php">Physical Examination Record</a>
					<li class="submenu-item"> <a class="submenu-link" href="viewphysicianorderandprogressnotesgsjhs.php">Physician's Order Sheet and Progress Notes Record</a>
	</li>	
				</ul>
		    </div>
</li>
				</ul>
</nav>
    </div>
	    </div>  
    </header>
    
    
    
        <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
					   
					       
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">Request Physician Consultation Schedule</h4>
					        </div>
                            <?php
								if(isset($_SESSION['success'])){
									echo $_SESSION['success'];
									unset($_SESSION['success']);
								}
							?>
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">
            <b><p>PHYSICIAN is only available every WEDNESDAY. Please wait for a message for approval of your physician consultation request appointment.</b></p>

<form class="form-horizontal mt-4" method="post" action="function/functions.php" onsubmit="return validateForm()">
<div class="row">
  <div class="col-sm-3">
    <div class="form-group">
      <label for="idnumber" class="col-sm-10 control-label" style="font-size: 16px">Enter your ID Number</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter ID number" required>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="form-group">
      <label for="patient_name" class="col-sm-10 control-label" style="font-size: 16px">Enter your Fullname</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Fullname" required>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="form-group">
      <label for="gradesection" class="col-sm-10 control-label" style="font-size: 16px">Grade & Section</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradesection" name="gradesection" placeholder="Enter your Grade & Section" required>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
  <div class="form-group">
  <label for="phoneno" class="col-sm-12 control-label" style="font-size: 16px">Phone Number</label>
    <div class="col-sm-12">
      <input id="personalContactInput" name="phoneno" type="text" placeholder="+63" class="form-control contactInput">
      <p id="personalContactError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
    </div>
  </div>
</div>

<script>
    const personalContactInput = document.getElementById('personalContactInput');
    const personalContactError = document.getElementById('personalContactError');

    personalContactInput.addEventListener('input', function() {
        let inputValue = personalContactInput.value.trim();

        // Ensure that the input always starts with "+63"
        if (!inputValue.startsWith('+63')) {
            inputValue = '+63' + inputValue;
        }

        // Remove any extra characters beyond the maximum length
        if (inputValue.length > 13) {
            inputValue = inputValue.slice(0, 13);
        }

        // Check if the input is valid
        if (inputValue === '+63' || (inputValue.startsWith('+63') && inputValue.length <= 13 && inputValue[3] === '9')) {
            personalContactInput.value = inputValue;
            personalContactError.style.display = 'none'; // Hide the error message
        } else {
            personalContactInput.value = ''; // Clear the input if it's invalid
            personalContactError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>

</div>

<br>
 <div class="row">
 <div class="col-sm-4">
 <div class="form-group">
        <label for="datetime" class="col-sm-12 control-label" style="font-size: 16px">Schedule</label>
        <div class="col-sm-12">
            <input type="text" class="form-control no-color-change" id="selected-date" name="date_time" placeholder="Choose Date in the Calendar" readonly>
        </div>
    </div>
</div>

<div class="col-sm-4">
<div class="form-group">
        <label for="newInput" class="col-sm-12 control-label" style="font-size: 16px">Time</label>
        <div class="col-sm-12">
            <input type="text" class="form-control no-color-change" id="sched_time" name="sched_time" placeholder="Select Time" readonly>
        </div>
    </div>
</div>


 <div class="col-sm-4">
        <div class="form-group">
            <label for="role" class="col-sm-10 control-label" style="font-size: 16px">Role</label>
            <div class="col-sm-12">
                <select id="role" name="role" class="form-control">
                <option value="">Select Role</option>
                <option value="Student in GS/JHS">Student</option>
                <option value="Employee in GS/JHS">Employee</option>
                </select>
            </div>
        </div>
        <br><br>
    </div>

<?php
    class Calendar {
  
            
             //Constructor
             
            public function __construct(){     
                $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
            }
             
            // PROPERTY
            private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
             
            private $currentYear=0;
             
            private $currentMonth=0;
             
            private $currentDay=0;
             
            private $currentDate=null;
             
            private $daysInMonth=0;
             
            private $naviHref= null;
             
          //PUBLIC 
                
            // print out the calendar
            
            public function show() {
                $year  = null;
                 
                $month = null;
                 
                if(null==$year&&isset($_GET['year'])){
         
                    $year = $_GET['year'];
                 
                }else if(null==$year){
         
                    $year = date("Y",time());  
                 
                }          
                 
                if(null==$month&&isset($_GET['month'])){
         
                    $month = $_GET['month'];
                 
                }else if(null==$month){
         
                    $month = date("m",time());
                 
                }                  
                 
                $this->currentYear=$year;
                 
                $this->currentMonth=$month;
                 
                $this->daysInMonth=$this->_daysInMonth($month,$year);  
                 
                $content='<div id="calendar">'.
                                '<div class="box">'.
                                $this->_createNavi().
                                '</div>'.
                                '<div class="box-content">'.
                                        '<ul class="label">'.$this->_createLabels().'</ul>';   
                                        $content.='<div class="clear"></div>';     
                                        $content.='<ul class="dates">';    
                                         
                                        $weeksInMonth = $this->_weeksInMonth($month,$year);
                                        // Create weeks in a month
                                        for( $i=0; $i<$weeksInMonth; $i++ ){
                                             
                                            //Create days in a week
                                            for($j=1;$j<=7;$j++){
                                                $content.=$this->_showDay($i*7+$j);
                                            }
                                        }
                                         
                                        $content.='</ul>';
                                         
                                        $content.='<div class="clear"></div>';     
                     
                                $content.='</div>';
                         
                $content.='</div>';
                return $content;   
            }
             
            // PRIVATE 
// create the li element for ul
private function _showDay($cellNumber) {
    if ($this->currentDay == 0) {
        $firstDayOfTheWeek = date('N', strtotime($this->currentYear . '-' . $this->currentMonth . '-01'));

        if (intval($cellNumber) == intval($firstDayOfTheWeek)) {
            $this->currentDay = 1;
        }
    }

    if (($this->currentDay != 0) && ($this->currentDay <= $this->daysInMonth)) {
        $this->currentDate = date('Y-m-d', strtotime($this->currentYear . '-' . $this->currentMonth . '-' . ($this->currentDay)));
        $cellContent = $this->currentDay;

        // Add data attributes for year and month
        $dataYear = $this->currentYear;
        $dataMonth = $this->currentMonth;
        $this->currentDay++;

        // Check if the date is in the past
        $currentTimestamp = strtotime(date('Y-m-d'));
        $cellTimestamp = strtotime($this->currentDate);

        if ($cellTimestamp < $currentTimestamp) {
            return '<li class="disabled">' . $cellContent . '</li>';
        }
    } else {
        $this->currentDate = null;
        $cellContent = null;
        $dataYear = null;
        $dataMonth = null;
    }

    return '<li id="li-' . $this->currentDate . '" class="' . ($cellNumber % 7 == 1 ? ' start ' : ($cellNumber % 7 == 0 ? ' end ' : ' ')) .
        ($cellContent == null ? 'mask' : '') . '" data-year="' . $dataYear . '" data-month="' . $dataMonth . '">' . $cellContent . '</li>';
}

            
            // create navigation
            
            private function _createNavi(){
                 
                $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
                 
                $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
                 
                $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
                 
                $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
                 
                return
                    '<div class="header">'.
                        '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a>'.
                            '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
                        '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
                    '</div>';
            }
                 
            
            //create calendar week labels
            
            private function _createLabels(){  
                         
                $content='';
                 
                foreach($this->dayLabels as $index=>$label){
                     
                    $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
         
                }
                 
                return $content;
            }
             
             
             
            
            //calculate number of weeks in a particular month
            
            private function _weeksInMonth($month=null,$year=null){
                 
                if( null==($year) ) {
                    $year =  date("Y",time()); 
                }
                 
                if(null==($month)) {
                    $month = date("m",time());
                }
                 
                // find number of days in this month
                $daysInMonths = $this->_daysInMonth($month,$year);
                 
                $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
                 
                $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
                 
                $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
                 
                if($monthEndingDay<$monthStartDay){
                     
                    $numOfweeks++;
                 
                }
                 
                return $numOfweeks;
            }
         
            //calculate number of days in a particular month
            
            private function _daysInMonth($month=null,$year=null){
                 
                if(null==($year))
                    $year =  date("Y",time()); 
         
                if(null==($month))
                    $month = date("m",time());
                     
                return date('t',strtotime($year.'-'.$month.'-01'));
            }
             
        

        // Add a method to generate the calendar
        public function generateCalendar() {
            $year = $this->currentYear;
            $month = $this->currentMonth;
            
            $calendarHTML = $this->show(); // Generate the calendar HTML
            
            echo $calendarHTML;
        }
    }

    // Create an instance of the Calendar class
    $calendar = new Calendar();
    ?>


    <div id="calendar-container">
        <?php
        // Generate and display the calendar
        $calendar->generateCalendar();
        ?>
        <br><br>
    </div>
    

<table class="schedule-table" id="wednesday-table">
<th colspan="4" id="selected-day-header"><span id="selected-date-display"></span></th>
  <tr>
        <td onclick="handleLabelClick('09:00 A.M')">09:00 A.M</td>
        <td onclick="handleLabelClick('10:00 A.M')">10:00 A.M</td>
        <td onclick="handleLabelClick('11:00 A.M')">11:00 A.M</td>
  </tr>
</table>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
        <button name="submit_physician" class="btn btn-success">Send Physician Appointment</button>
    </div>
</div>
</form>


</div><!--//app-card-body-->
</div>			    
</div>
</div>
</div>  					
<!-- Javascript -->          
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script> 

<script>
    // Timer to remove success message after 5 seconds (5000 milliseconds)
    setTimeout(function(){
        var successMessage = document.getElementById('success-message');
        if(successMessage){
            successMessage.remove();
        }
    }, 5000);
</script>
  <!-- jQuery library (make sure to include it) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
$(document).ready(function() {
    // Hide all time tables initially
    $('.schedule-table').hide();

    $('.dates li').click(function() {
    // Remove the "selected" class from all date cells
    $('.dates li').removeClass('selected');

    // Add the "selected" class to the clicked date cell
    $(this).addClass('selected');

    // Get the text content of the clicked date cell
    var selectedDay = $(this).text();

    // Get the year and month from the data attributes
    var selectedYear = $(this).data('year');
    var selectedMonth = $(this).data('month');

    // Create a JavaScript Date object with the selected year, month, and day
    var selectedDate = new Date(selectedYear, selectedMonth - 1, selectedDay);

    // Adjust for the time zone offset
    var timezoneOffsetMinutes = selectedDate.getTimezoneOffset();
    selectedDate.setMinutes(selectedDate.getMinutes() - timezoneOffsetMinutes);

    // Format the date as "Monday September 4, 2023"
    var formattedDate = selectedDate.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });

    // Display the selected date in the Monday table header
    $('#selected-day-header').text(formattedDate);

    // Set the value of the input field with the selected date
    $('#selected-date').val(formattedDate);

    // Determine the day of the week for the selected date
    var selectedDayOfWeek = selectedDate.toLocaleDateString('en-US', { weekday: 'long' });

    // Update the displayed table based on the selected day of the week
    updateDisplayedTable(selectedDayOfWeek);
    // Update the respective day headers for Tuesday, Wednesday, Thursday, and Friday
    if (selectedDayOfWeek === 'Tuesday') {
        $('#tuesday-date-display').text(formattedDate);
    } else if (selectedDayOfWeek === 'Wednesday') {
        $('#wednesday-date-display').text(formattedDate);
    } else if (selectedDayOfWeek === 'Thursday') {
        $('#thursday-date-display').text(formattedDate);
    } else if (selectedDayOfWeek === 'Friday') {
        $('#friday-date-display').text(formattedDate);
    }
});


    // Function to update the displayed table based on the selected date
    function updateDisplayedTable(selectedDayOfWeek) {
        // Hide all time tables
        $('.schedule-table').hide();

        // Determine which table to display based on the selected day of the week
        if (selectedDayOfWeek === 'Monday') {
            $('#monday-table').show(); // Show the Monday table
        } else if (selectedDayOfWeek === 'Tuesday') {
            $('#tuesday-table').show(); // Show the Tuesday table
        } else if (selectedDayOfWeek === 'Wednesday') {
            $('#wednesday-table').show(); // Show the Wednesday table
        }else if (selectedDayOfWeek === 'Thursday') {
            $('#thursday-table').show(); // Show the Thursday table
    }else if (selectedDayOfWeek === 'Friday') {
            $('#friday-table').show(); // Show the Friday table
  }
}
});


// Function to handle clicking an available time
function handleLabelClick(time) {
    document.getElementById('sched_time').value = time;
}

    </script>

<script>
    // Get the current URL
    const currentUrl = window.location.href;

    // Get references to the parent and sub-menu links
    const schedulingLink = document.getElementById('scheduling-link');
    const clinicalLink = document.getElementById('clinical-link');
    const schedulingSubMenuLinks = schedulingLink.querySelectorAll('.submenu-link');
    const clinicalSubMenuLinks = clinicalLink.querySelectorAll('.submenu-link');

    // Check if the current URL matches any of the sub-menu links' href attributes
    schedulingSubMenuLinks.forEach(function(subMenuLink) {
        if (currentUrl.includes(subMenuLink.getAttribute('href'))) {
            // Add the "active-link" class to the parent list item
            schedulingLink.classList.add('active-link');
            // Show the submenu by removing the "collapse" class
            const submenu = document.getElementById('submenu-2');
            submenu.classList.remove('collapse');
        }
    });

    clinicalSubMenuLinks.forEach(function(subMenuLink) {
        if (currentUrl.includes(subMenuLink.getAttribute('href'))) {
            // Add the "active-link" class to the parent list item
            clinicalLink.classList.add('active-link');
            // Show the submenu by removing the "collapse" class
            const submenu = document.getElementById('submenu-3');
            submenu.classList.remove('collapse');
        }
    });
</script>


</body>
</html> 

