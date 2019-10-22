<?php 

require_once("config.php");

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if(!$connection){
    throw new Exception("Cannot connect to database");
}else{
    // Do something
    echo "Connected<br/>";

    // insert a record
 
    // $sql = "INSERT INTO tasks (task, date) ";
    // $sql .= "VALUES ('Do something','2019-10-22')";

    // $result = mysqli_query($connection,$sql);

    // $sql = "INSERT INTO tasks (task, date) ";
    // $sql .= "VALUES ('Do anything','2019-10-23')";

    // $result = mysqli_query($connection,$sql);

    // Read Data

    // $sql = "SELECT * FROM tasks";
    // $result = mysqli_query($connection, $sql);

    // while($row = mysqli_fetch_assoc($result)){
    //     echo "<pre>";
    //     print_r($row);
    //     echo "</pre>";
    // }

    // Delete some data
    // $sql = "DELETE FROM tasks ";
    // $sql .= "WHERE id=2";

    // $result = mysqli_query($connection,$sql);


    // $sql = "SELECT * FROM tasks";
    // $result = mysqli_query($connection, $sql);

    // while($row = mysqli_fetch_assoc($result)){
    //     echo "<pre>";
    //     print_r($row);
    //     echo "</pre>";
    // }

    // Delete all data

    mysqli_query($connection,"DELETE FROM tasks");



}

?>