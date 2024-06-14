<?php
if (!empty($_POST['text1']) && !empty($_POST['text2']) && !empty($_POST['text3']) && !empty($_POST['text4'])) {
    if (isset($_POST['desc'])) {
        $text1 = $_POST['text1'];
        $text2 = $_POST['text2'];
        $text3 = $_POST['text3'];
        $text4 = $_POST['text4'];

        $sum = [$text1, $text2, $text3, $text4];

        $count = count($sum);
        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if ($sum[$i] < $sum[$j]) {
                    $temp = $sum[$i];
                    $sum[$i] = $sum[$j];
                    $sum[$j] = $temp;
                }
            }
        }
    }
    if (isset($_POST['asc'])) {
        $text1 = $_POST['text1'];
        $text2 = $_POST['text2'];
        $text3 = $_POST['text3'];
        $text4 = $_POST['text4'];

        $sum = [$text1, $text2, $text3, $text4];

        $count = count($sum);
        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if ($sum[$i] > $sum[$j]) {
                    $temp = $sum[$i];
                    $sum[$i] = $sum[$j];
                    $sum[$j] = $temp;
                }
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>しょうじゅんこうじゅん</title>
</head>

<body>

    <form method="post" action="index.php">
        <textarea name="text1"><?php if (isset($_POST['text1'])) echo htmlspecialchars($_POST['text1'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        <textarea name="text2"><?php if (isset($_POST['text2'])) echo htmlspecialchars($_POST['text2'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        <textarea name="text3"><?php if (isset($_POST['text3'])) echo htmlspecialchars($_POST['text3'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        <textarea name="text4"><?php if (isset($_POST['text4'])) echo htmlspecialchars($_POST['text4'], ENT_QUOTES, 'UTF-8'); ?></textarea><br>
        <input type="submit" name="desc" value="降順">
        <input type="submit" name="asc" value="昇順">
    </form>
    <p>
        <?php
        if (!empty($sum)) {
            foreach ($sum as $k) {
                echo $k;
            }
        }
        ?></p>
</body>

</html>