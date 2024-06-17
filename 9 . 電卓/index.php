<?php
session_start();
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $total = '';
    $display = '';
    if (isset($_POST['display'])) {
        $display = $_POST['display'];
    }
    if (isset($_POST['number'])) {
        $display .= $_POST['number'];
    }
    if (isset($_POST['oparater'])) {
        $display .= $_POST['oparater'];
    }
    if (isset($_POST['clear'])) {
        $display = '';
    }
    if (isset($_POST['sum'])) {
        if ($display[1] == "+") {
            $total = (int)$display[0] + (int)$display[2];
        } elseif ($display[1] == "-") {
            $total = (int)$display[0] - (int)$display[2];
        } elseif ($display[1] == "*") {
            $total = (int)$display[0] * (int)$display[2];
        } elseif ($display[1] == "/") {
            $total = (int)$display[0] / (int)$display[2];
        }
    }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        .text {
            width: 128px;
        }

        button {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>
    <p><?php if (empty($display)) {
            echo 0;
        } else {
            echo $display;
        } ?></p>
    <form method="post">
        <input type="hidden" name="display" value="<?php echo htmlspecialchars($display, ENT_QUOTES, 'UTF-8') ?>" class="text">
        <table>
            <tr>
                <td><button type="submit" name="number" value="1">1</button></td>
                <td><button type="submit" name="number" value="2">2</button></td>
                <td><button type="submit" name="number" value="3">3</button></td>
                <td><button type="submit" name="oparater" value="+">+</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="number" value="4">4</button></td>
                <td><button type="submit" name="number" value="5">5</button></td>
                <td><button type="submit" name="number" value="6">6</button></td>
                <td><button type="submit" name="oparater" value="-">-</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="number" value="7">7</button></td>
                <td><button type="submit" name="number" value="8">8</button></td>
                <td><button type="submit" name="number" value="9">9</button></td>
                <td><button type="submit" name="clear" value="C">C</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="number" value="0">0</button></td>
                <td><button type="submit" name="oparater" value="*">*</button></td>
                <td><button type="submit" name="oparater" value="/">÷</button></td>
                <td><button type="submit" name="sum" value="=">=</button></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_SESSION)) {
        echo "<h2>合計：" . $total . "</h2>";
    }
    ?>
</body>

</html>