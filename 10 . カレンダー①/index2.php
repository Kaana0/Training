<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>かれんだー</title>
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
    <div>
        <h3>令和６年（今月のカレンダー）</h3>
        <h1>2024年6月</h1>
        <table>
            <tr>
                <?php
                $week = array("日", "月", "火", "水", "木", "金", "土");
                $startDayIndex = date('w', strtotime('20240601'));
                for ($i = 1; $i <= 7; $i++) {
                    if ($week[($i + $startDayIndex) % 7] == "土") {
                        echo '<th class="backBlue">' . $week[($i + $startDayIndex) % 7] . '</th>';
                    } elseif ($week[($i + $startDayIndex) % 7] == "日") {
                        echo '<th class="backRed">' . $week[($i + $startDayIndex) % 7] . '</th>';
                    } else {
                        echo '<th>' . $week[($i + $startDayIndex) % 7] . '</th>';
                    }
                }
                ?>
            </tr>
            <tr>
                <?php
                $month = cal_days_in_month(CAL_GREGORIAN, 6, 2024);
                for ($i = 0; $i < $startDayIndex; $i++) {
                    echo '<td></td>';
                }
                for ($day = 1; $day <= $month; $day++) {
                    $weekend = (5 + $day) % 7;
                    if ($week[$weekend] == "土") {
                        echo '<td class="blue">' . $day . '</td>';
                    } elseif ($week[$weekend] == "日") {
                        echo '<td class="red">' . $day . '</td>';
                    } else {
                        echo '<td>' . $day . '</td>';                    
                    }
                    if (($day + $startDayIndex) % 7 == 0) {
                        echo '</tr><tr>';
                    }
                }
                echo '</tr>';
                ?>
            </tr>
        </table>
    </div>
</body>
</html>