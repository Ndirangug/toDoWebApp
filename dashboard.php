<?php 
    include("includes/connection.php");
    session_start();

    function showTasks(){
    include("includes/connection.php");
    $query = "SELECT * FROM tasks WHERE userID = '$_SESSION[id]'";
    $selectResult = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($selectResult)) {
        echo "<div class='task'><input  class='counted' type='checkbox' name=".$row['id']." ><span class='task-text'> ".ucfirst($row['task']). "</span>   <span class='navbar-right'><a href='dashboard.php?edit=$row[id]'><i class='fa fa-edit'></i></a> <a href='dashboard.php?delete=$row[id]'><i class='fa fa-trash'></i></a></span></div>";

    }
    }

    if(isset($_GET['complete'])){
        extract($_GET);
        $query = "UPDATE INTO tasks SET completed = '$_GET[complete]' WHERE id = 'taskid'";
    }


    
?>

<?php
    if (isset($_GET['logout'])) {
       session_destroy();
       header("location:login.php");
    }

  
    function searchResult(){
                        include("includes/connection.php");
                       
                        if (isset($_GET['btnSearch'])) {
                        extract($_GET);

                        echo "<div id='empty'></div>";
                        $searchQuery =" SELECT task FROM tasks WHERE userID = '$_SESSION[id]'";
                        $doSearch = mysqli_query($conn, $searchQuery);

                            while($row = mysqli_fetch_assoc($doSearch)){
                                $textToBeSearched = $row['task'];
                            $output = strstr($textToBeSearched, $searchtext);

                            if (strlen($output) > 0) {
                                
                                echo "<h3>".$row['task']."</h3>";
                            }
                            }
                     }

                    }

    if (isset($_GET['add_task'])) {
       extract($_GET);

       $query = "INSERT INTO tasks (task, userID) VALUES ('$task', '$_SESSION[id]')";
      

        if (strlen($task) > 0) {
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
      
        else{
            echo "<p class='error'> Cant add empty task</p>";
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
          header("location:edit.php?taskEdit=");
       }

       session_write_close();
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DashBoard</title>
    <link rel="favicon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="bootstrap/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css">
    
   
    
</head>
<body>
    <div class="container-fluid">
        <div class="header-dashboard row">
            <a id="dashboard_link" href="dashboard.php"><h1>DASHBOARD</h1></a>
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
                <div class="row"><div class="tasks-header col-md-8">
                    <form class="addtask" action="dashboard.php" method="get">
                         <button type="submit"  name="add_task"><span class="btn btn-default"><i class="fa fa-plus"></i> ADD TASK</span></button>
                         <input type="text" class="form-control" name="task" id="task" placeholder="add task here..">
                    </form></div>
                    <div class="col-md-4">
                    <form class="searchinput" id="searchinput" method="get" action="dashboard.php" role="form" >
                        <input class="form-control" type="search" name="searchtext" id="search" onkeyup="showResult()" placeholder="text to search.....">
                        <button class="btnSearch" data-toggle="modal" data-target="#searchModal" type="submit" name="btnSearch"><i class='fa fa-search'></i></button>
                        <div id="livesearch"></div>
                    </form>

                </div></div>
                <div class="row task-space"><div class="col-md-12">
                    <?php showTasks();?>
                </div></div>
                
                <div ng-app="complete" ng-controller="completetasks" class="row"><div class="col-md-12"><h4 id="complete"> </h4></div></div>
                <div id="searchResult">
                   <!-- Modal -->
                    <div id='searchModal'  role='dialog'>
                        <div class='modal-dialog'>

                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                    <h4 class='modal-title'>Search Results</h4>
                                </div>
                                <div class='modal-body'>
                                    <p><?php searchResult();  ?></p>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/main.js"></script>
    
    
    <script>
        

        
       
        var number = 0;

         $(".counted").change(function () {
                var checked = $(":checked");
                number = checked.length;
               
                $("#complete").html("Tasks Completed: " + number);
                
            });
        

      
   
   
    
    $(".close").click(function(){
        $("#searchResult").hide();
    });

    </script>
</body>
</html>

