<?php

require_once('database/db.php');

//для GET запроса
/*$login = 'dmitridad2011@list.ru';
$pass = 'OieQzx1';
$data = file_get_contents("https://mixtech.dev/neiro-bit/beeline/?LOGIN=$login&PASSWORD=$pass");*/

$ch = curl_init();
$url = 'https://mixtech.dev/neiro-bit/beeline/';
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
  'LOGIN'=>'dmitridad2011@list.ru',
  'PASSWORD'=>'OieQzx1',
));

$data = curl_exec($ch);
curl_close($ch);

$data = (json_decode($data, true));
$beeline_value = $data['data']['BEELINE_VALUE'];
$mf_value = $data['data']['MF_VALUE'];
$mts_value = $data['data']['MTS_VALUE'];
$time_key = $data['data']['TIME_KEY'];

$dbObj = new Database();
$insertResult = $dbObj->makeInsert("INSERT INTO charts_data(beeline_value, mf_value, mts_value, time_key)
				VALUES ('$beeline_value', '$mf_value', '$mts_value', '$time_key')");