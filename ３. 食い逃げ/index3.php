<?php
$money = rand(500, 1000);
$lunch_cost = 750;

if ($money >= $lunch_cost) {
    echo "最初の残高：" . $money . "円<br>";
    echo "ランチ代金：" . $lunch_cost . "円を支払いました<br>";
    $money_balance = $money - $lunch_cost;
    echo "支払後の残高：" . $money_balance . "円";
} else {
    echo "最初の残高：" . $money . "円<br>";
    echo "ランチ代金：" . $lunch_cost . "円を支払いました<br>";
    // 食い逃げ成功率50%の場合
    if (rand(0, 1)) {
        $money_balance = $money;
    } else {
        $money_balance = 0;
    }
    echo "残高：" . $money_balance . "円";
}
?>