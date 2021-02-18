<?php 
include "init.php";

if(!isset($_SESSION['id'])) {
    header("Location: login.php"); 
}

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Home</title>
     <style type="text/css">
         .success{ text-align: center; }
     </style>
 </head>
 <body>
     <div>
         <?php if(isset($_SESSION['login_success'])): ?>
            <div class="success">
                <?php echo $_SESSION['login_success']; ?>
            </div>
         <?php endif; ?>
         <?php unset($_SESSION['login_success']); ?>

         <h2>Welcome to the dashboard</h2><hr>
         <a href="logout.php">logout</a>
     </div>
 </body>
 </html>