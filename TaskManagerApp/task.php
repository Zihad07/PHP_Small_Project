<?php 

require_once('config.php');
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if(!$connection){
    throw new Exception("Cannot connect to database");
}else{
    $action = $_POST['action']??'';

    if(!$action){
        header('Location: index.php');
        die();
    }else{
        // echo $action;

        if('add' == $action){
            // insert record
            $task = $_POST['task'];
            $date = $_POST['date'];

            if($task && $date){

                $sql = "INSERT INTO ".DB_TABLE."(task,date) VALUES('{$task}','{$date}')";
                // echo $sql;
                mysqli_query($connection,$sql);
                // result = insertDB($task,$date);
                header('Location: index.php?added=true');
            }
        }elseif('delete' == $action){
            $taskid = $_POST['taskid'];
            if($taskid){
                $sql = "DELETE FROM ".DB_NAME." WHERE id ={$taskid} LIMIT 1";
                mysqli_query($connection,$sql);
            }
            header('Location: index.php');
        }
        elseif('complete' == $action){
            // echo $_POST['taskid'];
            $taskid = $_POST['taskid'];
            if($taskid){
                $sql = "UPDATE ".DB_NAME." SET complete = 1 WHERE id = {$taskid} LIMIT 1";
                mysqli_query($connection,$sql);
            }

            header("Location: index.php");

        }elseif('incomplete' == $action){
            echo $_POST['taskid'];
            $taskid = $_POST['taskid'];
            if($taskid){
                $sql = "UPDATE ".DB_NAME." SET complete = 0 WHERE id = {$taskid} LIMIT 1";
                // echo $sql;
                mysqli_query($connection,$sql);
            }

            header("Location: index.php");
        }elseif('bulkcomplete' == $action){
            $taskids = $_POST['taskids'];
            // print_r($taskids);
            // die();
            $_taskids = join(',',$taskids);

            if($taskids){
                $sql = "UPDATE ".DB_NAME." SET complete=1 WHERE id in ($_taskids)";
                // echo $sql;
                mysqli_query($connection,$sql);
            }
            header('Location: index.php');

        }elseif('bulkdelete' == $action){
            $taskids = $_POST['taskids'];
            // print_r($taskids);
            // die();
            $_taskids = join(',',$taskids);

            if($taskids){
                $sql = "DELETE FROM ".DB_NAME." WHERE id in ($_taskids)";
                //  echo $sql;
                mysqli_query($connection,$sql);
            }
            header('Location: index.php');

        }

    }

    // mysqli connection deisconnect
    mysqli_close($connection);
}



?>