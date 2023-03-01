<?php

if (session_status() === PHP_SESSION_DISABLED) {
    session_start();
}

?>
<header>
    <h1>ひとことメモを書いてみよう！</h1>

    <?php if (isset($_SESSION['user'])): ?>
        <a href="/ph16/memo/public/user/logout.php" onclick="alert('ログアウトされました。')">ログアウト</a>
    <?php endif ?>
</header>
