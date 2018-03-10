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
<body class='wrapper-body'>
    
    <div class="wrapper-forgot">
        <img src="images/error-circle.png" id="register_inset" class="img-responsive img-circle" alt="">
        <div class="register-forgot img-rounded">
            <table>
                <thead>
                    <th class="text-center">Password Recovery</th>
                </thead>
                <tbody>
                   
                    <tr>
                        <td>
                            <form action="forgot_password.php" method="post" role="form">
                                <div class="form-group">
                                    <label for="#username">Username:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input class="form-control" type="text" name="username" placeholder="username" id="username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="#password">Phone:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input class="form-control" type="phone" placeholder="phone number" name="phone" id="phone" required>
                                    </div>
                                </div>
                                <input type="submit" value="GET PASSWORD RESET LINK" class="btn btn-info btn-md" name="get_password" >
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="login.php">Log In</a></td>
                    </tr>
                    <tr>
                        <td>
                        <?php


    if (isset($_POST['get_password'])) {

        
    extract($_POST);
        
    $query = "SELECT username, phone, password FROM 6470users WHERE username = '$username' AND phone = '$phone'";
    $selectResult = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($selectResult) > 0) {
        $record = mysqli_fetch_assoc($selectResult); 
        $_SESSION['user'] = $username;
    
       echo "Hey $username, here is your password reset link <a href='resetPasswordLoggedOut.php'>hugydfewfnwised3435fhkmxko2384937</a>";
    }

    else{
        echo "<p class='error'>No such username and phone number combination exists!</p>";
    }

    }
session_write_close();
   
?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>


