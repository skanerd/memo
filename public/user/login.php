<html>
    <head>
        <link rel="stylesheet" href="style-user.css">
    </head>
    <body class="login-body">
        <div class="login-header">
        <video muted autoplay loop>
            <source src="videos/universe5.mp4" type="video/mp4">
            <strong>Your browser does not support the video tag.</strong>
        </video>
            <div class="login-text">
            <?php include '../../includes/header.php' ?>
                <h1>ログイン</h1>
                ユーザー登録は<a href="./register.php">こちら</a>
                <form action="./login.php" method="post">
                    <p>
                        <label>
                            メールアドレス
                            <input type="text" name="email" id="login-email" placeholder="e-mail">
                        </label>
                    </p>
                    <p>
                        <label>
                            パスワード
                            <input type="password" name="password" id="login-password" placeholder="パスワード">
                        </label>
                    </p>
                    <p>
                        <input type="submit" name="submit_button" value="ログイン" onclick="loginCheck()">
                    </p>
                </form>
            </div>
        </div>
        <script src="js.js"></script>
    </body>
</html>


<?php

require_once __DIR__ . '/../../models/User.php';

session_start();

if (isset($_POST['submit_button'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $user->setEmail($email);
    $user->setPassword($password);


    $result = $user->login();

    if ($result['isSucceeded']) {
        $_SESSION['user'] = $user;
        setcookie('userId', $user->getId(), time() + 60 * 60 * 24, '/');
        header('Location: ../memo/');
        return;
    }

    if (password_verify($password, $user -> getPassword())) {
        'isSucceeded';
    } else {
        'isFailed';
    }

    echo "<script>alert('ID又はPWを再確認してください。');</script>";
    echo '<div class="wrong">ログインできませんでした。</div>';
}

?>
