<?php
session_start();

$hands = ['ぐー', 'ちょき', 'ぱー'];

if (!isset($_SESSION['winCnt'])) {
    $_SESSION['winCnt'] = 0;
    $_SESSION['show_message'] = "";
}

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $yourHand = isset($_POST['hand']) ? $_POST['hand'] : '';
    $key = array_rand($hands);
    $computerHand = $hands[$key];

    if ($yourHand == $computerHand) {
        $result = 'あいこ';
        $_SESSION['winCnt'] = 0;
    } elseif (
        ($yourHand == 'ぐー' && $computerHand == 'ちょき') ||
        ($yourHand == 'ちょき' && $computerHand == 'ぱー') ||
        ($yourHand == 'ぱー' && $computerHand == 'ぐー')
    ) {
        $result = '勝ち';
        $_SESSION['winCnt']++;
        if ($_SESSION['winCnt'] >= 2) {
            if (rand(1, 3) == 1) {
                $_SESSION['show_message'] = 'おめでとう！';
            } else {
                $_SESSION['show_message'] = 'ざんねん。';
            }
        } else {
            $_SESSION['show_message'] = "";
        }
    } else {
        $result = '負けました。';
        $_SESSION['winCnt'] = 0;
        $_SESSION['show_message'] = "";
    }
} else {
    unset($_SESSION['hand']);
    $_SESSION['show_message'] = "";
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
    <?php if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') { ?>
        <p>あなた：<?php echo htmlspecialchars($yourHand, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>あいて：<?php echo htmlspecialchars($computerHand, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>けっか：<?php echo htmlspecialchars($result, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php if ($_SESSION['show_message']) { ?>
            <p><?php echo htmlspecialchars($_SESSION['show_message'], ENT_QUOTES, 'UTF-8'); ?></p>
            <?php $_SESSION['show_message'] = "" ?>
        <?php } ?>
    <?php } ?>
    <form method="post">
        <label>ぐー<input type="radio" name="hand" value="ぐー" <?php if ((isset($yourHand) && $yourHand == 'ぐー')) echo 'checked'; ?> required></label>
        <label>ちょき<input type="radio" name="hand" value="ちょき" <?php if ((isset($yourHand) && $yourHand == 'ちょき')) echo 'checked'; ?> required></label>
        <label>ぱー<input type="radio" name="hand" value="ぱー" <?php if ((isset($yourHand) && $yourHand == 'ぱー')) echo 'checked'; ?> required></label>
        <input type="submit" value="しょうぶ！！">
    </form>
</body>
</html>