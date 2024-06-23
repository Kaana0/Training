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
    <h3><a href="">< </a>
    <?php 
    $year = date('Y');
    $month = date('m');
    $week = date('w', strtotime($year, $month));
    $monthDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    echo $year . "年" . $month . "月"?><a href=""> ></a></h3>
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
        for ($i = 0; $i < 6; $i++) {
            // if ($Week) {

            // }
            echo '<tr>';
            for ($a = 0; $a < 7; $a++) {
                echo '<td>' . $count . '</td>';
                $count++;
            }
            echo '<tr/>';
        }
        ?>
    </table>
</body>
</html>