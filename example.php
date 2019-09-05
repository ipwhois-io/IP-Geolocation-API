<?php
    require_once('ip-geolocation-api.php');  
    $ip = "8.8.4.4"; // CLIENT IPADDRESS
    $location = get_ipwhois($ip);
    $decodedLocation = json_decode($location, true);
    
    echo "<pre>";
    print_r($decodedLocation);
    echo "</pre>";
?>
