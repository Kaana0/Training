<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>九九表</title>
    <style>
        table {
            border: 1px solid;
        }
        td {
            border: 1px solid;
            width: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h3>9×9表</h3>
    <table>
          <tr>
                <td> </td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
            </tr>
            <?php
        for ($i = 1; $i <= 9; $i++) {
            echo '<tr>';
            for ($l = 1; $l <= 9; $l++) {
                echo '<td>' . $i * $l . '</td>';
                if ($l == 1) {
                    echo '<td>' . $i . '</td>';
                }
            }
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>