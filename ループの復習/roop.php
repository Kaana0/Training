<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=4, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num = 1;
    for ($i = 1; $i < 10; $i++) {
        echo $i;
        echo $num;
    }  
    echo '<br>';
    for ($k = 10; $k > 0; $k--) {
        echo $k;
    }
    echo '<br>';
    for ($a = 1; $a <= 100; $a++) {
        echo $a;
        echo '<br>';
        if ($a == 50) {
            break;
        }
    }
    $ramen = ['ぱいたんらめん', 'しおらめん', 'しょうゆらめん'];
    for ($c = 0; $c < count($ramen); $c++) {
        echo $ramen[0];
    }
    $users = [
        [
          'id' => 1,
          'name' => 'たろう',
        ],[
          'id' => 2,
          'name' => 'はなこ',
        ]
      ];
    ?>
    <table>
        <?php foreach ($users as $user) : ?>
        <tr>
            <th><?php echo $user['id'] ?></th>
            <th><?php echo $user['name'] ?></th>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>