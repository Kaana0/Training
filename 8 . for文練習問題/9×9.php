<?php
    for ($k = 1; $k <= 9; $k++) {
        for ($z = 1; $z <= 9; $z++) {
            if ($z != 9) {
                echo $z * $k;
            } else {
                echo $z * $k . "\n";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>九九表</title>
    <style>
        table {
            border: 1px solid;
        }
        td {
            border: 1px solid;
            width: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
          <tr>
                <td></td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
            </tr>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
            </tr>
            <tr>
                <td>2</td>
                <td>2</td>
                <td>4</td>
                <td>6</td>
                <td>8</td>
                <td>10</td>
                <td>12</td>
                <td>14</td>
                <td>16</td>
                <td>18</td>
            </tr>
            <tr>
                <td>3</td>
                <td>3</td>
                <td>6</td>
                <td>9</td>
                <td>12</td>
                <td>15</td>
                <td>18</td>
                <td>21</td>
                <td>24</td>
                <td>27</td>
            </tr>
            <tr>
                <td>4</td>
                <td>4</td>
                <td>8</td>
                <td>12</td>
                <td>16</td>
                <td>20</td>
                <td>24</td>
                <td>28</td>
                <td>32</td>
                <td>36</td>
            </tr>
            <tr>
                <td>5</td>
                <td>5</td>
                <td>10</td>
                <td>15</td>
                <td>20</td>
                <td>25</td>
                <td>30</td>
                <td>35</td>
                <td>40</td>
                <td>45</td>
            </tr>
            <tr>
                <td>6</td>
                <td>6</td>
                <td>12</td>
                <td>18</td>
                <td>24</td>
                <td>30</td>
                <td>36</td>
                <td>42</td>
                <td>48</td>
                <td>54</td>
            </tr>
            <tr>
                <td>7</td>
                <td>7</td>
                <td>14</td>
                <td>21</td>
                <td>28</td>
                <td>35</td>
                <td>42</td>
                <td>49</td>
                <td>56</td>
                <td>63</td>
            </tr>
            <tr>
                <td>8</td>
                <td>8</td>
                <td>16</td>
                <td>24</td>
                <td>32</td>
                <td>40</td>
                <td>48</td>
                <td>56</td>
                <td>64</td>
                <td>72</td>
            </tr>
            <tr>
                <td>9</td>
                <td>9</td>
                <td>18</td>
                <td>27</td>
                <td>36</td>
                <td>45</td>
                <td>54</td>
                <td>63</td>
                <td>72</td>
                <td>81</td>
            </tr>
    </table>
</body>
</html>