<?php 
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
    redirect_to(url_for('/staff/pages/index.php'));
}

$id = $_GET['id'];

if(is_post_request()){
    $result = delete_page($id);
    redirect_to(url_for('/staff/pages/index.php'));
}else{
    $page = find_page_by_id($id);
}
?>

<?php $page_title = 'Delete Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class="row">
    <div class="col-md-8 mx-auto p-4">
        <div class="content">
        <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

        <div class="page delete">
            <h1>Delete Page</h1>
            <p>Are you sure you want to delete this page?</p>
            <p class="item"><?php echo h($page['menu_name'])?></p>

            <form action="<?php echo url_for('/staff/pages/delete.php?id='.h(url($page['id'])));?>" method="post">

            <div id="operation">
                <input class="btn btn-danger text-white" type="submit" value="Delete Page" name="commit">
            </div>
        </form>
        </div>
        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


