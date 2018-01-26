<?php
header('Access-Control-Allow-Origin: *');
if (!isset($_GET['url'])) return 'empty url';
if (isset($_GET['dev'])) { echo $_GET['url']; return; }

ini_set('memory_limit', '512M');

$url = 'http' . $_GET['url'];
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$data = curl_exec($ch);
curl_close($ch);
echo $data;

