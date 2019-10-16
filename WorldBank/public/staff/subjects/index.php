
<?php 
require_once("../../../private/initialize.php");
?>
<?php

    $subject_set = find_all_subjects();
    // echo mysqli_num_rows($subject_set);
    // exit;

?>
<?php $page_title = "Staff Menu";?>

<?php include(SHARED_PATH."/staff_header.php"); ?>

        <div class="row">
            <div class="col">
                <div id="content">
                    <div class="subjects listing">
                        <h1>Subjects</h1>

                        <div class="actions">
                            <a class ="action" href="<?php echo url_for('/staff/subjects/new.php'); ?>">Create New Subject</a>
                        </div>

                        <table class="list">
                            <tr>
                                <th>ID</th>
                                <th>Position</th>
                                <th>Visible</th>
                                <th>Name</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>

                            <?php while($subject = mysqli_fetch_assoc($subject_set)){?>
                                <tr>
                                    <td><?php echo $subject['id'];?></td>
                                    <td><?php echo $subject['position'];?></td>
                                    <td><?php echo $subject['visible']==1 ?'true':'false';?></td>
                                    <td><?php echo $subject['menu_name'];?></td>
                                    <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id='.h(url($subject['id']))); ?>">View</a></td>
                                    <td><a class="action" href="<?php echo url_for('/staff/subjects/edit.php?id='.h(url($subject['id']))); ?>">Edit</a></td>
                                    <td><a class="action" href="<?php echo url_for('/staff/subjects/delete.php?id='.h(url($subject['id']))); ?>">Delete</a></td>
                                    
                    
                                </tr>
                            <?php }?>
                        </table>

                        <?php
                        // free the memeory query. 
                            mysqli_free_result($subject_set);
                        ?>
                    </div>
                   
                </div>
            </div>

        </div>

<?php include(SHARED_PATH."/staff_footer.php") ?>
