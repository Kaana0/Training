<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>昇順降順</title>
    <style>
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
    function mergeSort($array) {
        $length = count($array);
        if ($length <= 1) {
            return $array;
        }
        $mid = (int)($length / 2);
        $left = array_slice($array, 0, $mid);
        $right = array_slice($array, $mid);

        $left = mergeSort($left);
        $right = mergeSort($right);
        return merge($left, $right);
    }
    function merge($left, $right) {
        $result = [];
        $leftLength = count($left);
        $rightLength = count($right);
        $i = 0;
        $j = 0;

        while ($i < $leftLength && $j < $rightLength) {
            if ($left[$i] <= $right[$j]) {
                $result[] = $left[$i];
                $i++;
            } else {
                $result[] = $right[$j];
                $j++;
            }
        }

        while ($i < $leftLength) {
            $result[] = $left[$i];
            $i++;
        }
        while ($j < $rightLength) {
            $result[] = $right[$j];
            $j++;
        }
        return $result;
    }

    $error = false;
    $errors = [];
    $numbers = [];
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $inputs = ['text1', 'text2', 'text3', 'text4'];
        foreach ($inputs as $input) {
            if (!isset($_POST[$input]) || $_POST[$input] === '') {
                $error = true;
                $errors[$input] = "入力して下さい！";
            } else {
                $values = explode(',', $_POST[$input]);
                foreach ($values as $value) {
                    if (!is_numeric($value)) {
                        $error = true;
                        $errors[$input] = "数値で入力して下さい！";
                        break;
                    } else {
                        $numbers[] = intval($value);
                    }
                }
            }
        }
    }
?>

    <h1>マージソートで並び替え</h1>
    <form method="post">
        <input type="text" name="text1" value="<?php echo isset($_POST['text1']) ? htmlspecialchars($_POST['text1'], ENT_QUOTES) : '';  ?>">
        <?php if (isset($errors['text1'])) { echo "<span class='error'>{$errors['text1']}</span>"; } ?><br>

        <input type="text" name="text2" value="<?php echo isset($_POST['text2']) ? htmlspecialchars($_POST['text2'], ENT_QUOTES) : '';  ?>">
        <?php if (isset($errors['text2'])) { echo "<span class='error'>{$errors['text2']}</span>"; } ?><br>

        <input type="text" name="text3" value="<?php echo isset($_POST['text3']) ? htmlspecialchars($_POST['text3'], ENT_QUOTES) : '';  ?>">
        <?php if (isset($errors['text3'])) { echo "<span class='error'>{$errors['text3']}</span>"; } ?><br>

        <input type="text" name="text4" value="<?php echo isset($_POST['text4']) ? htmlspecialchars($_POST['text4'], ENT_QUOTES) : '';  ?>">
        <?php if (isset($errors['text4'])) { echo "<span class='error'>{$errors['text4']}</span>"; } ?><br>
        <p></p>
        <input type="submit" name="sort_asc" value="昇順">
        <input type="submit" name="sort_desc" value="降順">
    </form>

<?php
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && !$error) {
    if (isset($_POST['sort_asc'])) {
        $sortNumber = mergeSort($numbers);
        echo "<p>昇順：" . implode(',', $sortNumber) . "</p>";
    } elseif (isset($_POST['sort_desc'])) {
        rsort($numbers);
        echo "<p>降順：" . implode(',', $numbers) . "</p>";
    }
}
 ?>
</body>
</html>