<?php
$hands = ['ぐー', 'ちょき', 'ぱー'];
$winCnt = 0;
$show_message = "";
$result = "";

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $yourHand = isset($_POST['hand']) ? $_POST['hand'] : '';
    $winCnt = isset($_POST['winCnt']) ? (int)$_POST['winCnt'] : 0;
    $key = array_rand($hands);
    $computerHand = $hands[$key];

    if ($yourHand == $computerHand) {
        $result = 'あいこ';
        $winCnt = 0;
    } elseif (($yourHand == 'ぐー' && $computerHand == 'ちょき') ||
              ($yourHand == 'ちょき' && $computerHand == 'ぱー') ||
              ($yourHand == 'ぱー' && $computerHand == 'ぐー')) {
        $result = '勝ち';
        $winCnt++;
        if ($winCnt >= 2) {
            if (rand(1, 3) == 1) {
                $show_message = 'がんばったね！';
            } else {
                $show_message = 'もっとがんばろう。。';
            }
        } else {
            $show_message = "";
        }
    } else {
        $result = '負け';
        $winCnt = 0;
        $show_message = "";
    }
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
    <h1>じゃんけん勝負</h1>
    <?php if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <p>自分：<?php  echo htmlspecialchars($yourHand, ENT_QUOTES, 'UTF-8'); ?></p>
    <p>相手：<?php echo htmlspecialchars($computerHand, ENT_QUOTES, 'UTF-8'); ?></p>
    <p>結果：<?php echo htmlspecialchars($result, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php if ($show_message) {?>
        <p><?php echo htmlspecialchars($show_message, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php } ?>
    <?php } ?> 
    <form method="post">
        <label><input type="radio" name="hand" value="ぐー" <?php if (isset($yourHand) && $yourHand == 'ぐー') echo 'checked'; ?> required>ぐー</label>
        <label><input type="radio" name="hand" value="ちょき" <?php if (isset($yourHand) && $yourHand == 'ちょき') echo 'checked'; ?> required>ちょき</label>
        <label><input type="radio" name="hand" value="ぱー" <?php if (isset($yourHand) && $yourHand == 'ぱー') echo 'checked'; ?> required>ぱー</label>
        <input type="hidden" name="winCnt" value="<?php echo htmlspecialchars($winCnt, ENT_QUOTES, 'UTF-8'); ?>">
        <input type="submit" value="勝負！！" >
    </form>
</body>
</html>