<?php
    $host = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "6470";
    $conn = mysqli_connect($host, $dbUser, $dbPassword, $dbName);

    if (!$conn) {
      die("<p style='color:red;' >Connection Failed".mysqli_connect_error($conn)."</p>");
    }

    else{
        echo "<p style='color:green;' >Connection success</p>";
    }
?>