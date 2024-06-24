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
    <form method="post" action="">

    </form>
    <h3><a href="">< </a>
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
    echo $year . "年" . $month . "月"?><a href=""> ></a></h3>
    <table>
        <tr>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th class="backBlue">土</th>
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
    <?php 
    $monthNext = filter_input(INPUT_POST, 'monthNext');
    $yearNext = filter_input(INPUT_POST, 'yearNext');
    $monthPrev = filter_input(INPUT_POST, 'monthPrev');
    $yearPrev = filter_input(INPUT_POST, 'yearPrev');
    if ($monthNext > 12) {
        $monthNext = 1;
        $yearNext++;
    }
    if ($monthPrev === "0") {
        $monthPrev = 12;
        $yearPrev--;
    }
    $month = $monthNext??$monthPrev??date('n');
    $year = $yearNext??$yearPrev??date('Y');
    $last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
    $calender = array();
    $j = 0;

    for ($i = 1; $i < $last_day + 1; $i++) {
        $week = date('w', mktime(0, 0, 0, $month, $i, $year));
        if ($i == 1) {
            for ($s = 2; $s <= $week; $s++) {
                $calender[$j]['day'] = '';
                $j++;
            }
        }
        $calender[$j]['day'] = $i;
        $j++;
        if ($i == $last_day) {
            for ($e = 1; $e <= 6 - $week; $e++) {
                $calender[$j]['day'] = '';
                $j++;
            }
        }
    }
    ?>
    <form method="post" action="">
        <th>
            <button type="submit" id="prev"><
                <input type="hidden" name="monthPrev" value="<?php echo $month-1; ?>">
                <input type="hidden" name="yearPrev" value="<?php echo $year; ?>">
            </button>
        </th>
    </form>
    <p>

        <th id="title"><?php echo $year; ?>年<?php echo $month; ?>月
    </p>
    </th>
    <form method="post" action="">
        <th>
            <button type="submit" id="next">>
                <input type="hidden" name="monthNext" value="<?php echo $month+1; ?>">
                <input type="hidden" name="yearNext" value="<?php echo $year; ?>">
            </button>
        </th>
    </form>
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
        <tr>
            <?php $cnt = 0; ?>
            <?php foreach ($calender as $key => $value): ?>
                <td>
                    <p><?php $cnt++; echo $value['day']; ?></p>
                </td>
                <?php if ($cnt == 7): ?>
                </tr>
        <tr>
            <?php $cnt = 0; ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </tr>
    </table>
</body>
</html>   <th class="backRed">日</th>
            <input type="date">
        </tr>
        <?php
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
            echo '<tr/>';
        }
        ?>
    </table>
</body>
</html>