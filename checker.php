<?php
require __DIR__ . '/vendor/autoload.php';

use Goutte\Client;

$client = new Client();

$css = "#theForm > div.fboxbody > div.form > span";
$baseURL = "http://data.kpu.go.id/ss8.php?cmd=cari&nik=";
$nik = 'hereniktocheck';

$resultArr = array();
$crawler = $client->request('GET', $baseURL.$nik);
$raw = $crawler
	->filter($css)
	->extract(array("_text"));

for ($i=0; $i <= count($raw)-2; ) { 
	$resultArr[$raw[$i]] = $raw[$i+1];
	$i += 2;
}

print_r($resultArr);