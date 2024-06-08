<?php
function eatAndRun() {
    $myMoney = rand(600, 1200);
    $dinnerPrice = 1000;
    $lostMoney = $myMoney - $dinnerPrice;
    if ($lostMoney < 0) {
        $success = rand(0, 1);
        switch ($success) {
            case 0:
                echo 'my money is ' . $myMoney . ' yen' . "\n";
                echo 'dinnerprice is ' . $dinnerPrice . ' yen' . "\n";
                echo 'my balance is ' . $myMoney . ' yen' . "\n";
                echo 'success EatAndRun !';
                break;
            case 1:
                $lostMoney = 0;
                echo 'my money is ' . $myMoney . ' yen' . "\n";
                echo 'dinnerprice is ' . $dinnerPrice . ' yen' . "\n";
                echo 'my balance is ' . $lostMoney . ' yen' . "\n";
                echo 'mistake EatAndRun !';
                break;
        }
    } else {
        echo 'my money is ' . $myMoney . ' yen' . "\n";
        echo 'dinnerprice is ' . $dinnerPrice . ' yen' . "\n";
        echo 'my balance is ' . $lostMoney . ' yen' . "\n";
        echo 'I paid it !';
    }
}
eatAndRun();
?>