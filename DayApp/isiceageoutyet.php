<?php
// Set time zone
date_default_timezone_set('Asia/Dhaka');

$iceAgeDates = array(
    1 => 'March 12,2002',
    2 => 'March 1,2006',
    3 => 'November 21,2006',
    4 => 'October 20,2008',
    5 => 'July 1,2009',
    6 => 'June 26,2012',
    7 => 'June 19,2016',
    8 => null,
   
  );

  $episodeName = array(
      1 => "Ice Age",
      2 => "Ice Age: The Meltdown",
      3 => "Ice Age: No Times for Nuts",
      4 => "Ice Age: Surviving Sid",
      5 => "Ice Age: Dawn of the Dinosaurs",
      6 => "Ice Age: Continental Drift",
      7 => "Ice Age: Collision Course",
  );

  if(isset($_GET['episode'])){
      $episode = intval($_GET['episode']);
  }else{
      $episode = 7;
  }

  $releaseDate = $iceAgeDates[$episode];
  $releaseDateTime = strtotime($releaseDate); //timestamp
  $releaseDateString = strftime("%B %d, %Y",$releaseDateTime);


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Is Ice Age Out Yet !!!?</title>
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
      <h1>Is ICE AGE Out Yet ???</h1>
      
      <p>
        <?php
            if(is_null($releaseDate)){
                echo "No Episode #{$episode} does not yet have a realease date.";
            }elseif(time() >= $releaseDateTime){
                echo "Yes Episode #{$episode} was released on {$releaseDateString}";
                echo "<br>";
                printf("<h3>%s</h3>",$episodeName[$episode]);

            }else{
                echo "Not yet! Episode #{$episode} will be released on {$releaseDateString}";
            }
        ?>
     
     
      </p>

      <form action="" method="get">
          Which Ice Age Episode?<br>
          <div class="form-group">
            
            <select name="episode" id="episode" class="form-control">
                <?php
                for($i=1;$i<=8;$i++){
                    printf("<option value='%d'> #%d</option>",$i,$i);
                }
                ?>
            </select>
            <input type="submit" value="Sumbmit" class="mt-4 btn btn-primary"> 
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
