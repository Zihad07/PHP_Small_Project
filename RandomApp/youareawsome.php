<?php

include_once("array_delete.php");

$colors = array(
    '#ff0000',
    '#00ff00',
    '#0000ff',
    '#000000',
    '#ffffff',
    '#f0f0f0',
);

$words = array('Genius',"Awesome","Amazing","Liar","Good Soul","Blessing");

$colors_count = count($colors);

$bgColor = $colors[rand(0,$colors_count-1)];
// textColor list excep bgColor
$textColoList = arrayDelete($bgColor,$colors);
$textColor = $textColoList[rand(0,count($textColoList)-1)];

// while ($bgColor == $textColor){
//     $bgColor = $colors[rand(0,$colors_count-1)];
//     $textColor = $colors[rand(0,$colors_count-1)];
// }



$fontSize = (100 + rand(0,20)*5);

$aligns = array('center','left','right','justify');
$textAlign = $aligns[rand(0,3)];

$styles = array('bold','italic','underline','uppercase');
$style = $styles[rand(0,3)];


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
      background: <?php echo $bgColor ?>;
      color: <?php echo $textColor;?>;
      font-size: <?php echo $fontSize;?>px;
      text-align: <?php echo $textAlign;?>;

      <?php

      switch($style){
          case 'bold':
            echo "font-weight: bold";
            break;
        case 'italic':
            echo "font-style: italic";
            break;
        case 'underline':
            echo "text-decoration: underline";
            break;
        case 'uppercase':
            echo "text-transform: uppercase";
            break;
        
      }
      ?>

    }

  

    
   
  	</style>
  </head>
  <body>

    <div class="container">
        <div class="row">
            <div class="col">
                <p>You Are a <?php echo $words[rand(0,count($words)-1)];?></p>
            </div>
        </div>
    </div>

    
    
    <!-- JS files: jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
