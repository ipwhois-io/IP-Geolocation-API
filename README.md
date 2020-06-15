<h1>IP Geolocation API  - PHP SDK</h1>

<h2>Overview</h2>

This <a href="https://ipwhois.io">IP Geolocation API</a> service is designed for quick and easy visitors IP geolocation integration into your script or website. Get rid of setting up local GeoIP libraries and forget about regular updates. Our neural network analyzes dozens of sources and almost real-time updates the database.

<h2>Quick Start Guide</h2>

You can call the API by sending HTTP GET requests to <code>http://ipwhois.app/json/{IP}</code>

<code>{IP}</code> can be an IPv4 or IPv6 address, or none to use the current IP address.

<strong>Note:</strong> Complete documentation to use this API is also available at <a href="https://ipwhois.io/documentation">IP Geolocation API Documentation</a>.

<h2>System Requirements</h2>

Internet connection is required to run this component.

<h2>Basic Usage</h2>

Call method <code><strong>get_ipwhois($ip, $format, $lang, $apiKey)</strong></code> passing IP address as parameters (rest of the parameters are optional) and it will return the Geolocation for the passed IP address. To customize the geolocation response, you can pass the other parameters to <code><strong>get_ipwhois()</strong></code> method as described below:

<ul>
<li>
<p><strong>$format</strong></p>
Based on your choice, the ipwhois API can deliver results in:
  <ul><li>json (default)</li><li>xml</li><li>line</li></ul>
</li>
  
<li>
<p><strong>$lang</strong></p>
Pass the language parameter to get the geolocation information in a language other than English. By default, it is set to English language.<br>
ipwhois provides response in the following languages:
  
<ul>
<li>en -	English (default)</li>
<li>de -	Deutsch (German)</li>
<li>es -	Español (Spanish)</li>
<li>pt-BR -	Español - Argentina (Spanish)</li>
<li>fr -	Français (French)</li>
<li>ja -	日本語 (Japanese)</li>
<li>zh-CN -	中国 (Chinese)</li>
<li>ru -	Русский (Russian)</li>
</ul>
 
</li>
</ul>

<h2>Example</h2>

```php
<?php
    $ip = "8.8.4.4"; // CLIENT IPADDRESS
    $apiKey = ""; // Leave blank for free endpoint
    $location = get_ipwhois($ip,'json','en',$apiKey);
    
    echo "<pre>";
    print_r($location);
    echo "</pre>";

    function get_ipwhois($ip, $format = "json", $lang = "en", $apiKey = "") {
        $url = "http://".($apiKey != '' ? 'ipwhois.pro' : 'ipwhois.app')."/".$format."/".$ip."?lang=".$lang.($apiKey != '' ? '&key='.$apiKey : '');
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
```
