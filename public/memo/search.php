<?php

require_once '../../includes/login-check.php';
require_once '../../models/Memo.php';

$memos = [];

if (isset($_POST['submit_button'])) {
    $body = $_POST['body'];
    Memo::search($body);
    $memos = Memo::search($body);
}

?>

<html>
    <head>
        <link rel="stylesheet" href="style-memo.css">
    </head>
    <body>
    <div class="search-header">
        <video muted autoplay loop>
            <source src="videos/universe7.mp4" type="video/mp4">
            <strong>Your browser does not support the video tag.</strong>
        </video>
        <div class="search-text">
        <?php include '../../includes/header.php' ?>
            <h1>メモ検索</h1>
            <form action="search.php" method="post">
                <label>
                    <input type="text" name="body" id="search_body" placeholder="含む全てのメモ">
                </label>
                <input type="submit" value="検索" name="submit_button" id="search_btn">
            </form>
            <a href="./index.php">一覧へ戻る</a>
            <div class="search_result">
                <?php foreach ($memos as $memo): ?>
                    <p>検索結果</p>
                    <p>ID : <?php echo $memo -> getId()?></p>
                    <p>メモの本文 : <?php echo $memo -> getBody()?></p>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <script src="js.js"></script>
    </body>
</html>
