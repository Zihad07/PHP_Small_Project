
<?php
function displayKey( $key ) {
    printf( " value = '%s' ", $key );
}

function scrambleData($orginalData, $key){
    $originalKey = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $data = "";
    $length = strlen($orginalData);

    for($index=0; $index<$length; $index++){
        $currentChar = $orginalData[$index];
        $postion = strpos($originalKey,$currentChar);

        if($postion !== false){
            $data .= $key[$postion];
        }else{
            $data .= $currentChar;
        }
    }

    // return ecode data
    return $data;
}

function decodeData($orginalData,$key){
    $originalKey = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $data = "";
    $length = strlen($orginalData);
    for($index=0; $index<$length; $index++){
        $currentChar = $orginalData[$index];
        $postion = strpos($key,$currentChar);

        if($postion !== false){
            $data .= $originalKey[$postion];
        }else{
            $data .= $currentChar;
        }
    }

    return $data;

}
?>