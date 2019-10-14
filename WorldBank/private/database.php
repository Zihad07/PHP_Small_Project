<?php 
    require_once('db_credential.php');

    function db_connect(){
        $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
        confirm_db_connect($connection);

        return $connection;
    }

    function db_disconnect($connection){
        if(isset($connection)){
            mysqli_close($connection);
        }
    }

    function confirm_db_connect(){
        if(mysqli_connect_errno()){
            $msg = "Database Connection failed: ";
            $msg .= mysqli_connect_error();
            $msg .= " (".mysqli_connect_errno().")";
            exit($msg);
        }
    }

    function confirm_result_set($result_set){
        if(!$result_set){
            exit("Database query failed.");
        }
    }


?>