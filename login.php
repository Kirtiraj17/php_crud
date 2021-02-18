<?php
include "init.php";

if(isset($_SESSION['id'])) {
	header("Location: home.php");
}

if(isset($_POST['login'])) {

	$data = [

	    'email' => $_POST['email'],
	    'password' => $_POST['password'],
	    'email_error' => '',
	    'password_error' => ''
	];

	if(empty($data['email'])) {
		$data['email_error'] = "Email is required";
	}

	if(empty($data['password'])) {
		$data['password_error'] = "Password is required";
	}

	// submit form
	if(empty($data['email_error']) && empty($data['password_error'])) {
		if($functions->query("SELECT * FROM users WHERE email = ?", [$data['email']])) {

		  	if($functions->countRows() > 0) {
		      	$row = $functions->single();
		      	$id = $row->id;
		      	$db_password = $row->password;
		      	$fname = $row->fname;
		      	// var_dump($row);

		      	if(password_verify($data['password'], $db_password)) {
		      		if(isset($_POST['remember'])) {
						//set cookie for 1 day
						setcookie('email', $data['email'], time()+86400);
						setcookie('pass', $data['password'], time()+86400);
					}

		      		$_SESSION['login_success'] = "Hi ".$fname . " You are successfully Logged In!";
				    $_SESSION['id'] = $id;
				    header("Location: home.php");
		      	} else {
		      		$data['password_error'] = "Please enter correct password";
		      	}
	        } else {
				$data['email_error'] = "Please enter correct email";
			}

		}
	}

}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Login OOPS</title>
	<style type="text/css">
		th {
			text-align: right;
		}
		h2 {
			text-align: center;
		}
		.error { color: red; }

	</style>
</head>
<body>
	<table cellpadding="5" cellspacing="10" align="center">
		<h2>Login using OOPS</h2>

		<!-- show success message on login -->
		<?php if(isset($_SESSION['account_created'])):?>
          <div class="success" style="text-align: center;">
            <?php echo $_SESSION['account_created']; ?>
          </div>
        <?php endif; ?>
        <?php unset($_SESSION['account_created']); ?>

		<form method="post" action="">
			<tr>
				<th>Email:</th>
				<td><input type="text" name="email" value="<?php if(!empty($data['email'])): echo $data['email']; endif;?><?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?>">
	  				<span class="error">* 
	  					<?php if(!empty($data['email_error'])): ?>
				          <?php echo $data['email_error']; ?>
				        <?php endif; ?>
				    </span>
				</td>
			</tr>
			<tr>
				<th>Password:</th>
				<td><input type="password" name="password" value="<?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];} ?>">
	  				<span class="error">* 
	  					<?php if(!empty($data['password_error'])): ?>
				          <?php echo $data['password_error']; ?>
				        <?php endif; ?>
				    </span>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="checkbox" name="remember" value="1">Remember Me</td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input type="submit" name="login" value="Login"></td>
			</tr>
		</form>
	</table>
	<span style="display: block; text-align: center;">Don't have an account? <a href="index.php">Register</a></span>


</body>
</html>