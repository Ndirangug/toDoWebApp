<?php 
    include("includes/connection.php");
    session_start();

    $taskItself;

     $taskQuery = "SELECT * FROM tasks WHERE id = '$_GET[taskEdit]' ";
          $taskResult = mysqli_query($conn, $taskQuery);

          if (!$taskResult) {
              die("Query error ".mysqli_error($conn));
          }

          else {
              $taskFetched = mysqli_fetch_assoc($taskResult);
              $taskItself = $taskFetched['task'];

              
          }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Task</title>
    <link rel="favicon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="bootstrap/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body id="edit-body">
    <div class="tint">
    
    <div id="edit"   class="edit img-rounded">
        <form action="edit.php" method="post" role="form">
            <input type="text" class="form-control" <?php echo "value ='". $taskItself."'"; ?> placeholder="type task here..." name="task">
            <input style="margin-top:1em;" type="submit" value="SUBMIT CHANGES" class="btn btn-default" name="update">
        </form>
    </div>

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