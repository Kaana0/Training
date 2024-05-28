<?php
// じゃんけんの配列
$hands = ['ぐー', 'ちょき', 'ぱー'];

// handが送信されたら
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 相手の手
    $yourHand = isset($_POST['hand']) ? $_POST['hand'] : '';

    // コンピューターの手
    $key = array_rand($hands);
    $windowsHand = $hands[$key];

    // 勝ち負けの判定
    if ($yourHand == $windowsHand) {
        $result = 'あいこ';
    } elseif ($yourHand == 'ぐー' && $windowsHand == 'ちょき') {
        $result = '勝ち';
    } elseif ($yourHand == 'ちょき' && $windowsHand == 'ぱー') {
        $result = '勝ち';
    } elseif ($yourHand == 'ぱー' && $windowsHand == 'ぐー') {
        $result = '勝ち';
    } else {
        $result = '負け';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>じゃんけんげーむ</title>
</head>
<body>
    <h1>じゃんけん勝負</h1>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
        <dl>
            <dt>自分：<?php echo htmlspecialchars($yourHand, ENT_QUOTES, 'UTF-8'); ?></dt>
            <dt>相手：<?php echo htmlspecialchars($windowsHand, ENT_QUOTES, 'UTF-8'); ?></dt>
            <dt>結果：<?php echo htmlspecialchars($result, ENT_QUOTES, 'UTF-8'); ?></dt>
        </dl>
    <?php } ?>

    <form method="post">
        <label> ぐー <input type="radio" name="hand" value="ぐー" required></label>
        <label> ちょき <input type="radio" name="hand" value="ちょき" required></label>
        <label> ぱー <input type="radio" name="hand" value="ぱー" required></label>
        <input type="submit" value="勝負">
    </form>
</body>
</html>
