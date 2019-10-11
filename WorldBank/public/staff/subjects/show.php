<?php 
require_once("../../../private/initialize.php");
?>


<?php

// $page = $_GET['id'] ?? '1';
// echo h($page);

$id = $_GET['id'] ?? '1';

?>


<?php $page_title ="Show Page"?>
<?php include(SHARED_PATH."/staff_header.php");?>


<dic class="row">
    <div class="col">
        <div id="content">
            <a class="back-link" href="<?php echo url_for('/staff/pages/index.php') ?>">
                &laquo; Back to the list
            </a>

            <div class="page shp">
                Page ID: <?php echo h($id);?>
            </div>
        </div>
    </div>
</dic>

<?php include(SHARED_PATH.'/staff_footer.php');?>
<!-- <a href="show.php?name=<?php echo url('John Doe'); ?>">Link</a><br />
<a href="show.php?company=<?php echo url('Widgets&More'); ?>">Link</a><br />
<a href="show.php?query=<?php echo url('!#*?'); ?>">Link</a><br /> -->
