<?php
    function get_ipwhois($ip, $format = "json", $lang = "en", $apiKey = "") {
        $url = "http://".($apiKey != '' ? 'ipwhois.pro' : 'free.ipwhois.io')."/".$format."/".$ip."?lang=".$lang.($apiKey != '' ? '&key='.$apiKey : '');
        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $url);
        curl_setopt($cURL, CURLOPT_HTTPGET, true);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        return json_decode(curl_exec($cURL),true);
    }
?>
