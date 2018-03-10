<?php
    include("includes/connection.php");
    session_start();
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
    <div class="wrapper">
        <img src="images/error-circle.png" id="register_inset" class="img-responsive img-circle" alt="">
        <div class="register img-rounded">
            <table>
                <thead>
                    <th class="text-center">Reset</th>
                </thead>
                <tbody>
                   
                    <tr>
                        <td>
                            <form action="resetPasswordLoggedOut.php" method="post" role="form">
                               
                                <div class="form-group">
                                    <label for="#newpassword">New password:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input class="form-control" type="password" placeholder="new password" name="newpasswordLoggedOut" id="newpassword" required>
                                    </div>
                                </div>
                                <input type="submit" value="RESET PASSWORD" class="btn btn-info btn-md" name="resetLoggedOut" >
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


    if (isset($_POST['resetLoggedOut'])) {

        
    extract($_POST);    
            $newhashLoggedOut = password_hash($newpasswordLoggedOut, PASSWORD_BCRYPT);
           $queryLoggedOut =" UPDATE 6470users SET password = '$newhashLoggedOut' WHERE username = '$_SESSION[user]'";
           $changeResultLoggedOut = mysqli_query($conn, $queryLoggedOut);

           if (!$changeResultLoggedOut) {
              die("Query Failed: ".mysqli_error($conn));
           }

           else {
               header("location:login.php");
               echo "<p class='success'>Password changed successfully</p>";
           }
           
        }

       
      
   

   session_write_close();
?>
