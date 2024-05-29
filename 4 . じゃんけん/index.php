<?php
session_start();

$hands = ['ぐー', 'ちょき', 'ぱー'];

if (!isset($_SESSION['winCnt'])) {
    $_SESSION['winCnt'] = 0;
    $_SESSION['show_message'] = false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $yourHand = isset($_POST['hand']) ? $_POST['hand'] : '';
    $_SESSION['hand'] = $yourHand;

    $key = array_rand($hands);
    $computerHand = $hands[$key];

    if ($yourHand == $computerHand) {
        $result = 'あいこ';
        $_SESSION['winCnt'] = 0;
    } elseif (($yourHand == 'ぐー' && $computerHand == 'ちょき') ||
              ($yourHand == 'ちょき' && $computerHand == 'ぱー') ||
              ($yourHand == 'ぱー' && $computerHand == 'ぐー')) {
                $result = '勝ち';
                $_SESSION['winCnt']++;
                if ($_SESSION['winCnt'] >= 2) {
                    if (rand(1, 3) == 1) {
                        $_SESSION['show_message'] = true;
                    }
                    $_SESSION['winCnt'] = 0;
                }
              } else {
                $result = '負け';
                $_SESSION['winCnt'] = 0;
              }
} else {
    unset($_SESSION['hand']);
    $_SESSION['show_massaga'] = false;
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
        <input type="radio" name="hand" value="">ぐー<br>
        <input type="radio" name="hand" value="">ちょき<br>
        <input type="radio" name="hand" value="">ぱー<br>
        <button type="submit">しょうぶ！！</button>
    </form>
</body>
</html>