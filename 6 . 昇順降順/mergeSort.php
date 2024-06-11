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
    <h1>マージソートで並び替え</h1>
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
    function mergeSort($array) {
        if (count($array) <= 1) {
            return $array;
        }

        $middle = floor(count($array) / 2);
        $left = array_slice($array, 0, $middle);
        $right = array_slice($array, $middle);

        $left = mergeSort($left);
        $right = mergeSort($right);

        return merge($left, $right);
    }

    function merge($left, $right) {
        $result = [];
        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] <= $right[0]) {
                array_push($result, array_shift($left));
            } else {
                array_push($result, array_shift($right));
            }
        }

        while (count($left) > 0) {
            array_push($result, array_shift($left));
        }

        while (count($right) > 0) {
            array_push($result, array_shift($right));
        }

        return $result;
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
                        $errorMessage = "すべて数値で入力して下さい！";
                        break 2;
                    } else {
                        $numbers[] = intval($value);
                    }
                }
            } else {
                $error = true;
                $errorMessage = "すべての入力値を入力して下さい！";
                break;
            }
        }

        if ($error) {
            echo "<p class='error'>{$errorMessage}</p>";
        } else {
            if (isset($_POST['sort_asc'])) {
                $sortedNumbers = mergeSort($numbers);
                echo "<p>昇順：" . implode(',', $sortedNumbers) . "</p>";
            } elseif (isset($_POST['sort_desc'])) {
                $sortedNumbers = mergeSort($numbers);
                $sortedNumbers = array_reverse($sortedNumbers);
                echo "<p>降順：" . implode(',', $sortedNumbers) . "</p>";
            }
        }
    }
    ?>
</body>
</html>
