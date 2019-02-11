<?php
    $ip = "CLIENT_IP_ADDRESS";
    $location = get_ipwhois($ip);
    $decodedLocation = json_decode($location, true);
    
    echo "<pre>";
    print_r($decodedLocation);
    echo "</pre>";

    function get_ipwhois($ip, $format = "json", $lang = "en") {
        $url = "http://free.ipwhois.io/".$format."/".$ip."?lang=".$lang;
        $cURL = curl_init();

        curl_setopt($cURL, CURLOPT_URL, $url);
        curl_setopt($cURL, CURLOPT_HTTPGET, true);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        return curl_exec($cURL);
    }
?>
