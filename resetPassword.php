<?php
    include("includes/connection.php");
    session_start();
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="favicon" href="favicon.ico">
    <link rel="stylesheet" href="bootstrap/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="wrapper-body">
    
    <div class="wrapper-forgot">
        <img src="images/error-circle.png" id="register_inset" class="img-responsive img-circle" alt="">
        <div class="register-forgot img-rounded">
            <table>
                <thead>
                    <th class="text-center">Reset</th>
                </thead>
                <tbody>
                   
                    <tr>
                        <td>
                            <form action="resetPassword.php" method="post" role="form">
                                <div class="form-group">
                                    <label for="#username">Username:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input class="form-control" type="text" name="username" placeholder="username" id="username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="#currentpassword">Current password:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input class="form-control" type="password" placeholder="current password" name="currentpassword" id="currentpassword" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="#newpassword">New password:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input class="form-control" type="password" placeholder="new password" name="newpassword" id="newpassword" required>
                                    </div>
                                </div>
                                <input type="submit" value="RESET PASSWORD" class="btn btn-info btn-md" name="reset" >
                            </form>
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>

    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>

<?php


    if (isset($_POST['reset'])) {

        
    extract($_POST);
        
    $query = "SELECT username, password FROM 6470users WHERE username = '$username'";
    $selectResult = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($selectResult) > 0) {
        $record = mysqli_fetch_assoc($selectResult); 
        $hash = $record['password'];
        if (password_verify($currentpassword, $hash)) {
            $newhash = password_hash($newpassword, PASSWORD_BCRYPT);
           $query =" UPDATE 6470users SET password = '$newhash' WHERE id = '$_SESSION[id]'";
           $changeResult = mysqli_query($conn, $query);

           if (!$changeResult) {
               die("Query failed: ".mysqli_error($conn));
           }

           elseif ($changeResult && mysqli_affected_rows($conn) == 1) {
               header("location:login.php");
               echo "<p class='success'>Passsword changed successfully</p>";
           }
        }  

        else {
            
            echo "<p class='error'>Password not changed.Try again</p>";
        }
      
    }

    else{
        echo "<p class='error'>No such username and password combination exists!</p>";
    }

    }

   session_write_close();
?>
