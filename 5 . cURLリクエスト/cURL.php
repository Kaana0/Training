<?php 
$ch = curl_init("https://umayadia-apisample.azurewebsites.net/api/persons");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
if ($result = curl_exec($ch)) {
    $data = json_decode($result, true)['data'] ?? [];
    foreach ($data as $person) {
        echo "名前：{$person['name']}<br>
              ノート：{$person['note']}<br>
              年齢：{$person['age']}<br>
              登録日：{$person['registerDate']}<br>
              <p></p>";
    } 
} else {
    echo curl_error($ch);
}
curl_close($ch);
?>