<?php
$proxy = 'http://fixie:rnOjMCQkPajq457@velodrome.usefixie.com:80';
$proxyauth = 'http://fixie:rnOjMCQkPajq457@velodrome.usefixie.com:80';
$access_token = '+wkE0LfTqTxn8HRBs+HnkoM2FOHGmZhpbVl+Vm13Y0ZsW1Yplfj8UXibnizUAZYABL49/J9Q0AXoNMyurJI8xb1B3lbdEfzaFFU8fZAQ4jVvPLT5m9VNNm1pG3WsjCGHgn5nHb35NHH1vY3FxFr3OQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;