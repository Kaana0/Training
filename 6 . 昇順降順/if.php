<?php
if (!empty($_POST['text1']) && !empty($_POST['text2']) && !empty($_POST['text3'])) {
    $text1 = $_POST['text1'];
    $text2 = $_POST['text2'];
    $text3 = $_POST['text3'];

    $koujun = [];

    if ($text1 > $text2) {
        if ($text1 < $text3) {
            $koujun[0] = $text3;
        } elseif ($text1 > $text3) {
            $koujun[0] = $text1;
            $koujun[1] = $text3;
        }
        if ($text2 < $text3) {
            if ($text1 < $text3) {
                $koujun[1] = $text1;
            }
        }
        $koujun[2] = $text2;
    } elseif ($text1 < $text2) {
        if ($text2 > $text3) {
            $koujun[0] = $text2;
            if ($text1 < $text3) {
                $koujun[1] = $text3;
                $koujun[2] = $text1;
            } elseif ($text1 > $text3) {
                $koujun[1] = $text1;
                $koujun[2] = $text3;
            }
        } elseif ($text3 > $text2) {
            $koujun[0] = $text3;
            if ($text2 > $text1) {
                $koujun[1] = $text2;
                $koujun[2] = $text1;
            } elseif ($text2 < $text1) {
                $koujun[1] = $text1;
                $koujun[2] = $text2;
            }
        }
    } else {
        if ($text1 > $text3) {
            $koujun[0] = $text1;
            $koujun[1] = $text2;
            $koujun[2] = $text3;
        } elseif ($text1 < $text3) {
            $koujun[0] = $text3;
            $koujun[1] = $text1;
            $koujun[2] = $text2;
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
        <textarea name="text1" value="<?php if (isset($_POST['text1'])) echo $text1; ?>"></textarea>
        <textarea name="text2"></textarea>
        <textarea name="text3"></textarea><br>
        <input type="submit" value="送信">
    </form>
    <p>
        <?php
        if (!empty($koujun)) {
            foreach ($koujun as $k) {
                echo $k;
            }        
        }
        ?></p>

</body>

</html>