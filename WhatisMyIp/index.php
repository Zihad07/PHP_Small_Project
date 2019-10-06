<?php include_once("whatismyip_proxy.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>What is my ip</title>
</head>

<body>
    <div id="main-content">
        <h1>What Is My IP?</h1>

        <p>
            The request came from:<br>
            <strong><?php echo $remote_ip;?></strong>
        </p>

        <?php if($forwarded_ip!=""){?>
        <p>The request was forwarded for:
            <br>
            <strong><?php echo $forwarded_ip;?></strong>
        </p>
        <?php }?>
    </div>
</body>

</html>