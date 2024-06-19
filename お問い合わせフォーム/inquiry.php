<?php
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
print_r($_POST);
?>