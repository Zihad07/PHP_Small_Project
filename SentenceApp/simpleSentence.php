<?php

// return a random element from the  array

function pickRandom($array){
    return $array[array_rand($array)];
}

$subjects = array('Nahid','You\'r Friend Sara',"My neighbor's cat",'Some dumb programmer');
$verbs = array('needs','wants','ate','built','destroyed');
$objects = array('a website','a bath','a large pizza','three kittens','a new bicycle');


// $fragments = array(
//     'ate your lunch',
//     'done your task',
//     'called your cellphone'
// );

// $index = array_rand($fragments);

$sentence = pickRandom($subjects)." ".pickRandom($verbs)." ".pickRandom($objects);



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Random Color</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  	<style type="text/css">
    body {
    	margin: 10px;
    	padding: 0;
        font-size: 4rem;
        background: #eee;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
     

    }

  

    
   
  	</style>
  </head>
  <body>

    <div class="container">
        <div class="row">
            <div class="col">
                <p><a href=""><?php echo $sentence;?></a></p>
            </div>
        </div>
    </div>

    
    
    <!-- JS files: jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
