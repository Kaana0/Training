<?php
function lunch() {
    $money = rand(500, 1000);
    $lunchCost = 750;
    $removeMoney = $money - $lunchCost;

    if ($removeMoney >= 0) {
        echo "最初のお金：{$money}円\n";
        echo "ランチ代：{$lunchCost}円\n";
        echo "残高：{$removeMoney}円\n";
    } else {
        // 食い逃げ成功率0：失敗１：成功
        $successRate = rand(0, 1);
        if ($successRate) {
            echo "最初のお金：{$money}円\n";
            echo "ランチ代：{$lunchCost}円\n";
            echo "残金：{$money}円 食い逃げ成功!\n";
        } else {
            $removeMoney = 0;
            echo "最初のお金：{$money}円\n";
            echo "ランチ代：{$lunchCost}円\n";
            echo "残高：{$removeMoney}円 食い逃げ失敗！全額支払った！\n";
        }
    }
}
lunch();
?>