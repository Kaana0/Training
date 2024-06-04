<?php
// セッションの開始
session_start();

$hands =  ['ぐー', 'ちょき', 'ぱー'];

// セッションの初期化
if (!isset($_SESSION['winCnt'])) {
    $_SESSION['winCnt'] = 0;
    $_SESSION['show_message'] = "";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // あなた
    $yourHand = isset($_POST['hand']) ? $_POST['hand'] : '';
    $_SESSION['hand'] = $yourHand;
    // あいて
    $key = array_rand($hands);
    $computerHand = $hands[$key];
    // 勝敗の判定
    if ($yourHand == $computerHand) {
        $result = 'あいこ';
        $_SESSION['winCnt'] = 0;
    } elseif (($yourHand == 'ぐー' && $computerHand == 'ちょき') ||
              ($yourHand == 'ちょき' && $computerHand == 'ぱー') ||
              ($yourHand == 'ぱー' && $computerHand == 'ぐー')
    ) {
        $result = 'かち';
        $_SESSION['winCnt']++;
        if ($_SESSION['winCnt'] >= 2) {
            if (rand(1, 3) == 1) {
                $_SESSION['show_message'] = "おめでとう！";
            } else {
                $_SESSION['show_message'] = "ざんねん。";
            }
            $_SESSION['show_message'] = "";
        }
    } else {
        $result = '負け';
        $_SESSION['winCnt'] = "";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>じゃんけんげーむ</title>
</head>
<body>
    <h1>じゃんけんしょうぶ</h1>
    <div>
        <p>あなた：<?php echo htmlspecialchars($yourHand, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>あいて：<?php echo htmlspecialchars($computerHand, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>けっか：<?php echo htmlspecialchars($result, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <p>おめでとう！</p>
    <form method="post">
        <label>ぐー<input type="radio" name="hand" value="ぐー" <?php if (isset($_SESSION['hand']) && $_SESSION['hand'] == 'ぐー') echo 'checked'; ?> required></label>
        <label>ちょき<input type="radio" name="hand" value="ちょき" <?php if (isset($_SESSION['hand']) && $_SESSION['hand'] == 'ちょき') echo 'checked'; ?> required></label>
        <label>ぱー<input type="radio" name="hand" value="ぱー" <?php if (isset($_SESSION['hand']) && $_SESSION['hand'] == 'ぱー') echo 'checked'; ?> required></label>
        <input type="submit" value="しょうぶ">
    </form>
</body>
</html>