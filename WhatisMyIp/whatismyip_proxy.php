<?php
// Return first forward IP match it finds

function forwarded_ip(){

    // for testing 
    $server = array(
        // 'HTTP_X_FORWARDED_FOR'=> "0.0.0.0,1sd.1.2.3",
    // 'HTTP_X_FORWARDED' => "jlaldjfl,99adf,123.123.123.123,1.2.4.4",
    
    );

    $keys = array(
    'HTTP_X_FORWARDED_FOR', 
    'HTTP_X_FORWARDED', 
    'HTTP_FORWARDED_FOR', 
    'HTTP_FORWARDED',
    'HTTP_CLIENT_IP', 
    'HTTP_X_CLUSTER_CLIENT_IP',
    );

    foreach($keys as $key){
        if(isset($_SERVER[$key])){
            $ip_array = explode(",",$_SERVER[$key]);

            foreach($ip_array as $ip){
                $ip = trim($ip);
                if(validate_ip($ip)){
                    return $ip;
                }
            }
        }
    }

    return "";

}
$remote_ip = $_SERVER['REMOTE_ADDR'];
// $forwarded_ip = forwarded_ip();
$forwarded_ip = "197.198.0.1";


function validate_ip($ip){
    if (filter_var($ip,FILTER_VALIDATE_IP,FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)){
        // for valid
        return true;
    }
    // not valid
    return false;
}
?>

<!-- Remote IP Address: <?php echo $remote_ip; ?> <br><br>
<?php if($forwarded_ip != '') {?>
    Forwarded For : <?php echo $forwarded_ip; ?> 
    <br><br>
<?php }?> -->


