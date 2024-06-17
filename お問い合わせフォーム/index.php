<?php
session_start();
$ramen = '';
$prif = [];
$about = '';
$textarea = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ramen'])) {
        $ramen = $_POST['ramen'];
    }
    if (isset($_POST['prif'])) {
        $prif = $_POST['prif'];
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
            <option value="とんこつらーめん" <?php if ((isset($ramen) && $ramen == 'とんこつらーめん')) echo 'selected'; ?> required>とんこつらーめん</option>
            <option value="しょうゆらーめん" <?php if ((isset($ramen) && $ramen == 'しょうゆらーめん')) echo 'selected'; ?> required>しょうゆらーめん</option>
            <option value="しおらーめん" <?php if ((isset($ramen) && $ramen == 'しおらーめん')) echo 'selected'; ?> required>しおらーめん</option>
            <option value="みそらーめん" <?php if ((isset($ramen) && $ramen == 'みそらーめん')) echo 'selected'; ?> required>みそらーめん</option>
        </select><br>
        <p></p>
        <label>
            <input type="checkbox" name="prif[]" value="大阪府" <?php if (in_array('大阪府', $prif)) echo 'checked'; ?>>大阪府<br>
            <input type="checkbox" name="prif[]" value="京都" <?php if (in_array('京都', $prif)) echo 'checked'; ?>>京都<br>
            <input type="checkbox" name="prif[]" value="愛媛" <?php if (in_array('愛媛', $prif)) echo 'checked'; ?>>愛媛<br>        
        </label>
        <p></p>
        <label>
            <input type="radio" name="about" value="材料について" <?php if ($about == '材料について') echo 'checked'; ?>>材料について<br>
            <input type="radio" name="about" value="こだわりについて" <?php if ($about == 'こだわりについて') echo 'checked'; ?>>こだわりについて<br>
            <input type="radio" name="about" value="美味しさの秘訣について" <?php if ($about == '美味しさの秘訣について') echo 'checked'; ?>>美味しさの秘訣について<br>        
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
                if (!empty($prif)) {
                    echo htmlspecialchars(implode(',', $prif), ENT_QUOTES, 'UTF-8');
                }
            ?>
        </p>
        <p>お問い合わせ内容：<?php echo htmlspecialchars($about, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>しょうさい：<?php echo htmlspecialchars($textarea, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>
</body>
</html>