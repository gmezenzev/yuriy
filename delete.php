<?php
/**
 * Created by PhpStorm.
 * User: gleb
 * Date: 06/02/2019
 * Time: 22:22
 */
if (isset($_POST['name'])) $name = $_POST['name'];
$pdo = new PDO('mysql:host=localhost;dbname=MarlinProject', 'root', 'root');
$statement = $pdo->query("SELECT * FROM posts WHERE name ='$name' ");
$posts = $statement->fetchAll(PDO:: FETCH_ASSOC);
if ($posts == null) {
    $message = 'Такой статьи нет в базе <br>';
} else {
    $statement = $pdo->query("DELETE FROM posts WHERE name='$name'");
    if (isset($statement)) $message = 'Статья успешно удалена';
    else $message = 'Не удалось удалить статью ';
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
</head>
<body>

<div class="container">
    <div class="alert alert-info" role="alert">
        <strong><?php echo $message?></strong>
    </div>
    <a href="index.php"><button type="button" class="btn btn-primary btn-sm">НАЗАД К СТАТЬЯМ</button></a>
</div>
</body>
</html>