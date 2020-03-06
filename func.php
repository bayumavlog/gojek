<?php


function request($url, $token = null, $data = null, $pin = null){


    





$header[] = "Host: api.gojekapi.com";


$header[] = "User-Agent: okhttp/3.10.0";


$header[] = "Accept: application/json";


$header[] = "Accept-Language: en-ID";


$header[] = "Content-Type: application/json; charset=UTF-8";


$header[] = "X-AppVersion: 3.46.1";


$header[] = "X-UniqueId: 106605982657".mt_rand(1000,9999);


$header[] = "Connection: keep-alive";    


$header[] = "X-AppVersion: 3.30.2";


$header[] = "X-UniqueId: ".time()."57".mt_rand(1000,9999);


$header[] = "Connection: keep-alive";


$header[] = "X-User-Locale: en_ID";


$header[] = "X-Location: -6.6056797,106.7957953";


$header[] = "X-Location-Accuracy: 3.0";


//$header[] = "X-Location: -6.3894201,106.0794195";


//$header[] = "X-Location-Accuracy: 3.0";


if ($pin):


$header[] = "pin: $pin";    


$header[] = "pin: $pin";


    endif;


if ($token):


$header[] = "Authorization: Bearer $token";

@@ -29,11 +29,6 @@ function request($url, $token = null, $data = null, $pin = null){


    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);


    curl_setopt($c, CURLOPT_HEADER, true);


    curl_setopt($c, CURLOPT_HTTPHEADER, $header);


    if ($socks):


          curl_setopt($c, CURLOPT_HTTPPROXYTUNNEL, true); 


          curl_setopt($c, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5); 


          curl_setopt($c, CURLOPT_PROXY, $socks);


        endif; 


    $response = curl_exec($c);


    $httpcode = curl_getinfo($c);


    if (!$httpcode)

@@ -45,5 +40,10 @@ function request($url, $token = null, $data = null, $pin = null){


    $json = json_decode($body, true);


    return $json;


}





function save($filename, $content)


{


	$save = fopen($filename, "a");


	fputs($save, "$content\r\n");


	fclose($save);


}
}?
