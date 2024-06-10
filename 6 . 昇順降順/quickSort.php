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
        <label for="textarea1">テキストエリア１</label><br>
        <textarea name="textarea1"></textarea><br>
        <label for="textarea2">テキストエリア2</label><br>
        <textarea name="textarea2"></textarea><br>
        <input type="submit" value="並び変える！！">
    </form>
    <?php
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $textarea1 = $_POST['textarea1'];
        $textarea2 = $_POST['textarea2'];
        $number1 = array_map('intval', explode(',', $textarea1));
        $number2 = array_map('intval', explode(',', $textarea2));
        $numbers = array_merge($number1, $number2);
        $sortedNumberAsc = quickSort($numbers);
        $sortedNumberDesc = array_reverse($sortedNumberAsc);
        echo "<h2>結果</h2>";
        echo "<p>昇順：" . implode(',', $sortedNumberAsc) . "</p>";
        echo "<p>降順：" . implode(',', $sortedNumberDesc) . "</p>";

    }
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
    ?>
</body>
</html>