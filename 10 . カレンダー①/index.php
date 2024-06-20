<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th class="backBlue">土</th>
            <th class="backRed">日</th>
        </tr>
        <?php
        $year = date('Y');
        $month = date('m');
        $week = date('w', strtotime($year . '-' . $month . '-01'));
        $monthDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        if ($week == 0) {
            $week = 6;
        } else {
            $week--;
        }
        $count = 1;
        for ($i = 0; $i < 6; $i++) {
            echo '<tr>';
            for ($a = 0; $a < 7; $a++) {
                $weekend = (5 + $a) % 7;
                if ($count <= $monthDays) {
                    if ($i == 0 && $a < $week) {
                        echo '<td></td>';
                    } else {
                        if ($weekend == 3) {
                            echo '<td class="blue">' . $count . '</td>';
                        } elseif ($weekend == 4) {
                            echo '<td class="red">' . $count . '</td>';
                        } else {
                            echo '<td>' . $count . '</td>';
                        }
                        $count++;
                    }
                }
            }
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>