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
            <?php
            $ramens = ['とんこつらーめん', 'しょうゆらーめん', 'しおらーめん', 'みそらーめん'];
            foreach ($ramens as $r) {
                echo "<option value='{$r}'<?php if ((isset($ramen) && $ramen == $r)) echo 'selected'; ?>$r</option>";
            }
            ?>
          <?php include 'checkbox.php'; ?>
        <?php include 'radio.php'; ?>    
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
