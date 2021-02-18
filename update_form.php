
<?php
include "init.php";

?>


<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD using OOPS</title>
</head>
<style type="text/css">
	.error {
		color: red;
	}
</style>
<body>

<div id="container">


	<div id="update">
		<h2>Update Record</h2>

		<?php

			$id = $_REQUEST['id'];

			// update query to fetch date which is to be updated
			$result = $functions->query("SELECT * FROM users WHERE id = ?", [$id]);

			if ($result) {
				if ($functions->countRows() > 0) {

					//loop through records - fetch records
					$rows = $functions->fetchAll();

					$i = -1;
					foreach ($rows as $row) {
						$i++;

		?>

		<form action="update.php" method="post">
			<div class="field">
				<label>Name: </label>
				<input type="hidden" name="id" value="<?php echo $rows[$i]['id'] ?>">

				<input type="text" name="fname" value="<?php echo $rows[$i]['fname'] ?>">
				<span class="error">* 
				  	<?php if(!empty($validator->fname_error)): ?>
			          <?php echo $validator->fname_error; ?>
			        <?php endif; ?>
			    </span>
			</div>

			<div class="field">
				<label>Age: </label>
				<input type="text" name="lname" value="<?php echo $rows[$i]['lname'] ?>">
				<span class="error">* 
				  	<?php if(!empty($validator->lname_error)): ?>
			          <?php echo $validator->lname_error; ?>
			        <?php endif; ?>
			    </span>
			</div>

			<div class="field">
				<label>Email: </label>
				<input type="text" name="email" value="<?php echo $rows[$i]['email'] ?>">
				<span class="error">* 
				  	<?php if(!empty($validator->email_error)): ?>
			          <?php echo $validator->email_error; ?>
			        <?php endif; ?>
			    </span>
			</div>

			<input type="submit" name="submit" value="Update">
			
		</form>

		<?php 
					}
				}
			}	
		?>

	</div>

</div>

</body>
</html>