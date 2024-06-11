<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>昇順降順</title>
</head>
<body>
    <h1>クイックソートで並び替え</h1>
    <form method="post">
        <input type="text" name="text1" value="<?php echo isset($_POST['text1']) ? htmlspecialchars($_POST['text1'], ENT_QUOTES) : ''; ?>">
        <input type="text" name="text2" value="<?php echo isset($_POST['text2']) ? htmlspecialchars($_POST['text2'], ENT_QUOTES) : ''; ?>">
        <input type="text" name="text3" value="<?php echo isset($_POST['text3']) ? htmlspecialchars($_POST['text3'], ENT_QUOTES) : ''; ?>">
        <input type="text" name="text4" value="<?php echo isset($_POST['text4']) ? htmlspecialchars($_POST['text4'], ENT_QUOTES) : ''; ?>">
        <p></p>
        <input type="submit" name="sort_asc" value="昇順">
        <input type="submit" name="sort_desc" value="降順">
        <p></p>
    </form>
    <?php
    function quickSort($array) {
        if (count($array) < 2) {
            return $array;
        }
        $left = $right = array();
        reset($array);
        $pivot_key = key($array);
        $pivot = array_shift($array);
        foreach ($array as $k => $v) {
            if ($v < $pivot) {
                $left[$k] = $v;
            } else {
                $right[$k] = $v;
            }
        }
        return array_merge(quickSort($left), array($pivot_key => $pivot), quickSort($right));
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numbers = [];
        if (isset($_POST['text1'])) $numbers = array_merge($numbers, array_map('intval', explode(',', $_POST['text1'])));
        if (isset($_POST['text2'])) $numbers = array_merge($numbers, array_map('intval', explode(',', $_POST['text2'])));
        if (isset($_POST['text3'])) $numbers = array_merge($numbers, array_map('intval', explode(',', $_POST['text3'])));
        if (isset($_POST['text4'])) $numbers = array_merge($numbers, array_map('intval', explode(',', $_POST['text4'])));

        if (isset($_POST['sort_asc'])) {
            $sortedNumbers = quickSort($numbers);
            echo "<p>昇順：" . implode(',', $sortedNumbers) . "</p>";
        } elseif (isset($_POST['sort_desc'])) {
            rsort($numbers);
            echo "<p>降順：" . implode(',', $numbers) . "</p>";
        }
    }
    ?>
</body>
</html>
