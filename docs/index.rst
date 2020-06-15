**************************
ipwhois.io | IP Geolocation API - PHP SDK
**************************

Overview
============

This `IP Geolocation API <https://ipwhois.io>`_ service is designed for quick and easy visitors IP geolocation integration into your script or website. Get rid of setting up local GeoIP libraries and forget about regular updates. Our neural network analyzes dozens of sources and almost real-time updates the database.

Quick Start Guide
============

You can call the API by sending HTTP ``GET requests`` to:

.. code:: console

  http://ipwhois.app/json/{IP}

``{IP}`` can be an IPv4 or IPv6 address, or none to use the current IP address.

Note: Complete documentation to use this SDK is also available at https://ipwhois.io/documentation


Basic Usage
============
Call method 

.. code:: console

  get_ipwhois($ip, $format, $lang, $apiKey)
  
passing IP address as parameters (rest of the parameters are optional) and it will return the Geolocation for the passed IP address.


Example
============

.. code:: php

  <?php
      $ip = "8.8.4.4"; // CLIENT_IP_ADDRESS;
      $location = get_ipwhois($ip,'json','en','');

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
