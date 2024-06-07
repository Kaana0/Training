<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://umayadia-apisample.azurewebsites.net/api/persons',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_FOLLOWLOCATION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

if ($response === false) {
    $error = curl_error($curl);
    echo "cURL Error: $error";
} else {
    $data = json_decode($response, true);
    if ($data && isset($data['success']) && $data['success'] === true && isset($data['data'])) {
        foreach($data['data'] as $person) {
            // var_dump($person);
            // exit;
            echo "名前：{$person['name']}<br>";
            echo "ノート：{$person['note']}<br>";
            echo "年齢：{$person['age']}<br>";
            echo "登録日：{$person['registerDate']}<br>";
        }
    }
}

?>