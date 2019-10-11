
<?php 
    if(!isset($page_title)){
        $page_title = "Staff Area";
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>WBI - <?php echo $page_title;?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/staff.css');?>">
  </head>
  <body>

    <div class="container">
        <div class="row">
                <div class="col">
                    <header>
                        <h1>WBI Staff Area</h1>
                    </header>

                    <nav>
                        <ul>
                            <li><a href="<?php echo url_for('/staff/index.php');?>">Menu</a></li>
                        </ul>
                    </nav>
                </div>
        </div>
