<?php

$colors = array(
    '#ff0000',
    '#00ff00',
    '#0000ff',
    '#000000',
    '#ffffff',
    '#f0f0f0',
);

$colors_count = count($colors);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Random Color</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  	<style type="text/css">
    body {
    	margin: 0;
    	padding: 0;
      /* background: #DFCC89; */
      background: <?php echo $colors[rand(0,$colors_count-1)] ?>;
    }

    .area {
        float: left;
        margin: 0;
        padding: 0;
        <?php
        $random = rand(30,100);
        $width = $height = $random."px";
        ?>
        width: <?php echo $width;?>;
        height: <?php echo $height;?>;
        /* width: 100px !important; */
        /* height: 100px !important; */
    }

    #area2 {
        background: <?php echo $colors[rand(0,$colors_count-1)];?>
    }
   
  	</style>
  </head>
  <body>
    <div id="main-content">
    <div class="area" id="area2"></div>
     
    <?php
    $squars = 100;
    for($i=0; $i<$squars;$i++){
         echo "<div class=\"area\" id=\"area1\" style=\"background:{$colors[rand(0,$colors_count-1)]};\"></div>";
        // echo "<div class=\"area\" id=\"area1\" style=\"background: {$colors[rand(0,6)]}\"></div>";
    }
    
    ?>
      
    </div>

    
    
    <!-- JS files: jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
