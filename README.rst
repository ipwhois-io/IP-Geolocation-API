**************************
IP Geolocation API - PHP SDK
**************************

Overview
============
Use the IP_Geolocation_API_ to quickly and simply integrate IP geolocation into your script or website. Save yourself the hassle of setting up local GeoIP libraries and having to remember to regularly update the data. You can use ipwhois.io to filter out bot traffic, customize content based on visitor's location, display full country names, perform bulk IP geolocation, and more.

.. _IP Geolocation API: https://ipwhois.io


Quick Start Guide
============

You can call the API by sending HTTP ``GET requests`` to:

.. code:: console

  http://free.ipwhois.io/json/{IP}

``{IP}`` can be an IPv4 or IPv6 address, or none to use the current IP address.

Note: Complete documentation to use this SDK is also available at IP_Geolocation_Documentation_.

.. _IP Geolocation Documentation: https://ipwhois.io/documentation


Basic Usage
============
Call method 

.. code:: php

  get_ipwhois($ip, $format, $lang)
  
passing IP address as parameters (rest of the parameters are optional) and it will return the Geolocation for the passed IP address.


Example
============

.. code:: php

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
