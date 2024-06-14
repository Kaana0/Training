<?php
    for ($n = 1; $n <= 3; $n++) {
        $number = "";
        for ($i = 3; $i >= 4 - $n; $i--) {
            $number .= $i;
        }
        echo $number . "\n";
    }
?>
