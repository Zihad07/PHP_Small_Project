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
        }
    }

    // mysqli connection deisconnect
    mysqli_close($connection);
}



?>