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

		First Name: <input type="text" name="fname" value="">
		<span class="error">* 
		  	
	    </span>
		<br><br>

		Last Name: <input type="text" name="lname" value="">
		<span class="error">* 
		  	
		</span>
		<br><br>

		E-mail: <input type="text" name="email" value="">
		<span class="error">* 
		
		</span>
		<br><br>

		Password: <input type="password" name="password">
		<span class="error">* 
		  	
		</span>
		<br><br>

		Confirm Password: <input type="password" name="cpassword">
		<span class="error">* 
		  	
		</span>
		<br><br>

		<input type="submit" name="submit" value="Submit"> 
		<br><br>

		<span style="display: block;">Already have an account? <a href="login.php">Login</a></span>

	</form>

</body>
</html>