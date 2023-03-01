<?php

require_once __DIR__ . '/../../models/User.php';

// 空白にならないように　(root4)
// $email = trim($_POST['email']);
// $password = trim($_POST['password']);
// $name = trim($_POST['name']);

// if( $email || $password || $name == '' ) {
//     echo "<script>alert('入力内容を確認してください。');</script>";
// }


session_start();

if (isset($_POST['submit_button'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $name = $_POST['name'];

    $user = new User();
    $user->setEmail($email);
    $user->setPassword($hashedPassword);
    $user->setName($name);

    $user->register();

    $_SESSION['user'] = $user;
    setcookie('userId', $user->getId(), time() + 60 * 60 * 24 * 30, '/');

    header('Location: ../memo/');
    return;
}

?>

<html>
    <head>
        <link rel="stylesheet" href="style-user.css">
    </head>
    <body class="register-body">
        <div class="register-header">
            <video muted autoplay loop>
                <source src="videos/universe6.mp4" type="video/mp4">
                <strong>Your browser does not support the video tag.</strong>
            </video>
            <div class="register-text">
                <?php include '../../includes/header.php' ?>
                <div class="register-header">
                    <h2>ユーザー登録</h2>
                    <a href="./login.php">ログインはこちら</a>
                    <form action="./register.php" method="post" onsubmit="return formChecker(this)">
                        <p>
                            <label>
                                メールアドレス
                                <input type="text" name="email" id="register-email" placeholder="e-mail">
                            </label>
                        </p>
                        <p>
                            <label>
                                パスワード
                                <input type="password" name="password" id="register-password" placeholder="パスワード">
                            </label>
                        </p>
                        <p>
                            <label>
                                お名前
                                <input type="text" name="name" id="register-name" placeholder="お名前">
                            </label>
                        </p>
                        <p>
                            <input type="submit" name="submit_button" value="登録" id="submit">
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <script src="js.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    </body>
</html>
