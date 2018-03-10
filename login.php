<?php
    include("includes/connection.php");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log In</title>
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
                    <th class="text-center">To Do App</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="navbar-right">Not Registered? <a href="register.php"> Register </a> here</td>
                    </tr>
                    <tr>
                        <td>
                            <form action="login.php" method="post" role="form">
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
                                <input type="submit" value="LOG IN" class="btn btn-info btn-md" name="login" >
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="forgot_password.php">Forgot Password</a></td>
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


    if (isset($_POST['login'])) {

        
    extract($_POST);
        
    $query = "SELECT * FROM 6470users WHERE username = '$username'";
    $selectResult = mysqli_query($conn, $query);
    
    
    if (!$selectResult) {
       echo "Query Failed :".mysqli_error($conn);
    }

    else{

        if (mysqli_num_rows($selectResult) > 0) {
            $row = mysqli_fetch_assoc($selectResult);
            $hashedPassword = $row['password'];
            
            if (password_verify($password, $hashedPassword)) {
            echo "success";
            $_SESSION['username'] = $username;
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['id'] = $row['id'];
            
            header("location:dashboard.php");
            }

            else{
            echo "<p>Invalid password entered<a href='login.php'>Try Again</a></p>";
           
            }
        }

        else{
           
            echo "<p>Invalid username<a href='login.php'>Try Again</a></p>";
            
            
        }
       
    }
    

    }

    session_write_close();
?>

