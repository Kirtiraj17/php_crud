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

		

		<form method="post" action="">
			<tr>
				<th>Email:</th>
				<td><input type="text" name="email" value="">
	  				<span class="error">* 
	  					
				    </span>
				</td>
			</tr>
			<tr>
				<th>Password:</th>
				<td><input type="password" name="password" value="">
	  				<span class="error">* 
	  					
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