<?php
	session_start();
	include '../db.php';
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>User Signup</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="assets/images/divine.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

	<link rel="stylesheet" href="../assets/plugins/feather/feather.css">

	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</head> 
<body class="app app-login p-0">   
	<!-- digdi -->  
<div class="main-wrapper login-body">
<div class="container-fluid px-0">
<div class="row">

<div class="col-lg-6 login-wrap">
<div class="login-sec">
<style>

a.text-link:hover,
a.app-link:hover{
	color:#009ce7 !important;
}
	
	.signup-btn {
		padding: 10px 15px;
		font-weight: 100;
		border-radius: 12px;
		background:#4851c5;
	}

	.signup-btn:hover{
		background:#2E37A4;
	}

	a.app-link {
		color: #4851c5;
	}

    .log-img {
		margin-top: -100px;
		width: 810px;
		height: 350px;
      background-image: url('../assets/img/gege.gif');
      background-size: cover; /* Adjust the sizing of the background image */

      /* mix-blend-mode: luminosity; Add position relative to position child elements */
    }


	.logo-crop{
	  margin-top: 750px;
      width: 810px;
      height: 350px;
	  overflow: hidden;
	}

	.overlay-img img {
  width: 500px; /* Adjust the width to make the image smaller or larger */
  height: auto; /* Maintain the image's aspect ratio */
  margin-top: -1600px;
  animation: floatAnimation 12s ease-in-out infinite; /* Add the animation */

}

@keyframes floatAnimation {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-20px);
  }
}

  </style>
 <div class="logo-crop">
	<div class="log-img">
	<!-- Background Image -->
	</div>
 </div>
  <div class="overlay-img">
    <img src="../assets/img/asdd.png" alt="Overlay Image">
  </div>
</div>
</div>

<div class="col-lg-6 login-wrap-bg">
    <div class="login-wrapper">
        <div class="loginbox">
            <div class="login-right">
                <div class="login-right-wrap">
	      <style>
                        .account-logo {
							margin-top:-75px;
                            height: 150px;
                            width: 150px;
                            /* background: linear-gradient(
                                #8a82fb,
                                #407ed7
                            ); */
                            position: absolute;
                            /* margin: auto;
                            left: 0;
                            right: 0;
                            top: 0;
                            bottom: 0; */
                            /* border-radius: 50%; */
                            display: grid;
                            place-items: center;
                            font-size: 50px;
                            /* color: #ffffff; */
                            z-index: 1; /* Adjust the z-index to place it in front of other elements */
                        }

                        .account-logo:before,
                        .account-logo:after {
                            content: "";
                            position: absolute;
                            height: 25px;
                            width: 25px;
                            background-color: #3330ca;
                            border-radius: 80%;
                            z-index: -1;
                            opacity: 0.7;
							margin-left: -115px;
							margin-top: 4px;
                        }

                        .account-logo:before {
                            animation: pulse 2s ease-out infinite;
                        }

                        .account-logo:after {
                            animation: pulse 2s 1s ease-out infinite;
                        }

                        @keyframes pulse {
                            100% {
                                transform: scale(2.6);
                                opacity: 0;
                            }
                        }
                    </style>
	</style>




	
	<div class="account-logo">
                        <a href="index.html"><img src="../assets/img/login-logo.png" alt></a>
                    </div>
					<br><br>
<h2>Sign up to Portal</h2>
<form class="auth-form login-form" action="function/funct.php" method="POST">         
<div class="email mb-3">
								<label class="sr-only" for="signup-email">Your Name</label>
								<input id="signup-name" name="fullname" type="text" class="form-control signup-name" placeholder="Full name" required="required">
							</div>
							<div class="email mb-3">
							<label class="sr-only" for="signup-email">Level of Education</label>
							<select id="signup-name" name="leveleduc" class="form-control signup-role" required="required">
								<option value="" selected disabled>--Select--</option>
								<option value="1">Grade School/Junior High School</option>
								<option value="2">Senior High School</option>
								<option value="3">College</option>
							</select>
							</div>
							<?php
								if(isset($_SESSION['failed'])){
									echo $_SESSION['failed'];
									unset($_SESSION['failed']);
								}
							?>
							<div class="email mb-3">
							<label class="sr-only" for="signup-email">Role</label>
							<select id="signup-name" name="role" class="form-control signup-role" required="required">
								<option value="" selected disabled>Select Role</option>
								<option value="Student in GS/JHS">Student</option>
								<option value="Employee in GS/JHS">Employee</option>
							</select>
      					  </div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Grade Level</label>
								<input id="signup-name" name="gradelevel" type="text" class="form-control signup-idnumber" placeholder="Grade Level" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Your ID Number</label>
								<input id="signup-name" name="idnumber" type="text" class="form-control signup-idnumber" placeholder="ID Number" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Your Email</label>
								<input id="signup-email" name="email" type="email" class="form-control signup-email" placeholder="School Email" required="required">
							</div>

							<div class="password mb-3">
								<label class="sr-only" for="signup-password">Password</label>
								<input id="signup-password" name="password" type="password" class="form-control signup-password" placeholder="Create a password" required="required">
							</div>
						<div class="extra mb-3">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" required id="RememberPassword">
        <label class="form-check-label" for="RememberPassword">
            I agree to Portal's
            <a href="#" class="app-link" data-toggle="modal" data-target="#termsOfServiceModal">Terms of Service</a>
            and
            <a href="#" class="app-link" data-toggle="modal" data-target="#privacyPolicyModal">Privacy Policy</a>.
        </label>
    </div>
</div>

<!-- Terms of Service Modal -->
<div class="modal fade" id="termsOfServiceModal" tabindex="-1" role="dialog" aria-labelledby="termsOfServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsOfServiceModalLabel">Terms of Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your Terms of Service content here -->
                <!-- Example: -->
                <p>Welcome to the Divine Word College of Legazpi School Health Clinic. These Terms of Service govern your use of our services, including medical, dental, physician consultation, and other health-related services provided by our clinic. <br><br>
                
                By accessing or using the services of the Divine Word College of Legazpi School Health Clinic, you agree to comply with and be bound by these Terms of Service.
                <br><br>
                
                <b>1. Clinic Services</b>
                <br><br>1.1
                The Divine Word College of Legazpi School Health Clinic provides a range of health-related services to students, staff, and other authorized individuals associated with the school.
                <br><br>
                <b>2. Eligibility</b>
                <br><br>2.1
                Our services are available to students and staff members of Divine Word College of Legazpi as well as authorized individuals as determined by the school administration.
                
                 <br><br>
                <b>3. Privacy and Confidentiality</b>
                <br><br>3.1
                    We are committed to protecting your privacy and maintaining the confidentiality of your health information in accordance with applicable laws and regulations. <br>
                <br>3.2. Your health records will be kept confidential, and access to them will be limited to authorized clinic staff and, when necessary, other healthcare providers involved in your care.
                
                 <br><br>
                <b>4. Appointments</b>
                <br><br>4.1
                   Online Scheduling Appointments may be required for certain clinic services. Please fill-out the form under the Appointment navigation bar after logging in. <br>
                   
                 <br>
                <b>5. Code of Conduct</b>
                <br><br>5.1. All individuals utilizing our clinic services are expected to conduct themselves in a respectful and courteous manner. <br><br>
                5.2. Abusive or disruptive behavior will not be tolerated, and individuals engaging in such behavior may be denied access to our services.
              

                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Privacy Policy Modal -->
<div class="modal fade" id="privacyPolicyModal" tabindex="-1" role="dialog" aria-labelledby="privacyPolicyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="privacyPolicyModalLabel">Privacy Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your Privacy Policy content here -->
                <!-- Example: -->
                <p>Divine Word College of Legazpi Health Clinic Privacy Policy 
                <br><br>
                
                At Divine Word College of Legazpi Health Clinic, we are committed to protecting the privacy and confidentiality of your personal health information. This Privacy Policy outlines ou practices and policies regarding the collection, use, and disclosure of your health information. Please read this policy carefully to understand how we handle your information.
                
                  <br><br>
                
                <b>1. Information We Collect:</b>
                
                <br>
                We collect and maintain various types of health information to provide you with quality healthcare services. This information may include:
                    <ul>
                        <li>Personal Information: Name, date of birth, contact information, and emergency contacts.</li>
                        <li>Health Information: Medical history, diagnoses, treatments, medications, immunizations, allergies, and test results.</li>
                        
                </ul>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--//extra-->
							<div class="text-center">
								<input type="text" name="type" value="1" style="display: none;">
								<button name="signup" type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto signup-btn">Sign Up</button>
							</div>
						</form><!--//auth-form-->
						<div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="login.php" >Log in</a></div>
					</div><!--//auth-form-container-->	
			    </div><!--//auth-body-->
						</form>


					
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>


<script src="../assets/js/jquery-3.6.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/js/feather.min.js"></script>

<script src="../assets/js/app.js"></script>
    <!-- <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo"><img class="logo-icon me-2" src="assets/images/dwcl.png" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Log in to Portal</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" action="function/funct.php" method="POST">         
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input id="signin-email" name="email" type="email" class="form-control signin-email" placeholder="Email address" required="required">
							</div>
							<?php
								// if(isset($_SESSION['failed'])){
								// 	echo $_SESSION['failed'];
								// 	unset($_SESSION['failed']);
								// }
							?>
							<div class="email mb-3">
							<label class="sr-only" for="signup-email">Level of Education</label>
							<select id="signup-name" name="leveleduc" class="form-control signup-role" required="required">
								<option value="" selected disabled>--Select--</option>
								<option value="1">Grade School/Junior High School</option>
								<option value="2">Senior High School</option>
								<option value="3">College</option>
							</select>
							</div>
								<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Password" required="required">
								<?php
									// if(isset($_SESSION['failed'])){
									// 	echo $_SESSION['failed'];
									// 	unset($_SESSION['failed']);
									// }
								?>
								
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
											Remember me
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="text-center">
								<button name="login" type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
							</div>
						</form>
						
						<div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="signup.php" >here</a>.</div>
					</div>
			    </div>
		    </div>   
	    </div>

	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
		    </div>

				</div>
				</div>
			</div>
		</div>
	    <div class="col-12 col-md-7 col-lg-6 auth-background-col">
		    <div class="auth-background-holder">			    
		    </div>
		
			    

	    </div>
    
    </div -->


</body>

</html> 












