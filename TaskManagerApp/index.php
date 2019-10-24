<?php 
    require_once('config.php');
    include('function.php');
    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    if(!$connection){
        throw new Exception("Cannot connect to database");
    }

    // collect all data from database
    $sql = "SELECT * FROM tasks WHERE complete = 0 ORDER BY date";
    $result = mysqli_query($connection,$sql);

    $sql = "SELECT * FROM tasks WHERE complete = 1 ORDER BY date";
    $resultCompleteTasks = mysqli_query($connection,$sql);

    // $sql = "SELECT * FROM tasks WHERE complete = 1 ORDER BY date";
    // $resultCompleteTasks = mysqli_query($connection,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Todo/Tasks</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">

    <style>
        body{ margin-top: 30px;}

        #main {padding: 0px 150px 0px 150px;}

        #action {width: 150px;}
    </style>
</head>
<body>

    <div class="container" id="main">
        <h1>Task Manager</h1>

        <p>This is a sample project for managing our daily task.We're going to use HTML, CSS, PHP, Javascript and MySQL for this project.</p>

        <!-- mark Complete task table -->
        <?php 
            if(mysqli_num_rows($resultCompleteTasks) > 0){?>
                <h4>Complete Tasks</h4>
        
            <form action="">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Id</th>
                            <th>Task</th>
                            <th>Data</th>
                            <th>Action</th>
                        </tr>
                        
                    </thead>

                    <tbody>

                        <?php while($cdata = mysqli_fetch_assoc($resultCompleteTasks)){?>
                            <tr>
                                <td><input class="label-inline" type="checkbox" value="<?php echo $cdata['id'];?>"></td>
                                <td><?php echo $cdata['id'];?></td>
                                <td><?php echo $cdata['task'];?></td>
                                <td><?php echo mytime($cdata['date'])?></td>
                                <td><a class="delete" data-taskid="<?php echo $cdata['id'];?>" href="#">Delete</a> | <a class="incomplete" data-taskid="<?php echo $cdata['id'];?>" href="#">Mark Incomlete</a></td>
                            </tr>
                        <?php }?>

                    
                    </tbody>
                </table>
            </form>
        <P>...</P>
        <?php }?>

        <!-- Upcoming task table-->
        <?php 
            if(mysqli_num_rows($result) == 0){?>
                <p>No Task Found</p>
            <?php }
            else{?>
            <h4>Upcoming Tasks</h4>
        <form action="task.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Task</th>
                        <th>Data</th>
                        <th>Action</th>
                    </tr>
                    
                </thead>

                <tbody>

                    <?php while($data = mysqli_fetch_assoc($result)){?>
                        <tr>
                            <td><input name="taskids[]" class="label-inline" type="checkbox" value="<?php echo $data['id'];?>"></td>
                            <td><?php echo $data['id'];?></td>
                            <td><?php echo $data['task'];?></td>
                            <td><?php echo mytime($data['date'])?></td>
                            <td><a class="delete" data-taskid="<?php echo $data['id'];?>" href="#">Delete</a> |<a class="complete" href="#" data-taskid="<?php echo $data['id'];?>">Complete</a></td>
                        </tr>
                    <?php }?>

                
                </tbody>
            </table>

            <select id="action" name="action">
                <option value="0">With Selected</option>
                <option value="bulkdelete">Delete</option>
                <option value="bulkcomplete">Mark As Complete</option>
            </select>
            <input class="button-primary" id="bulksubmit" type="submit" value="Submit">
        </form>
        <?php }?>

        <p></p>
        
        <h4>Add Tasks</h4>
        <form action="task.php" method="post">
            <fieldset>

            <?php 
                $added = $_GET['added'] ?? '';
                if($added){echo "<p>Task Successfully Added</p>";}
            ?>
            <label for="task">Task</label>
            <input type="text" placeholder="Task Details" id="task" name="task">
            <label for="date">Date</label>
            <input type="text" placeholder="Task Date" id="date" name="date">

            <input class="button-primary" type="submit" value="Add Task">
            <input type="hidden" name="action" value="add">


            </fieldset>
        </form>
    </div>

    <!-- complet task -->
    <form action="task.php" method="post" id="completeform">
        <input type="hidden" name="action" value="complete">
        <input type="hidden" name="taskid" id="taskid" >
    </form>
    <!-- delete task -->
    <form action="task.php" method="post" id="deleteform">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="taskid" id="dtaskid" >
    </form>
    <!-- incomplet task -->
    <form action="task.php" method="post" id="incompleteform">
        <input type="hidden" name="action" value="incomplete">
        <input type="hidden" name="taskid" id="itaskid" >
    </form>
    
</body>

<!-- my js -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script>
    $(document).ready(function(){
        // alert('done');
        $(".complete").on('click',function(){
            var id = $(this).data('taskid');
            // alert(id);
            $("#taskid").val(id);
            $("#completeform").submit();
        })

        // Delete
        $('.delete').on('click',function(){
            if(confirm("Are you sure to delete this task?")){
                var id = $(this).data('taskid');
                $('#dtaskid').val(id);
                $('#deleteform').submit();
            }
        })
        // incomplete
        $(".incomplete").on('click', function () {
                var id = $(this).data("taskid");
                $("#itaskid").val(id);
                $("#incompleteform").submit();
            });

        
        // Bulksubmit
        $('#bulksubmit').on('click',function(){
            if($('#action').val() == 'bulkdelete'){
                if(!confirm("Are you sure to delete?")){
                    return false;
                }
            }
        })

       
    });
</script>
</html>

