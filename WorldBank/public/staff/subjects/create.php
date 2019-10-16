<?php require_once("../../../private/initialize.php");?>
<?php 


if(is_post_request()){
// Handle form value sent by new.php

    $subject=[];
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';


    $result = insert_subject($subject);
    $new_id = mysqli_insert_id($db);

    redirect_to(url_for('/staff/subjects/show.php?id='.$new_id));
    // echo "Form parameter<br>";

    // echo "Menu name:".$menu_name."<br>";
    // echo "Position:".$position."<br>";
    // echo "visible:".$visible."<br>";
}else{
    redirect_to(url_for('/staff/subjects/index.php'));
}

?>