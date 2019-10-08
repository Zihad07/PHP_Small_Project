<?php

// delete a value from an array using array_diff

function arrayDelete($value,$array){
    // make sure 2nd argument is an array
    return array_diff($array,array($value));
}