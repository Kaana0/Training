<?php 
$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL          => "https://umayadia-apisample.azurewebsites.net/api/persons",
    CURLOPT_RETURNTRANSFER => true
]);
$result = curl_exec($ch);

if (curl_error($ch)) {
    $error = curl_error($ch);
    echo $error;
} else {
    $data = json_decode($result, true);
    if ($data && isset($data['success']) && $data['success'] === true && isset($data['data'])) {
        foreach($data['data'] as $person) {
            echo "名前：{$person['name']}<br>";
            echo "ノート：{$person['note']}<br>";
            echo "年齢：{$person['age']}<br>";
            echo "登録日：{$person['registerDate']}<br>";
            echo "<p></p>";
        }
    }
}
curl_close($ch);
?>