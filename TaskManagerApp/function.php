<?php 

   function mytime($date){
       $timeStamp = strtotime($date);
       $date = date("jS M,Y",$timeStamp);

       return $date;
   }


?>