<?php

require_once '../../includes/login-check.php';
require_once '../../models/Memo.php';

$id = $_GET['id'];
$memo = Memo::get($id);

?>
<html>
    <head>
        <link rel="stylesheet" href="style-memo.css">
    </head>
    <body>
        <div class="get-header">
            <video muted autoplay loop>
                <source src="videos/universe2.mp4" type="video/mp4">
                <strong>Your browser does not support the video tag.</strong>
            </video>
            <div class="get-text">
                <?php include '../../includes/header.php' ?>
                <h2>メモ詳細</h2>
                <p>
                    ID: <?php echo $memo->getId() ?>
                </p>
                <p>
                    <?php echo $memo->getBody() ?>
                </p>
                <p>
                    更新日時：<?php echo $memo->getUpdatedAt() ?>
                </p>
                <a href="./index.php">一覧へ戻る</a>
                <script src="js.js"></script>
            </div>
        </div>
    </body>
</html>
