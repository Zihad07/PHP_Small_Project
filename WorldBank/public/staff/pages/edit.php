<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(url_for('/staff/pages/index.php'));
}
$id = $_GET['id'];


if(is_post_request()){
    // Handle form value sent by new.php

    $page = [];
    $page['id'] = $id;
    $page['subject_id'] = $_POST['subject_id']??'';
    $page['menu_name'] = $_POST['menu_name'] ?? '';
    $page['position'] = $_POST['position'] ?? '';
    $page['visible'] = $_POST['visible'] ?? '';
    $page['content'] = $_POST['content'] ?? '';

    $result = update_page($page);
    redirect_to(url_for('/staff/pages/show.php?id='.$id));

    // echo "Form parameters<br />";
    // echo "Menu name: " . $menu_name . "<br />";
    // echo "Position: " . $position . "<br />";
    // echo "Visible: " . $visible . "<br />";
}else{
    $page = find_page_by_id($id);
    $page_set = find_all_pages();
    $page_count = mysqli_num_rows($page_set);
    mysqli_free_result($page_set);
}
?>

<?php $page_title="Edit Page";?>
<?php include(SHARED_PATH.'/staff_header.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div id="content">
                <a href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

                <div class="page new">
                    <h1>Edit Page</h1>

                    <form action="<?php echo url_for('/staff/pages/edit.php?id='.h(url($id)));?>" method="post">

                    <dl>
                            <dt>Subject</dt>

                            <dd>
                                <select class="form-control" name="subject_id" id="">
                                    <?php 
                                        $subject_set= find_all_subjects();

                                        while($subject = mysqli_fetch_assoc($subject_set)){
                                            echo "<option value=\"".h($subject['id'])."\"";
                                            if($subject['id']==$page['subject_id']){
                                                echo " selected";
                                            }

                                            echo ">".h($subject['menu_name'])."</option>";
                                        }
                                        mysqli_free_result($subject_set);
                                    ?>
                                </select>
                            </dd>
                        </dl>

                        <dl>
                            <dt>Menu Name</dt>
                            <dd>
                                <input class="form-control" type="text" name="menu_name"
                                    value="<?php echo h($page['menu_name']);?>">

                            </dd>
                        </dl>

                        <dl>
                            <dt>Position</dt>
                            <dd>
                                <select class="form-control" name="position" id="">
                                    <?php 
                                        for($i=1;$i<=$page_count;$i++){
                                            echo "<option value=\"{$i}\"";

                                            if($page['position']==$i){
                                                echo "selected";
                                            }

                                            echo ">{$i}</option>";
                                        }
                                    ?>
                                </select>
                            </dd>
                        </dl>

                        <dl>
                            <dt>Visible</dt>
                            <dd>
                                <input type="hidden" name="visible" value="0">
                                <input type="checkbox" name="visible" value="1"
                                    <?php if($page['subject_id']=='1'){echo "checked";}?>>
                            </dd>

                        </dl>

                        <dl>
                            <dd>Content</dd>
                            <br>
                            <dt>
                                <textarea name="content" cols="60"
                                    rows="10"><?php echo h($page['content']); ?></textarea>
                            </dt>
                        </dl>
                        

                        <div id="opeations">
                            <input class="btn btn-primary mb-4" type="submit" value="Edit page"">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include(SHARED_PATH."/staff_footer.php");?>