<?php

include_once "scramblerFunction.php";
$task = "encode";

if(isset($_GET['task']) && $_GET['task'] !=""){
    $task = $_GET['task'];
}
$key = 'abcdefghijklmnopqrstuvwxyz1234567890';

if('key' == $task){
    $key_original = str_split($key);
    shuffle($key_original);
    $key = join('',$key_original);
}else if(isset($_POST['key']) && $_POST['key'] != ""){
    $key = $_POST['key'];
}

// for encode

$scramblerData = "";
if('encode' == $task){
    $data = $_POST['data']??"";
    // echo $data.PHP_EOL;
    
    
    if($data != ""){
        $scramblerData = scrambleData($data,$key);
        // echo "<br>Calling Encode";

    }

}

if('decode' == $task){
    $data = $_POST['data'] ?? "";
    if($data != ""){
        $scramblerData = decodeData($data,$key);
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <title>Data Scrambler</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h2>Data Scrambler</h2>
                <p>Use this application to scramble you data</p>

                <p>
                <a href="scrambler.php?task=encode">Encode</a> |
                <a href="scrambler.php?task=decode">Decode</a> |
                <a href="scrambler.php?task=key">Generate Key</a>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="column column-60 column-offset-20">
                <form action="scrambler.php<?php if('decode' == $task) echo "?task=decode"; ?>" method="POST">
                    <label for="key">Key</label>
                    <input type="text" name="key" id="key" <?php displayKey($key); ?>>

                    <label for="data">Data</label>
                    <textarea name="data" id="data"><?php if(isset($_POST['data'])){echo $_POST['data'];}?></textarea>

                    <label for="result">Result</label>
                    <textarea name="result" id="result"><?php echo $scramblerData;?></textarea>

                    <button type="submit">Do It For Me</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>