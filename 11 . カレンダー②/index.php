<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DynamicCalendar</title>
    <style>
        h3 {
            border-bottom: 1px solid;
        }
        table {
            border: 1px solid;
            width: 30rem;
            height: 30rem;
        }
        th {
            height: 30px;
        }
        tr {
            text-align: center;
            border: 1px solid;
        }
        .backRed {
            background-color: red;
        }
        .backBlue {
            background-color: blue;
        }
        .blue {
            color: blue;
        }
        .red {
            color: red;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>日</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
        </tr>
        <?php
        $count = '';
        for ($i = 1; $i <= 7; $i++) {
            echo '<tr>';
            for ($a = 1; $a < 6; $a++) {
                echo '<td>1</td>';
                $count++;
            }
            echo '<tr/>';
        }
        ?>
    </table>
</body>
</html>