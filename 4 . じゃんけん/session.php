<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>セッションの練習</title>
</head>
<body>
    <h1>せっしょん値の生成</h1>
    <?php
    session_start();
    $_SESSION["data"] = "PHP";
    echo "<p>セッションID：" . session_id() . "</p>";
    echo "<p>設定した値：{$_SESSION["data"]}</p>";
    ?>
    <a href="">つぎへ</a>
</body>
</html>