<?php 
    include("includes/connection.php");
    session_start();

    function showTasks(){
    include("includes/connection.php");
    $query = "SELECT * FROM tasks WHERE userID = '$_SESSION[id]'";
    $selectResult = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($selectResult)) {
        echo "<div class='task'><a href='dashboard.php?complete=true'><input href='dashboard.php?complete=true' class='counted' type='checkbox' name=".$row['id']." ></a> ".$row['task']. " <span class='navbar-right'><a href='dashboard.php?edit=$row[id]'><i class='fa fa-edit'></i></a> <a href='dashboard.php?delete=$row[id]'><i class='fa fa-trash'></i></a></span></div>";

    }
    }

    if(isset($_GET['complete'])){
        extract($_GET);
        $query = "UPDATE INTO tasks SET completed = '$_GET[complete]' WHERE id = 'taskid'";
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DashBoard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="bootstrap/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css">
    <script src="bootstrap/angular/angular.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="header-dashboard row">
            <a href="dashboard.php"><h1>DASHBOARD</h1></a>
            <span class="navbar-right"><h3 ><?php echo $_SESSION['username']; ?> | <a href="dashboard.php?logout=true">LOG OUT</a></h3></span>
        </div>
        <div class="row">
            <div class="col-md-2 text-center details_pane">
                <h1><span><i class="fa fa-user-circle"></i></span></h1>
                <h4><?php echo $_SESSION['username']; ?></h4>
                <h4><?php echo "+". $_SESSION['phone']; ?></h4>
                <hr>
                <p>Welcome to your dashboard.This is where you add, edit, and delete tasks. <br/>Managing a to do list has never been this easy.</p>
                <a href="resetPassword.php">Reset Password</a>
            </div>
            <div class="col-md-10">
                <div class="row"><div class="tasks-header col-md-7">
                    <form class="addtask" action="dashboard.php" method="get">
                         <button type="submit"  name="add_task"><span class="btn btn-default"><i class="fa fa-plus"></i> ADD TASK</span></button>
                         <input type="text" class="form-control" name="task" id="task" placeholder="add task here..">
                    </form></div>
                    <div class="col-md-5">
                    <form class="searchinput" action="dashboard.php" method="get" role="form">
                        <input class="form-control" type="search" name="searchtext" id="search" placeholder="text to search.....">
                        <button type="submit" name="btnSearch"><i class='fa fa-search'></i></button>
                    </form>

                </div></div>
                <div class="row task-space"><div class="col-md-12">
                    <?php showTasks();?>
                </div></div>
                <div ng-app="complete" ng-controller="completetasks" class="row"><div class="col-md-12"><h4>Tasks completed: {{tasks}} </h4></div></div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    
    <script>
        $(".counted").click(function(){
            $(this).addClass("checked");
            
        });

        var checkedOnes = document.getElementsByClassName("checked");
        var number = checkedOnes.length;

        var app = angular.module("complete", []); 
        app.controller('completetasks', function ($scope) {

            $scope.tasks = number;
        }
    );                

    </script>
</body>
</html>

<?php
    if (isset($_GET['logout'])) {
       session_destroy();
       header("location:login.php");
    }

    if (isset($_GET['add_task'])) {
       extract($_GET);

       $query = "INSERT INTO tasks (task, userID) VALUES ('$task', '$_SESSION[id]')";
       $insertResult = mysqli_query($conn, $query);

       if (!$insertResult) {
          echo "<p class='error'>Error!Task not added! :".mysqli_error($conn)."</p>";
       }

       else{
           echo "<p class='success'>Task Added successfully</p>";
           $last_id = mysqli_insert_id($conn);
           header("location:dashboard.php");
           
       }

       
       }

       if (isset($_GET['delete'])) {
          $deleteQuery = "DELETE FROM tasks WHERE id = '$_GET[delete]'";
          $runDelete = mysqli_query($conn, $deleteQuery);

        if (!$runDelete) {
           echo "<p class='error'>Delete Failed</p>".mysqli_error($conn);
        }

        else{
            header("location:dashboard.php");
        }
       }

       if (isset($_GET['edit'])) {
          $_SESSION['edit_id'] = $_GET['edit'];
          header("location:edit.php");
       }

       session_write_close();
    
?>
