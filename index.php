<?php
include "init.php";

?>


<!DOCTYPE html>
<html>
<head>
	<title>PHP Form using OOPS</title>
</head>
<style type="text/css">
	.error { color: red; }
</style>
<body>

	<?php

		if(isset($_POST['submit'])) {

			// call validator
			$validator->validateForm();

		    // Submit the form
		    if(empty($validator->fname_error) && empty($validator->lname_error) && empty($validator->email_error) && empty($validator->password_error) && empty($validator->cpassword_error)) {

			    $password = password_hash($validator->password, PASSWORD_DEFAULT);

			    if($functions->query("INSERT INTO users (fname,lname,email,password) VALUES (?,?,?,?)", [$validator->first_name, $validator->last_name, $validator->email, $password])) {
				    $_SESSION['account_created'] = "Your account is successfully created!";
				    header("location:login.php");
		     	}

		    }

		}

	?>

	<h2>Registration Form</h2>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		First Name: <input type="text" name="fname" value="<?php if(!empty($validator->first_name)): echo $validator->first_name; endif;?>">
		<span class="error">* 
		  	<?php if($validator->fname_error): ?>
	          <?php echo $validator->fname_error; ?>
	        <?php endif; ?>
	    </span>
		<br><br>

		Last Name: <input type="text" name="lname" value="<?php if(!empty($validator->last_name)): echo $validator->last_name; endif;?>">
		<span class="error">* 
		  	<?php if($validator->lname_error): ?>
	          <?php echo $validator->lname_error; ?>
	        <?php endif; ?>
		</span>
		<br><br>

		E-mail: <input type="text" name="email" value="<?php if(!empty($validator->email)): echo $validator->email; endif;?>">
		<span class="error">* 
			<?php if(!empty($validator->email_error)): ?>
	          <?php echo $validator->email_error; ?>
	        <?php endif; ?>		
	    </span>
		<br><br>

		Password: <input type="password" name="password">
		<span class="error">* 
		  	<?php if(!empty($validator->password_error)): ?>
	          <?php echo $validator->password_error; ?>
	        <?php endif; ?>
		</span>
		<br><br>

		Confirm Password: <input type="password" name="cpassword">
		<span class="error">* 
		  	<?php if(!empty($validator->cpassword_error)): ?>
	          <?php echo $validator->cpassword_error; ?>
	        <?php endif; ?>
		</span>
		<br><br>

		<input type="submit" name="submit" value="Submit"> 
		<br><br>

		<span style="display: block;">Already have an account? <a href="login.php">Login</a></span>

	</form>

</body>
</html>