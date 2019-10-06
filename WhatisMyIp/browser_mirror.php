<?php 
include_once("whatismyip_proxy.php");
require_once("browser_detective.php");
?>

<?php

// set time zone
date_default_timezone_set('Asia/Dhaka');

function timeFormated(){
  return date('l, F j, Y g:ia',$_SERVER['REQUEST_TIME']);
}

// create browser dectective object
$browser = new BrowserDectective();
// call brower detect
$browser->detect();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Browser Mirror</title>

    <style type="text/css">
    body {
    	margin: 0;
    	padding: 0;
      background: #000;
    }
    #main-content {
      margin: 30px;
      text-align: center;
      color: #fff;
    }
    #main-content h1 {
      font: 40px Arial, Helvetica, sans-serif;
    }
    #main-content p {
      font: 24px "Times New Roman", Times, Georgia, serif;
      text-align: left; margin: 0; padding: 0;
    }
    #main-content p{
      font-size: 20px;
      color: #fff;
    }

    span {  color: grey;}


  	</style>
</head>

<body>
    <div id="main-content">
        <h1><span>Browser Mirror</span></h1>

        <p><span>Remort IP:</span> <?php echo $_SERVER['REMOTE_ADDR'];?></p>
        <p><span>HTTP USER AGENT:</span> <?php echo $_SERVER['HTTP_USER_AGENT'];?></p>
        <p><span>PLATFORM:</span> <?php echo $browser->platform;?></p>
        <p><span>BROWSER:</span> <?php echo $browser->browser_name;?></p>
        <p><span>BROWSER WINDOW WIDTH:</span> <span id="window-width"></span></p>
        <p><span>BROWSER WINDOW HEIGHT:</span> <span id="window-height"></span></p>

        <p><span>REQUEST TIME(Unix):</span> <?php echo $_SERVER['REQUEST_TIME'];?></p>
        <p><span>REQUEST TIME(Formatted):</span> <?php echo timeFormated();?></p>
        <p><span>REQUEST URI: </span><?php echo $_SERVER['REQUEST_URI'];?></p>
        <p><span>REQUEST METHOD: <span><?php echo $_SERVER['REQUEST_METHOD'];?></p>
        <p><span>QUERY STRING: </span><?php echo $_SERVER['QUERY_STRING'];?></p>
        <p><span>HTTP ACCEPT:</span> <?php echo $_SERVER['HTTP_ACCEPT'];?></p>
        <p><span>HTTP ACCEPT CHARSET: </span><?php echo $_SERVER['HTTP_ACCEPT_CHARSET'];?></p>
        <p><span>HTTP ACCEPT ENCODING: </span><?php echo $_SERVER['HTTP_ACCEPT_ENCODING'];?></p>
        <p><span>REMOTE ADDR LANGUAGE: </span><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE	'];?></p>
        <P><span>HTTPS?: </span><?php if(isset($_SERVER['HTTPS'])) {echo 'Yes';} else {echo "No";}?></P>

        <p><span>REMOTE PORT: </span><?php echo $_SERVER['REMOTE_PORT'];?></p>

    
    </div>

    <!-- js script -->
    <script src="myscript.js"></script>
</body>

</html>