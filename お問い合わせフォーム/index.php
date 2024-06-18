<?php
session_start();
$ramen = '';
$prefCode = [];
$about = '';
$textarea = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ramen'])) {
        $ramen = $_POST['ramen'];
    }
    if (isset($_POST['prefCode'])) {
        $prefCode = $_POST['prefCode'];
    }
    if (isset($_POST['about'])) {
        $about = $_POST['about'];
    }
    if (isset($_POST['textarea'])) {
        $textarea = $_POST['textarea'];
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせふぉーむ</title>
</head>
<body>
    <h3>おといあわせないよう</h3>
    <form method="post" action="index.php">
        <select name="ramen">
            <?php
            $ramens = ['とんこつらーめん', 'しょうゆらーめん', 'しおらーめん', 'みそらーめん'];
            foreach ($ramens as $r) {
                echo "<option value='{$r}'<?php if ((isset($ramen) && $ramen == $r)) echo 'selected'; ?>$r</option>";
            }
            ?>
        </select><br>
        <p></p>
        <label>
            <?php
            $prefecture = ['北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県'];
            foreach ((array)$prefecture as $p) {
                if (in_array($p, $prefCode)) {
                    echo "<input type='checkbox' name='prefCode[]' value='{$p}' checked> $p" . "<br>";
                } else {
                    echo "<input type='checkbox' name='prefCode[]' value='{$p}'> $p" . "<br>";
                }
            }
            ?>
        </label>
        <p></p>
        <label>
            <?php
            $abouts = ['材料について', 'こだわりについて', '美味しさの秘訣について'];
            foreach ($abouts as $a) {
                if (isset($about) && $about == $a) {
                    echo "<input type='radio' name='about' value='{$a}' checked> $a" . "<br>";
                } else {
                    echo "<input type='radio' name='about' value='{$a}'> $a" . "<br>";
                }
            }
            ?>        
        </label>
        <p></p>
        <textarea name="textarea" rows="5" ><?php echo htmlspecialchars($textarea, ENT_QUOTES, 'UTF-8'); ?></textarea><br>
        <p></p>
        <input type="submit" value="そうしんする！"> 
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h3>そうしんないよう</h3>
        <p>しゅるい：<?php echo htmlspecialchars($ramen, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>都道府県：
            <?php
                if (!empty($prefCode)) {
                    echo htmlspecialchars(implode(',', $prefCode), ENT_QUOTES, 'UTF-8');
                }
            ?>
        </p>
        <p>お問い合わせ内容：<?php echo htmlspecialchars($about, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>しょうさい：<?php echo htmlspecialchars($textarea, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>
</body>
</html>