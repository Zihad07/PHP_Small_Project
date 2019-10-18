<?php 

require_once("function.php");

$name = $email = $gender = $comment = $website = "";

if(is_post_request()){
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $website = test_input($_POST["website"]);
    $comment = test_input($_POST["comment"]);
    $gender = test_input($_POST["gender"]);

    // print_r($_POST);
}




?>