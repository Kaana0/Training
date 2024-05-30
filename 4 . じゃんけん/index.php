<?php
session_start();

$hands = ['ぐー', 'ちょき', 'ぱー'];

if (!isset($_SESSION['winCnt'])) {
    $_SESSION['winCnt'] = 0;
    $_SESSION['show__message'] ="";
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>じゃんけんゲーム</title>
</head>
<body>
    <h1>じゃんけんゲーム</h1>
    <form method="post">
        <input type="radio" name="hand" value="ぐー" required>ぐー<br>
        <input type="radio" name="hand" value="ちょき" required>ちょき<br>
        <input type="radio" name="hand" value="ぱー" required>ぱー<br>
        <button type="submit">しょうぶ！！</button>
    </form>
</body>
</html>