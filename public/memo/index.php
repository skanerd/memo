<?php

require_once '../../includes/login-check.php';
require_once '../../models/Memo.php';

$memos = Memo::getAll();

?>
<html>
    <head>
        <link rel="stylesheet" href="style-memo.css">
    </head>
    <body>
        <div class="memo-header">
            <video muted autoplay loop>
                <source src="videos/universe1.mp4" type="video/mp4">
                <strong>Your browser does not support the video tag.</strong>
            </video>
            <div class="memo-text">
            <?php include '../../includes/header.php' ?>
                <h2>メモ一覧</h2>
                <a href="search.php">メモ検索</a><br><br>
                <a href="./new.php">新規作成</a>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>本文</th>
                        <th>更新日時</th>
                        <th>詳細</th>
                        <th>更新</th>
                        <th>削除</th>
                    </tr>
                    <?php foreach ($memos as $memo): ?>
                        <tr>
                            <td><?php echo $memo->getId() ?></td>
                            <td><?php echo $memo->getBody() ?></td>
                            <td><?php echo $memo->getUpdatedAt() ?></td>
                            <td><a href="./get.php?id=<?php echo $memo->getId() ?>">詳細</a></td>
                            <td><a href="./update.php?id=<?php echo $memo->getId() ?>">更新</a></td>
                            <td><a href="./delete.php?id=<?php echo $memo->getId() ?>" onclick="alert('削除されました！')">削除</a></td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    <script src="js.js"></script>
    </body>
</html>
