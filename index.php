<?php  

    session_start();
    if (isset($_SESSION['username'])) {
        header("location:dashboard.php");
    }

    else {
        header("location:login.php");
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Redirect</title>
    <link rel="favicon" href="favicon.ico">
    
</head>
<body>
    
</body>
</html>