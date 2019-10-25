<?php 

require('config.php');

$action = $_POST['action'] ?? '';
// echo $action;

$staus = 0; // for register feedback message
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);


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
                // echo mysqli_error($connection);
                $status = 1;
            }else{
                $status = 3;
            }
        }else{
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

                if(password_verify($password,$_password)){
                    // echo "Hello";
                    // die();
                    header("Location: words.php");
                    die();
                }else{
                    $status = 4;
                }
                 
            }else{
                $status = 5;
            }
        }else{
            $status = 2;
        }

        header("Location: index.php?status={$status}");
    }

    // database connection close
    mysqli_close($connection);
}

?>