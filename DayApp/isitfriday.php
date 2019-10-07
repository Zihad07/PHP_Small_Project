
<?php
// Set time zone
date_default_timezone_set('Asia/Dhaka');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Is It Friday Yet?</title>
  	<style type="text/css">
    body {
    	margin: 0;
    	padding: 0;
      background: #DFCC89;
    }
    #main-content {
      margin: 30px;
      text-align: center;
      color: #3D2399;
    }
    #main-content h1 {
      font: 40px Arial, Helvetica, sans-serif;
    }
    #main-content p {
      font: 24px "Times New Roman", Times, Georgia, serif;
    }
  	</style>
  </head>
  <body>
    <div id="main-content">
      <h1>Is It Friday Yet?</h1>
      
      <p>
    
      </p>

      <!-- <p><?php echo date('l');?></p> -->
      <!-- <p><?php echo date('L');?></p> -->
      <!-- <p><?php echo date('N');?></p> -->

      <pre>
          <!-- <?php print_r(getdate());?> -->
      </pre>

      <p>
          <?php
          if (date('D') == 'Fri'){
              echo "Woo Hoo! It is Friday!!!<br>";
              echo "It's Holiday and JUMMA-DAY.";
          }else{
              echo "Sorry, it is not Friday yet.<br>";
              $remainingDay = 5 - date('N');

              if($remainingDay < 0){
                  $remainingDay += 7;
              }
    
              echo "Only {$remainingDay} more days to go.";
    
              
          }
   
          ?>
      </p>
      
    </div>
    
  </body>
</html>
