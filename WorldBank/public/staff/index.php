
<?php 
require_once("../../private/initialize.php");
?>

<?php $page_title = "Staff Menu";?>

<?php include(SHARED_PATH."/staff_header.php"); ?>

        <div class="row">
            <div class="col">
                <div id="content">
                    <h2>Main-Menu</h2>
                    <ul>
                        <li><a href="<?php echo url_for('/staff/subjects/index.php'); ?>">Subjects</a></li>
                        <li><a href="<?php echo url_for('/staff/pages/index.php'); ?>">Pages</a></li>
                    </ul>
                </div>
            </div>

        </div>

<?php include(SHARED_PATH."/staff_footer.php") ?>
