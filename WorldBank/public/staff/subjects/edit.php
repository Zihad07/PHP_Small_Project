<?php 
require_once("../../../private/initialize.php");
if(!isset($_GET['id'])){
    redirect_to(url_for('/staff/subjects/index.php'));
}

$id = $_GET['id'];
$menu_name = '';
$position = '';
$visible = '';


if(is_post_request()){
// Handle form value sent by new.php


    $menu_name = $_POST['menu_name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    echo "Form parameter<br>";

    echo "Menu name:".$menu_name."<br>";
    echo "Position:".$position."<br>";
    echo "visible:".$visible."<br>";
}

?>
 
<?php $page_title = "Edit Subject";?>
<?php include(SHARED_PATH."/staff_header.php");?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div id="id">
                <a class="back-list" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

                <div class="subject new">
                    <h1>Edit Subject</h1>

                    <form action="<?php echo url_for('/staff/subjects/edit.php?id='.h(url($id)));?>" method="post">
                        <dl>
                            <dt>Menu Name</dt>
                            <dd><input class="form-control" type="text" name="menu_name" id="" value="<?php echo $menu_name;?>"></dd>
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
                            <input class="btn btn-primary" type="submit" value="Edit Subject">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include(SHARED_PATH."/staff_footer.php");?>