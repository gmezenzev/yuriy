<?php
/**
 * Created by PhpStorm.
 * User: gleb
 * Date: 13/02/2019
 * Time: 15:53
 */
require('connect.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST('username');
    $password = $_POST('password');
    $email = $_POST('email');
   $count = $pdo->exec("INSERT INTO users (username, password, email) VALUE ('$username', '$password', '$email')");
    if ($count == 0) $fmassage = 'Зарегистрироваться не удалось';
   else $massage = 'Регистарция прошла успешно';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <form class="form-signin" method="POST">
        <h2>Регистрация</h2>
        <?php if (isset($fmassage)) : ?>
            <div class="alert alert-danger" role="alert"><?= $fmassage; ?></div>
        <?php endif; ?>
        <?php if (isset($massage)) : ?>
            <div class="alert alert-success" role="alert"><?= $massage; ?></div>
        <?php endif; ?>
        <input type="text" name="username" class="form-control" placeholder="введите имя" required>
        <input type="email" name="email" class="form-control" placeholder="введите email" required>
        <input type="password" name="password" class="form-control" placeholder="введите пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
    </form>
</div>
</body>
</html>
