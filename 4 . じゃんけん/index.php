<?php
session_start();

$hands = ['ぐー', 'ちょき', 'ぱー'];

if (!isset($_SESSION['winCnt'])) {
    $_SESSION['winCnt'] = 0;
    $_SESSION['show_message'] = "";

}
// var_dump($hands);
// exit;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $yourHand = isset($_POST['hand']) ? $_POST['hand'] : ''; // 存在するか。空じゃないか
    $key =array_rand($hands);
    $computerHand = $hands[$key];
    
    if ($yourHand === $computerHand) {
        $result = "あいこ";
        $_SESSION['winCnt'] = 0;
        $_SESSION['show_message'] = "";
    }
    
    elseif (($yourHand == ['ぐー'] && $computerHand == ['ちょき']) ||
            ($yourHand == ['ちょき'] && $computerHand == ['ぱー']) ||
            ($yourHand == ['ぱー'] && $computerHand == ['ぐー']))
    {
        $result = "勝ち！！";
        $_SESSION['winCnt']++;
        if ($_SESSION['winCnt'] > 2) {
            if (rand(1, 3) == 1) {
                $_SESSION['show_message'] = 'あなたの勝ち！！';
            }
            else {
                $_SESSION['show_message'] = 'ざんねん。';
            }
        }
        else {
            $_SESSION['show_message'] = "";
        }
    }
    else {
        $result = "負けました。";
        $_SESSION['winCnt'] = 0;
        $_SESSION['show_message'] = "";
    }
}
// var_dump($computerHand);
// var_dump($yourHand);
// exit;
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
        <input type="radio" name="hand" value="ぐー" require>ぐー
        <input type="radio" name="hand" value="ちょき">ちょき
        <input type="radio" name="hand" value="ぱー">ぱー<br>
        <input type="submit" value="ふぁいと！！">
    </form>
    <?php echo $result ?><br>
    <?php echo $yourHand ?><br>
    <?php echo $computerHand ?><br>
    <?php echo $_SESSION['winCnt'] ?><br>
    <?php echo $_SESSION['show_message'] ?>
</body>
</html>