<?php 
    include("includes/connection.php");
    session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="bootstrap/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="edit">
        <form action="edit.php" method="post" role="form">
            <input type="text" class="form-control" placeholder="type task here..." name="task">
            <input type="submit" value="SUBMIT CHANGES" class="btn btn-default" name="update">
        </form>
    </div>
</body>
</html>

<?php
    if (isset($_POST['update'])) {
       extract($_POST);

       $query = "UPDATE tasks SET task='$task' WHERE id='$_SESSION[edit_id]' ";
       $runUpdate = mysqli_query($conn, $query);

       if (!$runUpdate) {
            die("Update failed: ".mysqli_error($conn));
       }
       else{
           header("location:dashboard.php");
       }
    }
?>