<?php
function eatAndRun () {
    
    $wallet = rand(500, 1000);
    $lunchPrice = 750;
    $balance = $wallet - $lunchPrice;
    //echo($balance);
    // $balanseが0よりマイナスじゃなければ食い逃げの処理を行う
    if ($balance < 0) {
        $success = rand(0, 1);
        //echo($success);
        // 食い逃げ成功
        if ($success == 0) {
            echo "財布の中身は" . $wallet . "円です。";
            echo "\n";
            echo "ランチ代は" . $lunchPrice . "でした。";
            echo "\n";
            echo "残金は" . $wallet. "円です。";
            echo "\n";
            echo "食い逃げ成功！！";
        } else {
        // 食い逃げ失敗
            $balance = 0;
            echo "財布の中身は" . $wallet . "円です。";
            echo "\n";
            echo "ランチ代は" . $lunchPrice . "でした。";
            echo "\n";
            echo "残金は" . $balance . "円です。";
            echo "\n";
            echo "食い逃げ失敗！！残高がなくなりました！";
        }
    } else {
    // 代金足りる場合
        echo "財布の中身は" . $wallet . "円です。";
        echo "\n";
        echo "ランチ代は" . $lunchPrice . "でした。";
        echo "\n";
        echo "残金は" . $balance . "円です。";
        echo "\n";
        echo "ごちそうさまでした！！";
    }
    //echo($wallet);
}
eatAndRun();
?>