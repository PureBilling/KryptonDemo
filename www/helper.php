<?php

function getJson($ws, $data)
{
    $data_string = json_encode($data);

    $ch = curl_init('https://payzen-q09.lyra-labs.fr/pbproxy/V3/' . $ws);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_USERPWD, "demo:testprivatekey_DEMOPRIVATEKEY23G4475zXZQ2UA5x7M");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $result = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($result, true);

    if ($result['status'] != 'success') {
        die("can't get form Token:" . $result['answer']['code'] . ":" . $result['answer']['message']);
    }

    return $result;
}