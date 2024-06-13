<?php
    $weather = rand(0, 1);
    switch($weather) {
        case 0:
            echo "散歩に行く";
            break;
        case 1:
            echo "家でテレビを見る";
            break;
        default:
            echo "くもりです！";
    }
?>