<?php 
require_once("../../../private/initialize.php");
?>


<?php

// $page = $_GET['id'] ?? '1';
// echo h($page);

$id = $_GET['id'] ?? '1';
$subject = find_subject_by_id($id);

?>


<?php $page_title ="Show Page"?>
<?php include(SHARED_PATH."/staff_header.php");?>


<dic class="row">
    <div class="col">
        <div id="content">
            <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php') ?>">
                &laquo; Back to the list
            </a>

            <div class="subject show">
                <h1>Sunject <?php echo h($subject['menu_name']);?></h1>

                <div class="attributes">
                    <dl>
                        <dt>Menu Name</dt>
                        <dd><?php echo h($subject['menu_name']);?></dd>
                    </dl>

                    <dl>
                        <dt>Position</dt>
                        <dd><?php echo h($subject['position']);?></dd>
                    </dl>

                    <dl>
                        <dt>Visible</dt>
                        <dd><?php echo h($subject['visible'])=='1'?'true' : 'false';?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</dic>

<?php include(SHARED_PATH.'/staff_footer.php');?>
<!-- <a href="show.php?name=<?php echo url('John Doe'); ?>">Link</a><br />
<a href="show.php?company=<?php echo url('Widgets&More'); ?>">Link</a><br />
<a href="show.php?query=<?php echo url('!#*?'); ?>">Link</a><br /> -->
