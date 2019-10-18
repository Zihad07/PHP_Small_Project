<?php 

function is_post_request(){
    return $_SERVER['REQUEST_METHOD'] =="POST";
}


function test_input($data){
    $data = htmlspecialchars(stripslashes(trim($data)));
    return $data;
}

function is_valid_email($eamil){
    return filter_var($eamil,FILTER_VALIDATE_EMAIL);
}

function is_valid_url($url){
    return preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url);
}
?>