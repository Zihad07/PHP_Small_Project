<?php
// Set time zone
date_default_timezone_set('Asia/Dhaka');

function isLeapYear($year){
   if($year % 4 == 0 && ($year % 100 != 0 || $year % 400 ==0 )){
       return true;
   }else{
       return false;
   }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Is This a Leap Year?</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

    .form-control {
        
        width: 20%;
        margin: auto;
        margin-top: 1rem;
    }
  	</style>
  </head>
  <body>
    <div id="main-content">
      <h1>Is This a Leap Year?</h1>
      
      <p>
        <?php
        if(isset($_GET['year'])){
            $year = intval($_GET["year"]);
        }else{
            // default year
            $year = date('Y');
        }

        if(isLeapYear($year)){
            echo "Yes, {$year} is a leap year.";
        }else{
            echo "No {$year} is not a leap year.";
        }
        
        ?>
     
     
      </p>

      <form action="" method="get">
          Enter a year to find out if it is leapyear:<br>
          <div class="form-group">
            <input type="text" name="year" id="year" class="form-control" width="50%" value="<?php echo $year;?>"><br>
            <input type="submit" value="Sumbmit" class="btn btn-primary"> 
          </div>
      </form>
      
     
      
    </div>

    
    ">
    <!-- JS files: jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
