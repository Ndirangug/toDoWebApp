<?php
    include("includes/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="whole">
    
    <div class="wrapper">
       
        <img src="images/register_inset.jpg" id="register_inset" class="img-responsive img-circle" alt="">
        <div class="register img-rounded">
            <table>
                <thead>
                    <tr>
                    <th class="text-center">To Do App</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="navbar-right">Already Registered? <a href="login.php"> Log In </a> here</td>
                    </tr>
                    <tr>
                        <td>
                            <form action="register.php" method="post" role="form">
                                <div class="form-group">
                                    <label for="#username">Username:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input class="form-control" type="text" name="username" placeholder="username" id="username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="#password">Password:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input class="form-control" type="password" placeholder="password" name="password" id="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="#phone">Phone number:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <input class="form-control" type="text" placeholder="phone number (+254.........)" name="phone" id="phone" required>
                                    </div>
                                </div>

                                <input type="submit" value="REGISTER" class="btn btn-info btn-md" name="register" >
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
    if (isset($_POST['register'])) {
       extract($_POST);
    
       $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
       $query = "INSERT INTO 6470users (username, password, phone) VALUES ('$username', '$hashedPassword', '$phone')";
       $insertResult = mysqli_query($conn, $query);

       if (!$insertResult) {
         echo "<p class='error'>Registration Failed: .".mysqli_error($conn)."</p>";
         header("location:register.php");
       }

       else{
           echo "<p class='success'>Registration Succcess</p>";
           header("location:login.php");
       }
    }
?>