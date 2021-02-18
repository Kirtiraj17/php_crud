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
        <?php if(isset($_SESSION['login_success'])): ?>
            <div class="success">
                <?php 
                    echo $_SESSION['login_success'];
                ?>
            </div>
        <?php endif; ?>
        <?php unset($_SESSION['login_success']); ?>
        <?php            
            // check if user is admin or user and echo
            if ($_SESSION['role_id'] == '1') {
                echo "You are an ADMIN!"; 
            } else {
                echo "You are an USER!";
            }
        ?>

     <div>
         <h2>Welcome to the dashboard</h2>
         <a href="logout.php">logout</a>
         <hr>
     </div>

     <!-- fetched records from table -->
     <div id="container">
        <h2>Registered Users</h2>

        <table cellpadding="8px">
            <thead>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Update/Delete</th>
            </thead>
            <tbody>
                <?php 
                // for admin role_id = 1;
                if ($_SESSION['role_id'] == '1') {

                    $result = $functions->query("SELECT * FROM users");

                    if ($result) {
                        if ($functions->countRows() > 0) {

                            //loop through records - fetch records
                            $rows = $functions->fetchAll();

                            $i = -1;
                            foreach ($rows as $row) {
                                $i++;
                    
                ?>
                <tr>
                    <td><?php echo $rows[$i]['id'] ?></td>
                    <td><?php echo $rows[$i]['fname'] ?></td>
                    <td><?php echo $rows[$i]['lname'] ?></td>
                    <td><?php echo $rows[$i]['email'] ?></td>
                    <td>
                        <a href="update_form.php?id=<?php echo $rows[$i]['id'] ?>">Update</a>
                        <a href="delete.php?id=<?php echo $rows[$i]['id'] ?>">Delete</a>
                    </td>
                </tr>
                <?php 
                            }

                        } else {
                            echo "<h2>No Record Found!<?h2>";
                        }
                    }
                } else {
                    //for users role_id = 2;
                    $result1 = $functions->query("SELECT * FROM users WHERE role_id = ?", ['2']);
                    if ($result1) {
                        if ($functions->countRows() > 0) {
                            $rows = $functions->fetchAll();

                            $i = -1;
                            foreach ($rows as $row) {
                                $i++;
                                if ($rows[$i]['id'] == $_SESSION['id']) {
                                    
                ?>
                <tr>
                    <td><?php echo $rows[$i]['id'] ?></td>
                    <td><?php echo $rows[$i]['fname'] ?></td>
                    <td><?php echo $rows[$i]['lname'] ?></td>
                    <td><?php echo $rows[$i]['email'] ?></td>
                    <td>
                        <a href="update_form.php?id=<?php echo $rows[$i]['id'] ?>">Update</a>
                        <a href="delete.php?id=<?php echo $rows[$i]['id'] ?>">Delete</a>
                    </td>
                </tr>
                <?php
                                }
                            }
                        } else {
                            echo "<h2>No Record Found!<?h2>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>

    </div>



 </body>
 </html>