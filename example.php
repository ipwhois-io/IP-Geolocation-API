<?php
    require_once('function_ipwhois.php');  
    $ip = "8.8.4.4"; // CLIENT IPADDRESS
    $location = get_ipwhois($ip,'json','en','');

    echo "<pre>";
    print_r($location);
    echo "</pre>";
?>
