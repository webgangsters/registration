<?php
require("../php/validateForm.php");
$validForm = true;
$id = 100;

if(isset($_POST['submitButton']) && ($validForm == true))
{
	$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
	$familyName = isset($_POST['familyName']) ? $_POST['familyName'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$passwordCon = isset($_POST['passwordCon']) ? $_POST['passwordCon'] : '';
	$eMail = isset($_POST['eMail']) ? $_POST['eMail'] : '';
	$address = isset($_POST['address']) ? $_POST['address'] : '';
	$conNumber = isset($_POST['conNumber']) ? $_POST['conNumber'] : '';
	$custType = isset($_POST['custType']) ? $_POST['custType'] : '';
	
	$error = registerUser($firstName, $familyName, $password, $eMail, $address, $conNumber, $custType);
	$errorText = validatePassword($password, $passwordCon);               				
}

?>

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
	<meta name="description" content="Mobile Online Shop" />
	<meta name="keywords" content="Latest Mobile, Best Mobile, Mobile Price" />
	<meta name="author" content="WebGangsters" />
		
	<title>MobileGangster | Registration</title>
	
	<link rel="stylesheet" type="text/css" href="../template.css" />
		
	</head>
	
	<body>
		<div id="container">
		<!-- Header Start -->
			<div id="header">
					<?php include('../header/header.html'); ?>
			</div>
		<!-- Header End -->

		<!-- Navigation Start -->
			<div id="navigation">
					<?php include('../navigation/navigation.html'); ?>
			</div>
		<!-- Navigation End -->
	
	
		<!-- Content Start -->
			<div>
			<!-- Registration Start -->
				<div id="register">
					<?php if ((!isset($_POST['submitButton'])) || ($validForm != ''))  {?>
						<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
							<table border="0">
								<tr>
									<td colspan="3"><h3>MobileGangster Member Registration</h3></td>
								</tr>
								<tr>
									<td class="regi1">First Name: </td>
									<td class="regiInput">
										<input type="text" name="firstName" value="<?php echo $_POST["firstName"] ?>" />
									</td>
									<td class="regi_Error">
										<?php
	                       					 if(isset($_POST["firstName"]))
	                       					 {
	                            				if(!validateName($_POST["firstName"]))
	                            				{
	                                				$validForm = false;
	                            				}
	                       					 }
	                    				?>
									</td>
								</tr>
								<tr>
									<td class="regi1">Family Name: </td>
									<td>
										<input type="text" name="familyName" value="<?php echo $_POST["familyName"] ?>" />
									</td>
									<td class="regi_Error">
										<?php
	                       					 if(isset($_POST["familyName"]))
	                       					 {
	                            				if(!validateName($_POST["familyName"]))
	                            				{
	                                				$validForm = false;
	                            				}
	                       					 }
	                    				?>
									</td>
								</tr>
								<tr>
									<td class="regi1">Password: </td>
									<td>
										<input type="password" name="password" value="<?php echo $_POST["password"] ?>" />
									</td>
									<td class="regi_Error" rowspan="2">
										<?php
	                    					if($errorText != "")
	                    					{
	                    						$validForm = false;
	                    						echo $errorText;
	                    					}
	                    				?>
									</td>
								</tr>
								<tr>
									<td class="regi1">Confirm Password: </td>
									<td>
										<input type="password" name="passwordCon" value="<?php echo $_POST["passwordCon"] ?>" />
									</td>				
								</tr>
								<tr>
									<td class="regi1">E-Mail: </td>
									<td>
										<input type="text" name="eMail" value="<?php echo $_POST["eMail"] ?>" />
									</td>
									<td class="regi_Error">
										<?php
	                       					 if(isset($_POST["eMail"]))
	                       					 {
	                            				if(!validateEmail($_POST["eMail"]))
	                            				{
	                                				$validForm = false;
	                            				}
	                       					 }
	                    				?>
									</td>
								</tr>
								<tr>
									<td class="regi1">Age: </td>
									<td><input type="text" name="age" /></td>
								</tr>
								<tr>
									<td class="regi1">Address: </td>
									<td>
										<input type="text" name="address" value="<?php echo $_POST["address"] ?>" />
									</td>
									<td class="regi_Error">
										<?php
	                       					 if(isset($_POST["address"]))
	                       					 {
	                            				if(!validateAlphanumeric($_POST["address"]))
	                            				{
	                                				$validForm = false;
	                            				}
	                       					 }
	                    				?>
									</td>
								</tr>
								<tr>
									<td class="regi1">Contact Number: </td>
									<td>
										<input type="text" name="conNumber" value="<?php echo $_POST["conNumber"] ?>" />
									</td>
									<td class="regi_Error">
										<?php
	                       					 if(isset($_POST["conNumber"]))
	                       					 {
	                            				if(!validateNumeric($_POST["conNumber"]))
	                            				{
	                                				$validForm = false;
	                            				}
	                       					 }
	                    				?>
									</td>
								</tr>
								<tr>
									<td class="regi1">Register As: </td>
									<td>
										<select name="custType">
											<option value="Family">Normal Member</option>
											<option value="Senior">VIP Member</option>
											<option value="Admin">Administrator</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="3" class="regiButton">
										<input type="submit" value="Register" name="submitButton" class="regiButtonBlue" />
										<input type="reset" />
									</td>
								</tr>
							</table>
						</form>
					<?php 
					}
						if(isset($_POST['submitButton']) && ($validForm == true)) {
					?>
					<div id="registerConfirm">
						<table border="0">
							<tr>
								<td class="pageHeading"><h3>MobileGangster Member Registration</h3></td>
							</tr>
							<tr>
								<td align="center">
									<?php 
										if($validForm == true) 
										{	
											$id++;
											$string1 = $familyName{0};
											$string2 = $familyName{1};
											$string3 = $familyName{2};
											$username = "$string1$string2$string3$id";
											
											echo "Congratulation!! You are registered successfully!<br /><br />";
											echo "Your username is: $username <br /><br />";
											echo "<a href='../main/index.php'><input type='button' value='OK' class='regiButtonBlue' /></a>";
										}
										else 
										{
											echo "$error<br /><br />";
											echo "<a href='../main/index.php'><input type='button' value='Back' class='regiButtonBlue' /></a>";
										}	
									?>
								</td>
							</tr>
						</table>
					</div>
					<?php } ?>
				</div>
			<!-- Registration End -->
			</div>
		<!-- Content End -->
	
		<!-- Footer Start -->
		<div id="footer">
				<?php include('../footer/footer.html'); ?>
		</div>
		<!-- Footer End -->
	</div>
	</body>
</html>