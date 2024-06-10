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
        <input type="text" name="text1">
        <input type="text" name="text2">
        <input type="text" name="text3">
        <input type="text" name="text4">
        <p></p>
        <input type="submit" name="sort_asc" value="昇順">
    </form>
    <?php
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sort_asc'])) {
        $numbersAsc = [];
        if (isset($_POST['text1'])) $numbers = array_merge($numbersAsc, array_map('intval', explode(',', $_POST['text1'])));
        if (isset($_POST['text2'])) $numbers = array_merge($numbersAsc, array_map('intval', explode(',', $_POST['text2'])));
        if (isset($_POST['text3'])) $numbers = array_merge($numbersAsc, array_map('intval', explode(',', $_POST['text3'])));
        if (isset($_POST['text4'])) $numbers = array_merge($numbersAsc, array_map('intval', explode(',', $_POST['text4'])));
        $sortedNumbersAsc = quickSort($numbersAsc);
        echo "<p>昇順：" . implode(',', $sortedNumbersAsc) . "</p>";
    }
    ?>
    <form method="post">
        <input type="text" name="text1">
        <input type="text" name="text2">
        <input type="text" name="text3">
        <input type="text" name="text4">
        <p></p>
        <input type="submit" name="sort_desc" value="降順">
    </form>
    <?php
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sort_desc'])) {
        $numbersDesc = [];
        if (isset($_POST['text1'])) $numbers = array_merge($numbersDesc, array_map('intval', explode(',', $_POST['text1'])));
        if (isset($_POST['text2'])) $numbers = array_merge($numbersDesc, array_map('intval', explode(',', $_POST['text2'])));
        if (isset($_POST['text3'])) $numbers = array_merge($numbersDesc, array_map('intval', explode(',', $_POST['text3'])));
        if (isset($_POST['text4'])) $numbers = array_merge($numbersDesc, array_map('intval', explode(',', $_POST['text4'])));
        $sortedNumbersDesc = quickSort($numbersDesc);
        $sortedNumbersDesc = array_reverse($sortedNumbersDesc);
        echo "<p>降順：" . implode(',', $sortedNumbersDesc) . "</p>";
    }
    ?>    
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
    ?>
</body>
</html>