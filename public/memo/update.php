<?php

require_once '../../includes/login-check.php';
require_once '../../models/Memo.php';

if (isset($_POST['submit_button'])) {
    $id = $_POST['id'];
    $body = $_POST['body'];
    Memo::update($id, $body);

    header('Location: ./index.php');
    return;
}

$id = $_GET['id'];
$memo = Memo::get($id);

?>
<html>
    <head>
        <link rel="stylesheet" href="style-memo.css">
    </head>
    <body>
        <div class="update-header">
            <video muted autoplay loop>
                <source src="videos/universe3.mp4" type="video/mp4">
                <strong>Your browser does not support the video tag.</strong>
            </video>
            <div class="update-text">
                <?php include '../../includes/header.php' ?>
                <h2>メモ更新</h2>
                <form action="./update.php" method="post">
                    <label>
                        <p>メモ：</p>
                        <p><input type="text"name="body" value="<?php echo $memo->getBody()?>" placeholder="メモ更新"></p>
                    </label>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="submit_button" onclick="alert('更新されました！')">
                </form>
                <a href="./index.php">一覧へ戻る</a>
            </div>
        </div>
    <script src="js.js"></script>
    </body>
</html>
