<?php 
require_once("../../../private/initialize.php");
?>

<?php 
$test = $_GET['test'] ?? "";

if($test == '404'){
    error_404();
}elseif($test =='500'){
    error_500();
}elseif($test == 'redirect'){
    redirect_to(url_for('staff/subjects/index.php'));
}
else{
    echo "No error";
}
?>

<?php $page_title = "Create Subject";?>
<?php include(SHARED_PATH."/staff_header.php");?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div id="id">
                <a class="back-list" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

                <div class="subject new">
                    <h1>Create Subject</h1>

                    <form action="<?php echo url_for('staff/subjects/create.php');?>" method="post">
                        <dl>
                            <dt>Menu Name</dt>
                            <dd><input class="form-control" type="text" name="menu_name" id="" value=""></dd>
                        </dl>

                        <dl>
                            <dt>Position</dt>
                            <dd>
                                <select class="form-control" name="position" id="">
                                    <option value="1">1</option>
                                </select>
                            </dd>
                        </dl>

                        <dl>
                            <dt>Visible</dt>
                            <dd>
                                <input type="hidden" name="visible" value="0">
                                <input class="" type="checkbox" name="visible" id="" value="1">
                            </dd>


                        </dl>
                        <div id="operation">
                            <input class="btn btn-primary" type="submit" value="Crate Subject">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include(SHARED_PATH."/staff_footer.php");?>