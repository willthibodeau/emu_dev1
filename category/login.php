<?php 

include'../model/database.php';
include'../view/header.php';

?>

<form name="frmRegistration" method="post" action="">
	<table border="0" width="500" align="center" class="demo-table">
		<tr><td>Username</td>
		<td><input type="text" class="demoInputBox" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
		</tr>
		<tr><td>First Name</td>
		<td><input type="text" class="demoInputBox" name="firstName" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></td>
		</tr>
		<tr><td>Last Name</td>
		<td><input type="text" class="demoInputBox" name="lastName" placeholder=lastname value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></td>
		</tr>
		<tr><td>Password</td>
		<td><input type="password" class="demoInputBox" name="password" value=""></td>
		</tr>
		<tr><td>Confirm Password</td>
		<td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
		</tr>
		<tr><td>Email</td>
		<td><input type="text" class="demoInputBox" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"></td>
		</tr>
		<tr><td></td>
		<td></td>
		</tr>
		<tr>
		<td><input type="checkbox" name="terms"> I accept Terms and Conditions</td>
		</tr>
	</table>
	<div><input type="submit" name="submit" value="Register" class="btnRegister"></div>
</form>

<?php include'../view/footer.php'; ?>