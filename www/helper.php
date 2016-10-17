<?php

/*
$url = "https://secure.payzen.eu/api-payment/V3/";
$privateKey = "64374898:testprivatekey_DEMOPRIVATEKEY23G4475zXZQ2UA5x7M";
$publicKey = "64374898:testpublickey_DEMOPUBLICKEY95me92597fd28tGD4r5";
*/

/*
$url = 'https://payzen-q09.lyra-labs.fr/api-payment/V3/';
$privateKey = "71976039:testprivatekey_WPgLoHeAqL1tSz8kc4PqSSXWSnfwTXG0HGfW2pLjeGiq7";
$publicKey = "71976039:testpublickey_mLlNmVp56QpFslqof8qEE813DGbwlFWv3ypqmfOVxRscV";
*/

$url = 'https://payzen-q09.lyra-labs.fr/api-payment/V3/';
$privateKey = "demo:testprivatekey_DEMOPRIVATEKEY23G4475zXZQ2UA5x7M";
$publicKey = "demo:testpublickey_DEMOPUBLICKEY95me92597fd28tGD4r5";

function getJson($ws, $data)
{
    global $url, $privateKey;

    $data_string = json_encode($data);
    $url .= $ws;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_USERPWD, $privateKey);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $result = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($result, true);

    if ($result['status'] != 'SUCCESS') {
        die("can't get form Token:" . $result['answer']['code'] . ":" . $result['answer']['message']);
    }

    return $result;
}