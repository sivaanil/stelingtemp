<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {	// clean user inputs to prevent sql injections	
		 
		unset($_POST['btn-signup']);
		
		//~ echo json_encode($_POST); exit;
		 //echo count($_POST)."<br/>";
		 //echo count(array_filter($_POST))."<br/>";
		 //exit;
		$check = 1;
		if(count($_POST) != count(array_filter($_POST))) {
			$error = true;
			//~ var_dump($error); 
			$errMSG2 = "Please fill require fields";	
			//return false;
			$check = 0;
			}
			
		if($check == 1) {
				$first_name = trim($_POST['first_name']);
				$first_name = strip_tags($first_name);
				$first_name = htmlspecialchars($first_name);
				
				$last_name = trim($_POST['last_name']);
				$last_name = strip_tags($last_name);
				$last_name = htmlspecialchars($last_name);
				
				$email = trim($_POST['email']);
				$email = strip_tags($email);
				$email = htmlspecialchars($email);
				
				$pass = trim($_POST['pass']);
				$pass = strip_tags($pass);
				$pass = htmlspecialchars($pass);
				
				$Gender = trim($_POST['Gender']);
				$Gender = strip_tags($Gender);
				$Gender = htmlspecialchars($Gender);
				
				$dob = trim($_POST['dob']);
				$dob = strip_tags($dob);
				$dob = htmlspecialchars($dob);
				
				$address = trim($_POST['address']);
				$address = strip_tags($address);
				$address = htmlspecialchars($address);
				
				$pin_code = trim($_POST['pin_code']);
				$pin_code = strip_tags($pin_code);
				$pin_code = htmlspecialchars($pin_code);
				
				$state = trim($_POST['state']);
				$state = strip_tags($state);
				$state = htmlspecialchars($state);
				
				$city = trim($_POST['city']);
				$city = strip_tags($city);
				$city = htmlspecialchars($city);
				
				$highest_qualification = trim($_POST['highest_qualification']);
				$highest_qualification = strip_tags($highest_qualification);
				$highest_qualification = htmlspecialchars($highest_qualification);
				
				$current_organization = trim($_POST['current_organization']);
				$current_organization = strip_tags($current_organization);
				$current_organization = htmlspecialchars($current_organization);
				
				$total_exp = trim($_POST['total_exp']);
				$total_exp = strip_tags($total_exp);
				$total_exp = htmlspecialchars($total_exp);
				
				$industry = trim($_POST['industry']);
				$industry = strip_tags($industry);
				$industry = htmlspecialchars($industry);
				
			}
	
		
		// basic name validation
		if ($first_name =='' || $last_name == '') {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($first_name) < 3) {
			$error = true;
			$nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match('/^\d{6}$/',$pin_code)) {
			$error = true;
			$pinCodeError = "Pincode must be of a 6 digit number.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$first_name)) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}
		
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) && $email !='' ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			
			// check email exist or not
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
		// password validation
		
		if(strlen($pass) < 6 && $pass !== null) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}
		//~ var_dump($error); exit;
		// password encrypt using SHA256();
		$password = hash('sha256', $pass);
		//~ $error = false;
		// if there's no error, continue to signup
		if( !$error ) {
			
			$sql = "INSERT INTO users (firstName, lastName, userEmail, userPass, userGender, userDob, userAddress, userPincode, userCity, 
			userState, userQualification, userOrganization, userTexp, userIndustry, userRoleid) 
			VALUES ('$first_name', '$last_name', '$email', '$password', '$Gender','$dob','$address', '$pin_code', '$city', '$state', '$highest_qualification', '$current_organization','$total_exp', '$industry',3);";
			 $res = mysql_query($sql);
			 
			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully registered, you may login now";
				unset($first_name);
				unset($last_name);
				unset($email);
				unset($pass);
				unset($Gender);
				unset($dob);
				unset($address);
				unset($pin_code);
				unset($state);
				unset($city);
				unset($highest_qualification);
				unset($current_organization);
				unset($total_exp);
				unset($industry);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
				
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sterling - Register</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd' 
    });
  } );
  </script>
</head>
<style>
.input-group
{
width:470px
}
</style>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Sign Up.</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<p style="color:orange"><span class="glyphicon glyphicon-info-sign"></span> All Fields are required </p>
                </div>
            
            <?php
			if ( isset($errMSG2) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span style="color:red" class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG2; ?>
                </div>
            	</div>
                <?php
			}
			?>
			
			 <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
            	<input type="text" name="first_name" class="form-control" placeholder="Enter First Name" maxlength="50" value="<?php echo $first_name ?>" />
                </div>
<!--
                <span class="text-danger"><?php echo $nameError; ?></span>
-->
            </div>
            
            <div class="form-group">
            	<div class="input-group">
            	<input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" maxlength="50" value="<?php echo $last_name ?>" />
                </div>
<!--
                <span class="text-danger"><?php echo $nameError; ?></span>
-->
            </div>
            
            <div class="form-group">
            	<div class="input-group">
            	<input type="text" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
            	<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
            	<select name="Gender">
            	<option value="">Select Gender</option>
            	<option value="Male" <?=$Gender == 'Male' ? ' selected="selected"' : '';?>>Male</option>
            	<option value="Female" <?=$Gender == 'Female' ? ' selected="selected"' : '';?>>Female</option>
            	</select>
                </div>
            </div>
              <div class="form-group">
            	<div class="input-group">
            	<input type="text" name="dob" class="form-control" placeholder="Date Of Birth" id="datepicker" maxlength="50" value="<?php echo $dob ?>" />
                </div>
            </div>
            <div class="form-group">
            	<div class="input-group">
            	<input type="text" name="address" class="form-control" placeholder="Address" maxlength="50" value="<?php echo $address ?>" />
                </div>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
            	<input type="text" name="pin_code" class="form-control" placeholder="Pincode" maxlength="6" value="<?php echo $pin_code ?>" /> 
                </div>
                <span class="text-danger"><?php echo $pinCodeError; ?></span>
            </div>
            
             <div class="form-group">
            	<div class="input-group">
            	<input type="text" name="city" class="form-control" placeholder="City" maxlength="50" value="<?php echo $city ?>" />
                </div>
            </div>
            
               <div class="form-group">
            	<div class="input-group">
            	<input type="text" name="state" class="form-control" placeholder="State" maxlength="50" value="<?php echo $state ?>" />
                </div>
            </div>
            
               <div class="form-group">
            	<div class="input-group">
            	<input type="text" name="highest_qualification" class="form-control" placeholder="Highest Qualification" maxlength="50" value="<?php echo $highest_qualification ?>" />
                </div>
            </div>
            
               <div class="form-group">
            	<div class="input-group">
            	<input type="text" name="current_organization" class="form-control" placeholder="Current Organization" maxlength="50" value="<?php echo $current_organization ?>" />
                </div>
            </div>
            
               <div class="form-group">
            	<div class="input-group">
            	<input type="text" name="total_exp" class="form-control" placeholder="Total Exp" maxlength="50" value="<?php echo $total_exp ?>" />
                </div>
            </div>
             <div class="form-group">
            	<div class="input-group">
            	<input type="text" name="industry" class="form-control" placeholder="Industry" maxlength="50" value="<?php echo $industry ?>" />
                </div>
            </div>
          
            
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="index.php">Sign in Here...</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>
