<?php
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
    <form method="post">
        <input type="text" name="" value="" class="text">
        <table>
            <tr>
                <td><button type="submit" value="">1</button></td>
                <td><button type="submit" value="">2</button></td>
                <td><button type="submit" value="">3</button></td>
                <td><button type="submit" value="">+</button></td>
            </tr>
            <tr>
                <td><button type="submit" value="">4</button></td>
                <td><button type="submit" value="">5</button></td>
                <td><button type="submit" value="">6</button></td>
                <td><button type="submit" value="">-</button></td>
            </tr>
            <tr>
                <td><button type="submit" value="">7</button></td>
                <td><button type="submit" value="">8</button></td>
                <td><button type="submit" value="">9</button></td>
                <td><button type="submit" value="">C</button></td>
            </tr>
            <tr>
                <td><button type="submit" value="">0</button></td>
                <td><button type="submit" value="">*</button></td>
                <td><button type="submit" value="">÷</button></td>
                <td><button type="submit" value="">=</button></td>
            </tr>
        </table>
    </form>
</body>
</html>