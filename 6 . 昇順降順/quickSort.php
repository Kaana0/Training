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

    $error = false;
    $errorMessage = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numbers = [];
        $inputs = ['text1', 'text2', 'text3', 'text4'];
        foreach ($inputs as $input) {
            if (isset($_POST[$input]) && $_POST[$input] !== '') {
                $values = explode(',', $_POST[$input]);
                foreach ($values as $value) {
                    if (!is_numeric($value)) {
                        $error = true;
                        $errorMessage = "数値で入力して下さい！";
                        break 2;
                    } else {
                        $numbers[] = intval($value);
                    }
                }
            } else {
                $error = true;
                if (isset($inputs[0])) {
                    $errorMessage = "入力して下さい！";
                }
                break;
            }
        }
    }
    ?>
    <h1>クイックソートで並び替え</h1>
    <form method="post">
        <input type="text" name="text1" value="<?php echo isset($_POST['text1']) ? htmlspecialchars($_POST['text1'], ENT_QUOTES) : ''; ?>"><?php if ($error) { echo "{$errorMessage}";} ?><br>
        <input type="text" name="text2" value="<?php echo isset($_POST['text2']) ? htmlspecialchars($_POST['text2'], ENT_QUOTES) : ''; ?>"><?php if ($error) { echo "{$errorMessage}";} ?><br>
        <input type="text" name="text3" value="<?php echo isset($_POST['text3']) ? htmlspecialchars($_POST['text3'], ENT_QUOTES) : ''; ?>"><?php if ($error) { echo "{$errorMessage}";} ?><br>
        <input type="text" name="text4" value="<?php echo isset($_POST['text4']) ? htmlspecialchars($_POST['text4'], ENT_QUOTES) : ''; ?>"><?php if ($error) { echo "{$errorMessage}";}?>
        <p></p>
        <input type="submit" name="sort_asc" value="昇順">
        <input type="submit" name="sort_desc" value="降順">
        <p></p>
    </form>
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($error) {
            //echo "<p class='error'>{$errorMessage}</p>";
        } else {
            if (isset($_POST['sort_asc'])) {
                $sortedNumbers = quickSort($numbers);
                echo "<p>昇順：" . implode(',', $sortedNumbers) . "</p>";
            } elseif (isset($_POST['sort_desc'])) {
                rsort($numbers);
                echo "<p>降順：" . implode(',', $numbers) . "</p>";
            }
        }
    }?>

</body>
</html>
