<?php 
session_start();
require('config.php');

$action = $_POST['action'] ?? '';
// echo $action;

$staus = 0; // for register feedback message
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
mysqli_set_charset($connection,"utf8");


if(!$connection){
    throw new Exception('Canot connect to database');
}else{
    if("register" == $action){
        $username = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if($username && $password){
            
            $hash = password_hash($password,PASSWORD_BCRYPT);
            // echo $hash;
            $sql = "INSERT INTO users(email, password) VALUES('{$username}','{$hash}')";
            // echo $sql;
            mysqli_query($connection,$sql);

            if(mysqli_error($connection)){
                // for duplicate entery email
                // '1'=>'Duplicate Email Address',
                // echo mysqli_error($connection);
                $status = 1;
            }else{
                // '3'=>'User Created Successfully',
                $status = 3;
            }
        }else{
            // '2'=>'Username or Password Empty',
            $status = 2;
        }
        // redirect location
        header("Location: index.php?status={$status}");


    }elseif("login" == $action){

        $username = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if($username && $password){

            $sql = "SELECT id, password FROM users WHERE email='{$username}'";
            $result = mysqli_query($connection,$sql);

            if(mysqli_num_rows($result) > 0){
                $data = mysqli_fetch_assoc($result);
                $_password = $data['password'];
                $_id = $data['id'];

                if(password_verify($password,$_password)){
                    // echo "Hello";
                    // die();
                    $_SESSION['id'] = $_id;
                    header("Location: words.php");
                    die();
                }else{
                    // '4'=>'Username and password didn\'t match',
                    $status = 4;
                }
                 
            }else{
                // '5'=>'Username doesn\'t exit',
                $status = 5;
            }
        }else{
            // '2'=>'Username or Password Empty',
            $status = 2;
        }

        header("Location: index.php?status={$status}");
    }elseif("addword" == $action){
        $word = $_POST['word'];
        $meaning = $_POST['meaning'];
        $user_id = $_SESSION['id'] ?? 0;

        if($word && $meaning && $user_id){
            $sql = "INSERT INTO words (user_id, word, meaning) VALUES('{$user_id}','{$word}','{$meaning}')";
            // echo $sql;
            mysqli_query($connection,$sql);

        }
        // rdirect words php
        header("Location: words.php");
    }

    // database connection close
    mysqli_close($connection);
}

?>