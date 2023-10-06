<?php
	session_start();
	include '../db.php';
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Admin Signup</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
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

.signup-btn:hover{
		background:#2E37A4;
	}

	.signup-btn {
		padding: 10px 15px;
		font-weight: 100;
		border-radius: 12px;
		background:#4851c5;
	}

	a.app-link {
		color: #4851c5;
	}

	a.text-link {
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
							<label class="sr-only" for="signup-email">Role</label>
							<select id="role" name="role" class="form-control role" required="required">
								<option value="" selected disabled>Select role</option>
								<option value="1">Nurse in GS and JHS</option>
								<option value="2">Nurse in SHS</option>
								<option value="3">Nurse in College</option>
								<option value="4">Dentist in GS, JHS & SHS</option>
								<option value="5">Dentist in College</option>
								<option value="6">Physician in GS, JHS & SHS</option>
								<option value="7">Physician in College</option>
								
								<!-- Add more options for different email types if needed -->
							</select>
							</div>

							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Username</label>
								<input id="signup-name" name="username" type="text" class="form-control signup-name" placeholder="Username" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Your Email</label>
								<input id="signup-email" name="email" type="email" class="form-control signup-email" placeholder="School Email" required="required">
							</div>
							<?php
								if(isset($_SESSION['failed'])){
									echo $_SESSION['failed'];
									unset($_SESSION['failed']);
								}
							?>
							

							<div class="password mb-3">
								<label class="sr-only" for="signup-password">Password</label>
								<input id="signup-password" name="password" type="password" class="form-control signup-password" placeholder="Create a password" required="required">
							</div>
							</div><!--//extra-->
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
    
    </div -->


</body>

</html> 












